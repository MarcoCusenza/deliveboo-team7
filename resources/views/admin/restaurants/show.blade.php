@extends('layouts.app')

@section('content')

<div class="container mx-auto">
    {{-- navbar --}}
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">{{ $restaurant->restaurant_name }}</li>
        </ol>
    </nav>
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

                    {{-- start modal --}}
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">
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
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Torna indietro</button>
                                    <form action="{{ route('restaurants.destroy', $restaurant->id) }}" method="POST">
                                        @csrf
                                        @method("DELETE")
                                        <a href="{{ route('restaurants.destroy', $restaurant->id) }}"><button
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
</div>

</div>
@endsection
