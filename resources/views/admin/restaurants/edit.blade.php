@extends('layouts.app')

@section('content')
<div class="container">
    {{-- navbar --}}
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('restaurants.index', $restaurant->id) }}">Lista piatti</a>
            </li>
            <li class="breadcrumb-item"><a
                    href="{{ route('restaurants.show', $restaurant->id) }}">{{ $restaurant->restaurant_name }}</a></li>
            <li class="breadcrumb-item active" aria-current="page">Modifica</li>
        </ol>
    </nav>
    <div class="card card-dashboard-dishes mb-3 p-3">
        <h2 class="mb-4">Modifica il tuo ristorante: {{ $restaurant->restaurant_name }}</h2>
    <form action="{{ route('restaurants.update', $restaurant->id) }}" id="isOneSelected" method="POST"
        enctype="multipart/form-data">
        @csrf
        @method("PUT")
        <div class="form-group">
            <label for="restaurant_name">Modifica il nome del ristorante *</label>
            <input type="text" class="form-control @error('restaurant_name') is-invalid @enderror" id="restaurant_name"
                name="restaurant_name" placeholder="Scrivi il nuovo nome del ristorante"
                value="{{ old('restaurant_name', $restaurant->restaurant_name) }}" required>
            @error('restaurant_name')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="phone">Modifica il numero di telefono *</label>
            <input minlength="8" maxlength="15" type="tel" pattern="[0-9]{8,15}" type="text"
                class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone"
                placeholder="Scrivi il nuovo numero di telefono" value="{{ old('phone', $restaurant->phone) }}"
                required>
            @error('phone')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="address">Modifica l'indirizzo *</label>
            <input type="text" class="form-control @error('address') is-invalid @enderror" id="address" name="address"
                placeholder="Scrivi il nuovo indirizzo" value="{{ old('address', $restaurant->address) }}" required>
            @error('address')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group mb-4">
            <label for="delivery_price">Modifica il costo della spedizione *</label>
            <input type="number" step=".05" max="99" class="form-control @error('delivery_price') is-invalid @enderror"
                id="delivery_price" name="delivery_price" placeholder="Scrivi il nuovo costo della spedizione"
                value="{{ old('delivery_price', $restaurant->delivery_price) }}" required>
            @error('delivery_price')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group mb-4">
            <p>Modifica le categorie *</p>
            @foreach ($categories as $category)
            <div class="form-check form-check-inline">
                @if (old('categories'))
                <input type="checkbox" class="form-check-input" id="{{ $category->slug }}" name="categories[]"
                    value="{{ $category->id }}" {{ in_array($category->id, old('categories', [])) ? 'checked' : '' }}>
                @else
                <input type="checkbox" class="form-check-input" id="{{ $category->slug }}" name="categories[]"
                    value="{{ $category->id }}" {{ $restaurant->categories->contains($category) ? 'checked' : '' }}>
                @endif
                <label class="form-check-label" for="{{ $category->slug }}">{{ $category->name }}</label>
            </div>
            @endforeach
            @error('categories')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <span class="text-muted d-block mb-2">L'immagine non deve pesare più di 4 MB</span>
            <img id="uploadPreview" width="100" src="{{ asset('storage/' . $restaurant->image) }}">
            <label for="image">Modifica l'immagine</label>
            <input class="d-block my-3" type="file" id="image" name="image" onchange="PreviewImage();">
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

        <h6 class="text-muted">* Campo obbligatorio</h6>
        <div class="mt-3 row d-flex justify-content-end">
            <button type="submit" class="btn btn-success mr-3">Modifica Ristorante</button>

            <a href="{{ route('restaurants.index') }}" class="btn btn-danger mr-3">Annulla e torna indietro</a>

        </div>
    </form>
    </div>

    <script>
        // Validazione lato client: Se nessuna categoria è selezionata -> errore
        (function () {
            const form = document.querySelector('#isOneSelected');
            const checkboxes = form.querySelectorAll('input[type=checkbox]');
            const checkboxLength = checkboxes.length;
            const firstCheckbox = checkboxLength > 0 ? checkboxes[0] : null;

            function init() {
                if (firstCheckbox) {
                    for (let i = 0; i < checkboxLength; i++) {
                        checkboxes[i].addEventListener('change', checkValidity);
                    }

                    checkValidity();
                }
            }

            function isChecked() {
                for (let i = 0; i < checkboxLength; i++) {
                    if (checkboxes[i].checked) return true;
                }

                return false;
            }

            function checkValidity() {
                const errorMessage = !isChecked() ? 'Devi selezionare almeno una categoria.' : '';
                firstCheckbox.setCustomValidity(errorMessage);
            }

            init();
        })();
    </script>
</div>
@endsection