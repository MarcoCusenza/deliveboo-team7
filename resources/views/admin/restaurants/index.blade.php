@extends('layouts.app')

@section('content')
<div class="container">
    <div class="mx-auto">
        @foreach ($restaurants as $restaurant)
        <div class="card card-dashboard-dishes mb-3 p-3">
            <h2 class="row d-flex justify-content-around m-3">{{ $restaurant->restaurant_name }}</span></h2>

            <div class="container_img mx-auto">
                @if (Storage::exists($restaurant->image))
                <img class="rounded mx-auto p-3 d-block img-fluid" src="{{ asset("storage/{$restaurant->image}") }}"
                    alt="{{ $restaurant->name }}">
                @else
                <img class="rounded mx-auto p-3 d-block img-fluid" src="{{ $restaurant->image }}"
                    alt="{{ $restaurant->name }}">
                @endif
            </div>
            <div class="row d-flex justify-content-around">
                <div class="col-lg-12 col-sm-12 mt-3">
                    <ul class="list-group list-group-flush border-bottom border-0">
                        <li class="list-group-item">Numero di telefono: {{ $restaurant->phone }}</li>
                        <li class="list-group-item">Indirizzo: {{ $restaurant->address }}</li>
                        <li class="list-group-item">Prezzo per la consegna: {{ $restaurant->delivery_price }} euro
                        </li>
                        <li class="list-group-item">Categorie:
                            <ul class="list-group list-group-flush">
                                @foreach ($restaurant->categories as $category)
                                <li class="list-group-item">{{ $category->name }}</li>
                                @endforeach
                            </ul>
                        </li>
                    </ul>
                    <div class="mt-3 row d-flex justify-content-around">
                        <a href="{{ route('restaurants.edit', $restaurant->id) }}"><button type="button"
                                class="btn btn-warning mr-3">Modifica</button></a>
                        <a href="{{ route('dishes.index', $restaurant->id) }}" class="btn btn-dashboard">Visualizza
                            menu</a>
                        <form action="{{ route('restaurants.destroy', $restaurant->id) }}" method="POST">
                            @csrf
                            @method("DELETE")
                            <a href="{{ route('restaurants.destroy', $restaurant->id) }}"><button type="submit"
                                    class="btn btn-danger">Elimina</button></a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>

</div>
@endsection