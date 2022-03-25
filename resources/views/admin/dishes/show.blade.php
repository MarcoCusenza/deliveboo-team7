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
        <h2 class="row d-flex justify-content-around m-3">{{ $dish->name }}</span></h2>
        <div class="container_img_dish mx-auto">
            @if (Storage::exists($dish->image))
            <img class="rounded mx-auto p-3 d-block img-fluid" src="{{ asset("storage/{$dish->image}") }}"
                alt="{{ $dish->name }}">
            @elseif($dish->image == null)
            <div class="p-4">Questo piatto non ha un'immagine</div>
            @else
            <img class="rounded mx-auto p-3 d-block img-fluid" src="{{ $dish->image }}" alt="{{ $dish->name }}">
            @endif
        </div>

        <div class="row d-flex justify-content-around ">
            <div class="col-lg-12 col-sm-12 mt-3">
                <ul class="list-group list-group-flush border-bottom border-0">
                    <li class="list-group-item">Prezzo: {{ $dish->price }} &euro;
                        @if ($dish->description)
                    <li class="list-group-item">Descrizione: {{ $dish->description }}</li>
                    @endif
                    <li class="list-group-item">Ingredienti: {{ $dish->ingredients }}</li>
                    <li class="list-group-item">Visibile al pubblico:
                        @if ($dish->visible)
                        <span class="badge badge-success">
                            <h3>Visibile</h3>
                        </span>
                        @else
                        <span class="badge badge-secondary">
                            <h3>Non visibile</h3>
                        </span>
                        @endif
                    </li>
                </ul>
                <div class="mt-3 row d-flex justify-content-around">
                    <a href="{{ route('dishes.edit', $dish->id) }}" class="btn btn-warning">Modifica piatto</a>
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
                                    <form action="{{ route('dishes.destroy', $dish->id) }}" method="POST">
                                        @csrf
                                        @method("DELETE")
                                        <button type="submit" class="btn btn-danger">Elimina piatto</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a href="{{ route('dishes.index', $dish->id) }}" class="btn btn-dashboard">Torna ai piatti</a>
                </div>
            </div>
        </div>
    </div>


</div>
@endsection
