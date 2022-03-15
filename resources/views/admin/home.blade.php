@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        Benvenuto {{ Auth::user()->name }}

                        {{-- INFO UTENTE --}}
                        <div class="card" style="width: 18rem;">
                            <div class="card-header">
                                Info Utente:
                            </div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">{{ Auth::user()->name }} {{ Auth::user()->surname }}</li>
                                <li class="list-group-item">email: {{ Auth::user()->email }}</li>
                                <li class="list-group-item">P.IVA / VAT: {{ Auth::user()->VAT_number }}</li>
                                @php
                                    $register_date = strtotime(Auth::user()->created_at);
                                    
                                    $year = date('Y', $register_date);
                                    $month = date('m', $register_date);
                                    $day = date('j', $register_date);
                                @endphp
                                <li class="list-group-item">Creazione account:
                                    {{ $day }}/{{ $month }}/{{ $year }}
                                </li>
                            </ul>
                        </div>


                        {{-- INFO + CREA/GUARDA RISTORANTE --}}
                        <div class="card" style="width: 18rem;">
                            <div class="card-header">
                                Info Ristorante:
                            </div>

                            @php
                                use App\Restaurant;
                                $tot_rest = Restaurant::first()
                                    ->where('user_id', auth()->id())
                                    ->get()
                                    ->toArray();
                            @endphp


                            <ul class="list-group list-group-flush">
                                {{-- PULSANTE CREA RISTORANTE --}}
                                @if ($tot_rest == null)
                                    <li class="list-group-item">
                                        Non hai ancora un ristorante!
                                        <a type="button" class="btn btn-danger"
                                            href="{{ route('restaurants.create') }}">Crea
                                            Ristorante</a>
                                    </li>
                                @endif

                                {{-- PULSANTE GUARDA RISTORANTE --}}
                                @if ($tot_rest != null)
                                    <li class="list-group-item">
                                        Il tuo ristorante è: {{ $tot_rest[0]['restaurant_name'] }}
                                        <a type="button" class="btn btn-success"
                                            href="{{ route('restaurants.index') }}">Guarda il tuo Ristorante</a>
                                    </li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
