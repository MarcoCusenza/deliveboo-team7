@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="mb-4">Modifica il tuo ristorante: {{$restaurant->restaurant_name}}</h2>
        <form action="{{route("restaurants.update", $restaurant->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method("PUT")
            <div class="form-group">
                <label for="restaurant_name">Modifica il nome del ristorante</label>
                <input type="text" class="form-control @error("restaurant_name") is-invalid @enderror" id="restaurant_name" name="restaurant_name" placeholder="Scrivi il nuovo nome del ristorante" value="{{old("restaurant_name", $restaurant->restaurant_name)}}">
                @error("restaurant_name")
                    <div class="alert alert-danger">{{$message}}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="phone">Modifica il numero di telefono</label>
                <input type="text" class="form-control @error("phone") is-invalid @enderror" id="phone" name="phone" placeholder="Scrivi il nuovo numero di telefono" value="{{old("phone", $restaurant->phone)}}">
                @error("phone")
                    <div class="alert alert-danger">{{$message}}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="address">Modifica l'indirizzo</label>
                <input type="text" class="form-control @error("phone") is-invalid @enderror" id="address" name="address" placeholder="Scrivi il nuovo indirizzo" value="{{old("address", $restaurant->address)}}">
                @error("address")
                    <div class="alert alert-danger">{{$message}}</div>
                @enderror
            </div>

            <div class="form-group mb-4">
                <label for="delivery_price">Modifica il costo della spedizione</label>
                <input type="number" step=".05" class="form-control @error("phone") is-invalid @enderror" id="delivery_price" name="delivery_price" placeholder="Scrivi il nuovo costo della spedizione" value="{{old("delivery_price", $restaurant->delivery_price)}}">
                @error("delivery_price")
                    <div class="alert alert-danger">{{$message}}</div>
                @enderror
            </div>

            <div class="form-group mb-4">
                <p>Modifica le categorie</p>
                @foreach ($categories as $category)
                    <div class="form-check-inline">
                        @if (old("categories"))
                            <input type="checkbox" class="form-check-input" id="{{$category->slug}}" name="categories[]" value="{{$category->id}}" {{in_array($category->id, old("categories", [])) ? "checked" : ""}}>
                        @else
                            <input type="checkbox" class="form-check-input" id="{{$category->slug}}" name="categories[]" value="{{$category->id}}" {{$restaurant->categories->contains($category) ? "checked" : ""}}>
                        @endif
                        <label class="form-check-label" for="{{$category->slug}}">{{$category->name}}</label>
                    </div>
                @endforeach
            </div>
                
                {{-- @foreach ($categories as $category)
                <div class="form-check form-check-inline">
                    <input type="checkbox" class="form-check-input" id="{{$category->slug}}" name="category[]" value="{{$category->id}}" {{in_array( $category->id, old("category", []) ) ? 'checked' : ''}}>
                    <label class="form-check-label" for="{{$category->slug}}">{{$category->name}}</label>
                </div>
                @endforeach
                @error('category')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror --}}

            <div class="form-group">
                {{-- <img id="uploadPreview" width="100" src="{{ asset('storage/'.$restaurant->image) }}"> --}}
                <label for="image">Modifica l'immagine</label>
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

            <button type="submit" class="btn btn-primary px-4 py-2">Modifica</button>
        </form>
    </div>
@endsection