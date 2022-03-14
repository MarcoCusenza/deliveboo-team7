@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Modifica il tuo piatto: {{$dish->name}}</h2>
    <form action="{{route("dishes.update", $dish->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method("PUT")
        <div class="form-group">
            <label for="name">Modifica il nome del piatto *</label>
            <input type="text" class="form-control @error(" name") is-invalid @enderror" id="name" name="name"
                placeholder="Scrivi il nuovo nome del piatto" value="{{old("name", $dish->name)}}">
            @error("name")
            <div class="alert alert-danger">{{$message}}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="price">Modifica il prezzo del piatto *</label>
            <input type="numeric" step=".05" class="form-control @error(" price") is-invalid @enderror" id="price"
                name="price" placeholder="Scrivi il nuovo numero di telefono" value="{{old("price", $dish->price)}}">
            @error("price")
            <div class="alert alert-danger">{{$message}}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="description">Modifica la descrizione</label>
            <input type="text" class="form-control @error(" phone") is-invalid @enderror" id="description"
                name="description" placeholder="Scrivi il nuovo indirizzo"
                value="{{old("description", $dish->description)}}">
            @error("description")
            <div class="alert alert-danger">{{$message}}</div>
            @enderror
        </div>

        <div class="form-group mb-4">
            <label for="ingredients">Modifica gli ingredienti *</label>
            <input type="text" class="form-control @error(" phone") is-invalid @enderror" id="ingredients"
                name="ingredients" placeholder="Scrivi il nuovo costo della spedizione"
                value="{{old("ingredients", $dish->ingredients)}}">
            @error("ingredients")
            <div class="alert alert-danger">{{$message}}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="course">Seleziona la portata</label>
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
        <h5 class="text-muted">* Campo obbligatorio</h5>
        <button type="submit" class="btn btn-primary px-4 py-2">Modifica</button>
    </form>
</div>
@endsection