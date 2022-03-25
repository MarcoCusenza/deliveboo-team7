@extends('layouts.app')

@section('content')
<div class="container">
    <div class="mx-auto">
        @foreach ($restaurants as $restaurant)
        <div class="card card-dashboard-dishes mb-3 p-3">


            <div class="cover-rest cover">
                @if (Storage::exists($restaurant->image))
                <img class="mx-auto p-3 d-block img-fluid" src="{{ asset("storage/{$restaurant->image}") }}"
                    alt="{{ $restaurant->name }}">
                @else
                <img class="mx-auto p-3 d-block img-fluid" src="{{ $restaurant->image }}" alt="{{ $restaurant->name }}">
                @endif
                <div class="overlay-text">
                    <h2 class="row d-flex justify-content-around m-3">{{ $restaurant->restaurant_name }}</span></h2>
                </div>
            </div>

            <div class="row d-flex justify-content-between p-3">
                <div class="col-lg-6 col-sm-12 mt-3">
                    <div class="card p-4">
                        <div class="text-container">
                            <h5><i class="fa-solid fa-phone"></i> Numero di telefono:</h5>
                            <h3 class="m-0">{{ $restaurant->phone }}</h3>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-sm-12 mt-3">
                    <div class="card p-4">
                        <div class="text-container">
                            <h5><i class="fa-solid fa-location-dot"></i> Indirizzo:</h5>
                            <h3 class="m-0">{{ $restaurant->address }}</h3>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-sm-12 mt-3">
                    <div class="card p-4">
                        <div class="text-container">
                            <h5><i class="fa-solid fa-truck"></i> Costo di spedizione:</h5>
                            <h3 class="m-0">{{ $restaurant->delivery_price }} €</h3>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-sm-12 mt-3">
                    <div class="card p-4">
                        <div class="text-container">
                            <h5><i class="fa-solid fa-utensils"></i> Categorie:</h5>
                            <h3 class="m-0">
                                 @foreach ($restaurant->categories as $category)
                                    {{ $category->name }} /
                                @endforeach
                            </h3>
                        </div>
                    </div>
                </div>
                <div class="mt-4 container-button d-flex justify-content-around mx-auto">
                    <a href="{{ route('restaurants.edit', $restaurant->id) }}"><button type="button"
                            class="btn btn-dashboard mr-3">Modifica ristorante</button></a>
                    <a href="{{ route('dishes.index', $restaurant->id) }}" class="btn btn-dashboard mr-3">Visualizza
                        menu</a>
                    <!-- Button trigger modal -->
                        
                    <button type="button" class="btn btn-danger mr-3" data-toggle="modal" data-target="#exampleModal">
                        Elimina
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Conferma eliminazione</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    Sei sicuro di voler eliminare?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Torna
                                        indietro</button>
                                    <form action="{{ route('restaurants.destroy', $restaurant->id) }}" method="POST">
                                        @csrf
                                        @method("DELETE")
                                        <a onclick="return confirm ('Confermi di voler eliminare?')"
                                            href="{{ route('restaurants.destroy', $restaurant->id) }}"><button
                                                type="submit" class="btn btn-danger">Elimina</button></a>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
    @endforeach
</div>

</div>
@endsection