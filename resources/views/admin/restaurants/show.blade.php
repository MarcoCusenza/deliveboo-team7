@extends('layouts.app')

@section('content')
    <div class="container mx-auto">
        <div class="card mb-3">
            @if (Storage::exists($restaurant->image))
                <img width="400" class="rounded mt-3 mx-auto d-block" src="{{ asset("storage/{$restaurant->image}") }}"
                    alt="{{ $restaurant->name }}">
            @else
                <img width="400" class="rounded mt-3 mx-auto d-block" src="{{ $restaurant->image }}"
                    alt="{{ $restaurant->name }}">
            @endif
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
                        <li class="list-group-item">Prezzo per la consegna: {{ $restaurant->delivery_price }} euro</li>
                        <li class="list-group-item">Categorie:
                            <ul>
                                @foreach ($restaurant->categories as $category)
                                    <li>{{ $category->name }}</li>
                                @endforeach
                            </ul>
                        </li>
                    </ul>
                </div>
                <div class="container p-0 d-flex flex-row mt-3">
                    <a href="{{ route('restaurants.edit', $restaurant->id) }}"><button type="button"
                            class="btn btn-warning mr-3">Modifica</button></a>
                    <a href="{{ route('dishes.index', $restaurant->id) }}" class="btn btn-warning">Visualizza menu</a>
                    <form action="{{ route('restaurants.destroy', $restaurant->id) }}" method="POST">
                        @csrf
                        @method("DELETE")
                        <a onclick="return confirm('Confermi di voler eliminare il ristorante?')"
                            href="{{ route('restaurants.destroy', $restaurant->id) }}">
                            <button type="submit" class="btn btn-danger">Elimina</button>
                        </a>
                    </form>
                </div>
            </div>
        </div>

    </div>
@endsection
