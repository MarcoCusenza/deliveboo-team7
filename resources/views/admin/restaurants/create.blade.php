@extends('layouts.app')

@section('content')
<div class="container bg-dark text-white">
    <form action="{{route("restaurants.store")}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
          <label for="restaurant_name">Nome ristorante</label>
          <input type="text" class="form-control" id="restaurant_name" placeholder="Scrivi il nome del ristorante">
        </div>

        <div class="form-group">
            <label for="phone">Numero di telefono</label>
            <input type="text" class="form-control" id="phone" placeholder="Scrivi il numero di telefono">
        </div>

        <div class="form-group">
            <label for="address">Indirizzo</label>
            <input type="text" class="form-control" id="address" placeholder="Scrivi l'indirizzo">
        </div>

        <div class="form-group mb-4">
          <label for="delivery_price">Costo spedizione</label>
          <input type="text" class="form-control" id="delivery_price" placeholder="Scrivi quanto costa la spedizione">
        </div>

        <div class="input-group mb-5 form-group">
            <div class="custom-file">
              <input type="file" class="custom-file-input" id="image">
              <label class="custom-file-label" for="image">Scegli immagine</label>
            </div>
            <div class="input-group-append">
              <span class="input-group-text" id="">Upload</span>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection