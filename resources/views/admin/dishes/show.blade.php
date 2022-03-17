@extends('layouts.app')

@section('content')
    <div class="container mx-auto">
        <div class="card mb-3">
            @if (Storage::exists($dish->image))
                <img width="400" class="rounded mt-3 mx-auto d-block" src="{{ asset("storage/{$dish->image}") }}"
                    alt="{{ $dish->name }}">
            @elseif($dish->image == null)
                <div class="p-4">Questo piatto non ha un'immagine</div>
            @else
                <img width="400" class="rounded mt-3 mx-auto d-block" src="{{ $dish->image }}" alt="{{ $dish->name }}">
            @endif

            <div class="card-body">
                <h5 class="card-title">Nome piatto: <span class="font-weight-bold">{{ $dish->name }}</span></h5>
                <div class="card" style="width: 18rem;">
                    <div class="card-header">
                        Info:
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Prezzo: {{ $dish->price }}</li>
                        @if ($dish->description)
                            <li class="list-group-item">Descrizione: {{ $dish->description }}</li>
                        @endif
                        <li class="list-group-item">Ingredienti: {{ $dish->ingredients }}</li>
                        </li>
                        <li class="list-group-item">Visibile al pubblico:
                            @if ($dish->visible)
                            <h3><span class="badge badge-success">Visibile</span></h3>
                            @else
                            <h3><span class="badge badge-secondary">Non visibile</span></h3>
                            @endif
                        </li>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <a href="{{ route('dishes.index', $dish->id) }}" class="btn btn-warning">Torna ai piatti</a>
        <a href="{{ route('dishes.edit', $dish->id) }}" class="btn btn-warning">Modifica piatto</a>

    </div>
@endsection
