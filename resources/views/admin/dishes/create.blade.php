@extends('layouts.app')

@section('content')
<div class="container">
    <form action="{{route("dishes.store")}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name">Nome piatto *</label>
            <input type="text" maxlength="150" class="form-control @error(" name") is-invalid @enderror" id="name" name="name"
                placeholder="Scrivi il nome del piatto" value="{{old("name")}}">
                @error("name")
                <div class="alert alert-danger">{{$message}}</div>
                @enderror
        </div>

        <div class="form-group">
            <label for="price">Prezzo *</label>
            <input type="number" step=".05" max="99999" class="form-control @error(" price") is-invalid @enderror" id="price"
                name="price" placeholder="Scrivi il prezzo" value="{{old("price")}}">
                @error("price")
                <div class="alert alert-danger">{{$message}}</div>
                @enderror
        </div>

        <div class="form-group">
            <label for="description">Descrizione</label>
            <input type="text" maxlength="150" class="form-control @error(" description") is-invalid @enderror" id="description"
                name="description" placeholder="Scrivi la descrizione del piatto" value="{{old("description")}}">
            @error("description")
            <div class="alert alert-danger">{{$message}}</div>
            @enderror
        </div>

        <div class="form-group mb-4">
            <label for="ingredients">Ingredienti *</label>
            <input type="text" maxlength="150" class="form-control @error("ingredients") is-invalid @enderror" id="ingredients"
                name="ingredients" placeholder="Inserisci gli ingredienti presenti nel piatto"
                value="{{old("ingredients")}}">
            @error("ingredients")
                <div class="alert alert-danger">{{$message}}</div>
            @enderror
        </div>

        <div class="form-group mb-4">
            <label for="course">Portata *</label>
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

        <div class="form-group mb-5">
            <span class="text-muted d-block">L'immagine non deve pesare più di 4 MB</span>
            <img id="uploadPreview" width="100" src="https://via.placeholder.com/300x200">
            <label for="image">Aggiungi immagine</label>
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

          <div class="form-group form-check mb-5">
            <input class="form-check-input @error('visible') is-invalid @enderror" type="checkbox" id="visible"
                name="visible" {{old('visible') ? 'checked' : ''}}>
            <label class="form-check-label" for="visible">Pubblica</label>
            @error('visible')
            <div class="alert alert-danger mt-2">{{ $message }}</div>
            @enderror
        </div>

        <h5 class="text-muted">* Campo obbligatorio</h5>
        <button type="submit" class="btn btn-primary px-4 py-2">Crea</button>
    </form>
</div>
@endsection