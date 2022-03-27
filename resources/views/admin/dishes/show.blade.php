@extends('layouts.app')

@section('content')
<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dishes.index', $dish->id) }}">Lista piatti</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ $dish->name }}</li>
        </ol>
    </nav>
    <div class="card card-dashboard-dishes mb-3 p-3">
        <div class="cover cover-dish">
            @if (Storage::exists($dish->image))
            <img class="rounded mx-auto p-3 d-block img-fluid" src="{{ asset("storage/{$dish->image}") }}"
                alt="{{ $dish->name }}">
            @elseif($dish->image == null)
            <div class="p-4 text-dark">Questo piatto non ha un'immagine</div>
            @else
            <img class="rounded mx-auto p-3 d-block img-fluid" src="{{ $dish->image }}" alt="{{ $dish->name }}">
            @endif
            <div class="overlay-text-dish">
                <h2 class="row d-flex justify-content-around m-3">{{ $dish->name }}</span></h2>
            </div>
        </div>

        <div class="row d-flex justify-content-between p-3 ">
            <div class="col-lg-6 col-sm-12 mt-3">
                <div class="card p-4">
                    <div class="text-container">
                        <h5><i class="fa-solid fa-euro-sign mr-1"></i> Prezzo:</h5>
                        <h3 class="m-0">{{number_format($dish->price, 2)}} €</h3>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-sm-12 mt-3">
                <div class="card p-4">
                    <div class="text-container">
                        <h5><i class="fa-solid fa-align-left mr-1"></i> Descrizione:</h5>
                        @if ($dish->description)
                        <h3 class="m-0"> {{$dish->description}}</h3>
                        @else
                        <h3 class="m-0"> Nessuna descrizione</h3>
                        @endif   
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-sm-12 mt-3">
                <div class="card p-4">
                    <div class="text-container">
                        <h5><i class="fa-solid fa-carrot mr-1"></i> Ingredienti:</h5>
                        <h3 class="m-0">{{ $dish->ingredients }}</h3>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-sm-12 mt-3">
                <div class="card p-4">
                    <div class="text-container">
                        <h5><i class="fa-solid fa-eye mr-1"></i> Visibilità:</h5>
                     @if ($dish->visible)
                        <h3 class="m-0"> Visibile</h3>
                        @else
                        <h3 class="m-0"> NON visibile</h3>
                        @endif   
                    </div>
                </div>
            </div>
            <div class="mt-4 row  d-flex justify-content-around mx-auto">
                <a href="{{ route('dishes.edit', $dish->id) }}" class="btn btn-dashboard mr-3">Modifica piatto</a>
                <a href="{{ route('dishes.index', $dish->id) }}" class="btn btn-dashboard mr-3">Torna ai piatti</a>
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
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Torna
                                    indietro</button>
                                <form action="{{ route('dishes.destroy', $dish->id) }}" method="POST">
                                    @csrf
                                    @method("DELETE")
                                    <button type="submit" class="btn btn-danger">Elimina piatto</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>


</div>
@endsection
