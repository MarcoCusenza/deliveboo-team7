@extends('layouts.app')

@section('content')
<div class="container">
    <form action="{{route("dishes.store")}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name">Nome piatto</label>
            <input type="text" class="form-control @error("name") is-invalid @enderror" id="name" name="name"
                placeholder="Scrivi il nome del ristorante" value="{{old("name")}}">
        </div>
        @error("name")
        <div class="alert alert-danger">{{$message}}</div>
        @enderror

        <div class="form-group">
            <label for="price">Prezzo</label>
            <input type="number" step=".05" class="form-control @error("price") is-invalid @enderror" id="price"
                name="price" placeholder="Scrivi il prezzo" value="{{old("price")}}">
        </div>
        @error("price")
        <div class="alert alert-danger">{{$message}}</div>
        @enderror

        <div class="form-group">
            <label for="description">Descrizione</label>
            <input type="text" class="form-control @error("description") is-invalid @enderror" id="description"
                name="description" placeholder="Scrivi la descrizione del piatto" value="{{old("description")}}">
        </div>
        @error("description")
        <div class="alert alert-danger">{{$message}}</div>
        @enderror

        <div class="form-group mb-4">
            <label for="ingredients">Ingredienti</label>
            <input type="text" class="form-control @error("ingredients") is-invalid @enderror" id="ingredients"
                name="ingredients" placeholder="Scrivi gli ingredienti presenti nel piatto"
                value="{{old("ingredients")}}">
        </div>
        @error("ingredients")
        <div class="alert alert-danger">{{$message}}</div>
        @enderror

        <div class="form-group mb-4">
            <p>Seleziona la portata</p>
            @foreach ($courses as $course)
            <div class="form-check form-check-inline">
                <input type="checkbox" class="form-check-input" id="{{$course->slug}}" name="course[]"
                    value="{{$course->id}}" {{in_array( $course->id, old("course", []) ) ? 'checked' : ''}}>
                <label class="form-check-label" for="{{$course->slug}}">{{$course->name}}</label>
            </div>
            @endforeach
            @error('course')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-check">
            <input type="checkbox" class="form-check-input" id="visible" name="visible"
                {{ old('visible') ? 'checked' : '' }}>
            <label class="form-check-label" for="visible">Pubblica</label>
        </div>

        <button type="submit" class="btn btn-primary px-4 py-2">Crea</button>
    </form>
</div>
@endsection