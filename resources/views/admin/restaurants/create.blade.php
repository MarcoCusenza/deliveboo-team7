@extends('layouts.app')

@section('content')
  <div class="container">
    <form action="{{route("restaurants.store")}}" method="POST" enctype="multipart/form-data">
      @csrf
      <div class="form-group">
        <label for="restaurant_name">Nome ristorante *</label>
        <input type="text" maxlength="150" class="form-control @error("restaurant_name") is-invalid @enderror" id="restaurant_name" name="restaurant_name" placeholder="Scrivi il nome del ristorante" value="{{old("restaurant_name")}}">
        @error("restaurant_name")
          <div class="alert alert-danger">{{$message}}</div>
        @enderror
      </div>

      <div class="form-group">
        <label for="phone">Numero di telefono *</label>
        <input type="text" minlength="10" maxlength="10" class="form-control @error("phone") is-invalid @enderror" id="phone" name="phone" placeholder="Scrivi il numero di telefono" value="{{old("phone")}}">
        @error("phone")
          <div class="alert alert-danger">{{$message}}</div>
        @enderror
      </div>

      <div class="form-group">
        <label for="address">Indirizzo *</label>
        <input type="text" maxlength="150" class="form-control @error("phone") is-invalid @enderror" id="address" name="address" placeholder="Scrivi l'indirizzo" value="{{old("address")}}">
        @error("address")
          <div class="alert alert-danger">{{$message}}</div>
        @enderror
      </div>

      <div class="form-group mb-4">
        <label for="delivery_price">Costo spedizione *</label>
        <input type="number" step=".05" max="99" class="form-control @error("phone") is-invalid @enderror" id="delivery_price" name="delivery_price" placeholder="Scrivi quanto costa la spedizione" value="{{old("delivery_price")}}">
        @error("delivery_price")
          <div class="alert alert-danger">{{$message}}</div>
        @enderror
      </div>

      <div class="form-group mb-4">
        <p>Seleziona le categorie *</p>
        @foreach ($categories as $category)
            <div class="form-check form-check-inline">
                <input type="checkbox" class="form-check-input" id="{{$category->slug}}" name="category[]" value="{{$category->id}}" {{in_array( $category->id, old("category", []) ) ? 'checked' : ''}}>
                <label class="form-check-label" for="{{$category->slug}}">{{$category->name}}</label>
            </div>
        @endforeach
        @error('category')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
      </div>

      <div class="form-group">
        <span class="text-muted d-block">L'immagine non deve pesare più di 4 MB</span>
        <img id="uploadPreview" width="100" src="https://via.placeholder.com/300x200">
        <label for="image">Aggiungi immagine *</label>
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
      <h5 class="text-muted">* Campo obbligatorio</h5>
      <button type="submit" class="btn btn-primary px-4 py-2">Crea</button>
    </form>
  </div>
@endsection