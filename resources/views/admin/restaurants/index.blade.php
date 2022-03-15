@extends('layouts.app')

@section('content')
    <div class="container mx-auto">
        @foreach ($restaurants as $restaurant)
            <div class="card mb-3">
                <img width="400" class="rounded mt-3 mx-auto d-block" src="{{ asset("storage/{$restaurant->image}") }}"
                    alt="{{ $restaurant->restaurant_name }}">
                <div class="card-body">
                    <h5 class="card-title">Nome ristorante: <span
                            class="font-weight-bold">{{ $restaurant->restaurant_name }}</span></h5>
                    <div class="card" style="width: 18rem;">
                        <div class="card-header">
                            Info:
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">Numero di telefono: {{ $restaurant->phone }}</li>
                            <li class="list-group-item">Indirizzo: {{ $restaurant->address }}</li>
                            <li class="list-group-item">Prezzo per la consegna: {{ $restaurant->delivery_price }} euro
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <a href="{{ route('restaurants.edit', $restaurant->id) }}" class="btn btn-primary">Modifica ristorante</a>
            <a href="{{ route('dishes.index', $restaurant->id) }}" class="btn btn-warning">Visualizza menu</a>
            

        @endforeach
    </div>
@endsection
