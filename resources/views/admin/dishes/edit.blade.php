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
                placeholder="Scrivi il nuovo nome del piatto" value="{{old("name", $dish->name)}}" required>
            @error("name")
            <div class="alert alert-danger">{{$message}}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="price">Modifica il prezzo del piatto *</label>
            <input type="numeric" step=".05" class="form-control @error(" price") is-invalid @enderror" id="price"
                name="price" placeholder="Scrivi il nuovo numero di telefono" value="{{old("price", $dish->price)}}"
                required>
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
                value="{{old("ingredients", $dish->ingredients)}}" required>
            @error("ingredients")
            <div class="alert alert-danger">{{$message}}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="course">Seleziona la portata *</label>
            <select class="form-control form-control-md @error('course_id') is-invalid @enderror" id="course"
                name="course_id" required>
                <option value="">Seleziona una portata</option>
                @foreach ($courses as $course)
                <option value="{{ $course->id }}" {{ old('course_id') == $course->id ? 'selected' : '' }}>
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
            <img id="uploadPreview" width="100" src="https://via.placeholder.com/300x200">
            <label for="image">Modifica immagine</label>
            <input class="d-block mt-1" type="file" id="image" name="image" onchange="PreviewImage();">

            <script type="text/javascript">
                function PreviewImage() {
                    var oFReader = new FileReader();
                    oFReader.readAsDataURL(document.getElementById("image").files[0]);

                    oFReader.onload = function (oFREvent) {
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