@extends('layouts.app')

@section('content')
<div class="container">
    <form action="{{route("dishes.store")}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name">Nome piatto</label>
            <input type="text" class="form-control @error(" name") is-invalid @enderror" id="name" name="name"
                placeholder="Scrivi il nome del ristorante" value="{{old("name")}}">
        </div>
        @error("name")
        <div class="alert alert-danger">{{$message}}</div>
        @enderror

        <div class="form-group">
            <label for="price">Prezzo</label>
            <input type="number" step=".05" class="form-control @error(" price") is-invalid @enderror" id="price"
                name="price" placeholder="Scrivi il prezzo" value="{{old("price")}}">
        </div>
        @error("price")
        <div class="alert alert-danger">{{$message}}</div>
        @enderror

        <div class="form-group">
            <label for="description">Descrizione</label>
            <input type="text" class="form-control @error(" description") is-invalid @enderror" id="description"
                name="description" placeholder="Scrivi la descrizione del piatto" value="{{old("description")}}">
        </div>
        @error("description")
        <div class="alert alert-danger">{{$message}}</div>
        @enderror

        <div class="form-group mb-4">
            <label for="ingredients">Ingredienti</label>
            <input type="text" class="form-control @error("ingredients") is-invalid @enderror" id="ingredients"
                name="ingredients" placeholder="Inserisci gli ingredienti presenti nel piatto"
                value="{{old("ingredients")}}">
        </div>
        @error("ingredients")
        <div class="alert alert-danger">{{$message}}</div>
        @enderror

        <div class="form-group">
            <label for="course">Portata</label>
            <select class="form-control form-control-md @error('course') is-invalid @enderror" id="course"
                name="course_id">
                <option value="">Seleziona una portata</option>
                @foreach ($courses as $course)
                <option value="{{ $course->id }}" {{ old('course_id') == $course->id ? 'selected' : '' }}>
                    {{ $course->name }}
                </option>
                @endforeach
            </select>
            @error('course')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group form-check">
            <input class="form-check-input @error('visible') is-invalid @enderror" type="checkbox" id="visible"
                name="visible" {{old('visible') ? 'checked' : ''}}>
            <label class="form-check-label" for="visible">Pubblica</label>
            @error('visible')
            <div class="alert alert-danger mt-2">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary px-4 py-2">Crea</button>
    </form>
</div>
@endsection