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
                <div class="row">
                    {{-- INFO UTENTE --}}
                    <div class="col-lg-3 col-sm-12 mt-3">
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
                    <div class="col-lg-3 col-sm-12 mt-3 d-flex flex-column">

                        <h5>Info Ristorante:</h5>

                        @php
                        use App\Restaurant;
                        $tot_rest = Restaurant::first()
                        ->where('user_id', auth()->id())
                        ->get()
                        ->toArray();
                        @endphp


                        {{-- PULSANTE CREA RISTORANTE --}}
                        @if ($tot_rest == null)
                        
                            <p style="font-weight: bold">Non hai ancora un ristorante!</p>
                        
                        <a type="button" class="btn btn-dashboard ml-auto mt-5" href="{{ route('restaurants.create') }}">Crea
                            Ristorante</a>
                        @endif

                        {{-- PULSANTE GUARDA RISTORANTE --}}
                        @if ($tot_rest != null)

                        
                           <p style="font-weight: bold"> Il tuo ristorante è: {{ $tot_rest[0]['restaurant_name'] }} </p>
                        

                        <a type="button" class="btn btn-dashboard ml-auto mt-5"
                            href="{{ route('restaurants.index') }}">Visualizza
                            Ristorante</a>
                        @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
