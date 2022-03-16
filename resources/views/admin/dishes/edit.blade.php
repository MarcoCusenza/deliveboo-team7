@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="mb-4">Modifica il tuo piatto: {{ $dish->name }}</h2>
        <form action="{{ route('dishes.update', $dish->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method("PUT")
            <div class="form-group">
                <label for="name">Modifica il nome del piatto *</label>
                <input type="text" class="form-control @error(' name') is-invalid @enderror" id="name" name="name"
                    placeholder="Inserisci il nuovo nome del piatto" value="{{ old('name', $dish->name) }}" required>
                @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="price">Modifica il prezzo del piatto *</label>
                <input type="number" step=".05" max="99999" class="form-control @error(' price') is-invalid @enderror"
                    id="price" name="price" placeholder="Inserisci il nuovo prezzo"
                    value="{{ old('price', $dish->price) }}" required>
                @error('price')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="description">Modifica la descrizione</label>
                <input type="text" class="form-control @error(' phone') is-invalid @enderror" id="description"
                    name="description" placeholder="Inserisci descrizione"
                    value="{{ old('description', $dish->description) }}">
                @error('description')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group mb-4">
                <label for="ingredients">Modifica gli ingredienti *</label>
                <input type="text" class="form-control @error(' phone') is-invalid @enderror" id="ingredients"
                    name="ingredients" placeholder="Inserisci i nuovi ingredienti"
                    value="{{ old('ingredients', $dish->ingredients) }}" required>
                @error('ingredients')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="course">Seleziona la portata *</label>
                <select class="form-control form-control-md @error('course_id') is-invalid @enderror" id="course"
                    name="course_id" required>
                    @php
                        $selected = old('course') ? old('course') : $dish->course_id;
                    @endphp
                    <option value="">Seleziona una portata</option>
                    @foreach ($courses as $course)
                        <option value="{{ $course->id }}" {{ $selected == $course->id ? 'selected' : '' }}>
                            {{ $course->name }}
                        </option>
                    @endforeach
                </select>
                @error('course_id')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group mb-5">

                <span class="text-muted d-block">L'immagine non deve pesare più di 4 MB</span>
                @if (Storage::exists($dish->image))
                    <img id="uploadPreview" width="100" src="{{ asset('storage/' . $dish->image) }}"
                        alt="{{ $dish->name }}">
                    <label for="image">Modifica immagine</label>
                @elseif($dish->image == null)
                    <img id="uploadPreview" width="100" src="https://via.placeholder.com/300x200">
                    <label for="image">Questo piatto attualmente non ha un'immagine</label>
                @else
                    <img id="uploadPreview" width="100" src="{{ $dish->image }}" alt="{{ $dish->name }}">
                @endif

                <input class="d-block mt-1" type="file" id="image" name="image" onchange="PreviewImage();">

                <script type="text/javascript">
                    function PreviewImage() {
                        var oFReader = new FileReader();
                        oFReader.readAsDataURL(document.getElementById("image").files[0]);

                        oFReader.onload = function(oFREvent) {
                            document.getElementById("uploadPreview").src = oFREvent.target.result;
                        };
                    };
                </script>
                @error('image')
                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group form-check">
                <input class="form-check-input @error('visible') is-invalid @enderror" type="checkbox" id="visible"
                    name="visible" {{ $dish->visible ? 'checked' : '' }}>
                <label class="form-check-label" for="visible">Visibile al pubblico</label>
                @error('visible')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>
            <h5 class="text-muted">* Campo obbligatorio</h5>
            <button type="submit" class="btn btn-primary px-4 py-2">Modifica</button>
            <a href="{{ route('dishes.show', $dish->id) }}" class="btn btn-danger">Annulla e torna al piatto</a>
        </form>
    </div>
@endsection
