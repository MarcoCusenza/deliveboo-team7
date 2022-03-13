@extends('layouts.app')

@section('content')
  <div class="container">
    <form action="{{route("restaurants.store")}}" method="POST" enctype="multipart/form-data">
      @csrf
      <div class="form-group">
        <label for="restaurant_name">Nome ristorante</label>
        <input type="text" class="form-control @error("restaurant_name") is-invalid @enderror" id="restaurant_name" placeholder="Scrivi il nome del ristorante" value="{{old("restaurant_name")}}">
      </div>
      @error("restaurant_name")
        <div class="alert alert-danger">{{$message}}</div>
      @enderror

      <div class="form-group">
        <label for="phone">Numero di telefono</label>
        <input type="text" class="form-control @error("phone") is-invalid @enderror" id="phone" placeholder="Scrivi il numero di telefono" value="{{old("phone")}}">
      </div>
      @error("phone")
        <div class="alert alert-danger">{{$message}}</div>
      @enderror

      <div class="form-group">
        <label for="address">Indirizzo</label>
        <input type="text" class="form-control @error("phone") is-invalid @enderror" id="address" placeholder="Scrivi l'indirizzo" value="{{old("address")}}">
      </div>
      @error("address")
        <div class="alert alert-danger">{{$message}}</div>
      @enderror

      <div class="form-group mb-4">
        <label for="delivery_price">Costo spedizione</label>
        <input type="number" step=".05" class="form-control @error("phone") is-invalid @enderror" id="delivery_price" placeholder="Scrivi quanto costa la spedizione" value="{{old("delivery_price")}}">
      </div>
      @error("delivery_price")
        <div class="alert alert-danger">{{$message}}</div>
      @enderror

      <div class="form-group">
        <label for="category">Seleziona una categoria</label>
        <select class="custom-select @error("category_id") is-invalid @enderror" name="category_id" id="category">
            <option></option>
            @foreach ($categories as $category)
                <option value="{{$category->id}}" {{old("category_id") == $category->id ? "selected" : ""}}>{{$category->name}}</option>
            @endforeach
        </select>
        @error("category_id")
            <div class="alert alert-danger">{{$message}}</div>
        @enderror
      </div>

      <div class="form-group">
        <img id="uploadPreview" width="100" src="https://via.placeholder.com/300x200">
        <label for="image">Aggiungi immagine</label>
        <input type="file" id="image" name="image" onchange="PreviewImage();">

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
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
      </div>

      <button type="submit" class="btn btn-primary px-4 py-2">Crea</button>
    </form>
  </div>
@endsection