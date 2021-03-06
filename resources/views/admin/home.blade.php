@extends('layouts.app')

@section('content')
  <div class="container-fluid mt-5">
    <div class="row justify-content-center">
      <div class="card mx-auto card-dashboard">
        <div class="card-body p-5">
          @if (session('status'))
            <div class="alert alert-success" role="alert">
              {{ session('status') }}
            </div>
          @endif
          <h2 class="font-weight-bold"> Benvenuto <span style="color: #00CCBC">{{ Auth::user()->name }}! </span>
          </h2>
          <div class="row d-flex justify-content-around">
            {{-- INFO UTENTE --}}
            <div class="col-12 col-lg-6 mt-3">
              <h5>Info Utente:</h5>
              <ul class="list-group  list-group-flush">
                <li class="list-group-item"><span style="font-weight: bold">Nome e cognome</span>
                  {{ Auth::user()->name }} {{ Auth::user()->surname }}</li>
                <li class="list-group-item"><span style="font-weight: bold">Email: </span>
                  {{ Auth::user()->email }}</li>
                <li class="list-group-item"><span style="font-weight: bold">P.IVA / VAT: </span>
                  {{ Auth::user()->VAT_number }}</li>
                @php
                  $register_date = strtotime(Auth::user()->created_at);
                  
                  $year = date('Y', $register_date);
                  $month = date('m', $register_date);
                  $day = date('j', $register_date);
                @endphp
                <li class="list-group-item"><span style="font-weight: bold">Creazione account:</span>
                  {{ $day }}/{{ $month }}/{{ $year }}
                </li>
              </ul>
            </div>
            {{-- INFO + CREA/GUARDA RISTORANTE --}}
            <div class="col-12 col-lg-6 mt-3 d-flex flex-column">

              <h5>Info Ristorante:</h5>

              @php
                use App\Restaurant;
                use App\Order;
                $areThereRest = Restaurant::where('user_id', auth()->id())->first();
                $areThereOrders = null;
                
                if ($areThereRest != null) {
                    $areThereOrders = Order::where('restaurant_id', $areThereRest->id)->first();
                }
              @endphp


              {{-- PULSANTE CREA RISTORANTE --}}
              @if ($areThereRest == null)
                <p style="font-weight: bold">Non hai ancora un ristorante!</p>

                <a type="button" class="btn btn-dashboard ml-auto mt-5" href="{{ route('restaurants.create') }}">Crea
                  Ristorante</a>
              @endif

              {{-- PULSANTE GUARDA RISTORANTE --}}
              @if ($areThereRest != null)
                <p style="font-weight: bold"> Il tuo ristorante ??:
                  {{ $areThereRest->restaurant_name }}
                </p>

                <div class="visualizza-container mt-3 w-50">
                  <h5>Visualizza:</h5>
                  <div class="buttons-container d-flex flex-column align-items-start">

                    <a type="button" class="btn btn-dashboard ml-auto mt-2 w-100"
                      href="{{ route('restaurants.index') }}">
                      Ristorante</a>


                    @if ($areThereOrders != null)
                      <a type="button" class="btn btn-dashboard ml-auto mt-2 w-100" href="/admin/orders">
                        Ordini</a>
                    @endif

                    @if ($areThereOrders != null)
                      <a type="button" class="btn btn-dashboard ml-auto mt-2 w-100" href="/admin/charts">
                        Statistiche</a>
                    @endif
              @endif

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>
@endsection
