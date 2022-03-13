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

                        {{-- PULSANTE CREA RISTORANTE --}}
                        <a type="button" class="btn btn-danger" href="{{ route('restaurants.create') }}">Crea
                            Ristorante</a>

                        {{-- PULSANTE GUARDA RISTORANTE --}}
                        {{-- <button type="button" class="btn btn-link"
                            href="{{ route('restaurants.show', $restaurant->id) }}">Crea
                            Ristorante</button> --}}
                        <a type="button" class="btn btn-success" href="{{ route('restaurants.index') }}">Guarda il tuo
                            Ristorante</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
