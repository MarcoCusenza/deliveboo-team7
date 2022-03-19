@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card card-dashboard p-3">
            <h2 class="row d-flex justify-content-around m-3">{{ $dish->name }}</span></h2>
            @if (Storage::exists($dish->image))
                <img  class="rounded mx-auto p-3 d-block img-fluid" src="{{ asset("storage/{$dish->image}") }}"
                    alt="{{ $dish->name }}">
            @elseif($dish->image == null)
                <div class="p-4">Questo piatto non ha un'immagine</div>
            @else
                <img class="rounded mx-auto p-3 d-block img-fluid" src="{{ $dish->image }}" alt="{{ $dish->name }}">
            @endif

            <div class="row d-flex justify-content-around ">
                <div class="col-lg-12 col-sm-12 mt-3">
                    <ul class="list-group list-group-flush border-bottom">
                        <li class="list-group-item">Prezzo: {{ $dish->price }} &euro;
                        @if ($dish->description)
                            <li class="list-group-item">Descrizione: {{ $dish->description }}</li>
                        @endif
                        <li class="list-group-item">Ingredienti: {{ $dish->ingredients }}</li>
                        <li class="list-group-item">Visibile al pubblico:
                            @if ($dish->visible)
                                <h3><span class="badge badge-success">Visibile</span></h3>
                            @else
                                <h3><span class="badge badge-secondary">Non visibile</span></h3>
                            @endif
                        </li>
                    </ul>
                    <div class=" px-3 py-3 ">
                        <a href="{{ route('dishes.index', $dish->id) }}" class="btn btn-dashboard">Torna ai piatti</a>
                        <a href="{{ route('dishes.edit', $dish->id) }}" class="btn btn-warning">Modifica piatto</a>
                    </div>
                </div>
            </div>
        </div>
        

    </div>
@endsection
