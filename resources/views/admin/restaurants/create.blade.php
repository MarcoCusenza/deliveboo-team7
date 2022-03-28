@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card card-dashboard-dishes p-3">
            <form action="{{ route('restaurants.store') }}" method="POST" id="isOneSelected" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="restaurant_name">Nome ristorante *</label>
                    <input type="text" maxlength="150" class="form-control @error('restaurant_name') is-invalid @enderror"
                        id="restaurant_name" name="restaurant_name" placeholder="Scrivi il nome del ristorante"
                        value="{{ old('restaurant_name') }}" required>
                    @error('restaurant_name')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
    
                <div class="form-group">
                    <label for="phone">Numero di telefono *</label>
                    <input minlength="8" maxlength="15" type="tel" pattern="[0-9]{8,15}"
                        class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone"
                        placeholder="Scrivi il numero di telefono" value="{{ old('phone') }}" required autocomplete="phone"
                        autofocus>
                    @error('phone')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
    
                <div class="form-group">
                    <label for="address">Indirizzo *</label>
                    <input type="text" maxlength="150" class="form-control @error('address') is-invalid @enderror" id="address"
                        name="address" placeholder="Scrivi l'indirizzo" value="{{ old('address') }}" required>
                    @error('address')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
    
                <div class="form-group mb-4">
                    <label for="delivery_price">Costo spedizione *</label>
                    <input type="number" step=".05" min="0" max="99" class="form-control @error('delivery_price') is-invalid @enderror"
                        id="delivery_price" name="delivery_price" placeholder="Scrivi quanto costa la spedizione"
                        value="{{ old('delivery_price') }}" required>
                    @error('delivery_price')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
    
                <div class="form-group mb-4">
                    <p>Seleziona le categorie *</p>
                    @foreach ($categories as $category)
                        <div class="form-check form-check-inline">
                            <input type="checkbox" class="form-check-input @error('categories') is-invalid @enderror"
                                id="{{ $category->slug }}" name="categories[]" value="{{ $category->id }}"
                                {{ in_array($category->id, old('categories', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="{{ $category->slug }}">{{ $category->name }}</label>
                        </div>
                    @endforeach
                    @error('categories')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
    
                <div class="form-group">
                    <span class="text-muted d-block">L'immagine non deve pesare più di 4 MB (formati accettati: jpeg, bmp,
                        png)</span>
                    <img id="uploadPreview" width="100" src="https://via.placeholder.com/300x200">
                    <label for="image">Aggiungi immagine *</label>
                    <input class="d-block mt-1" type="file" id="image" name="image" onchange="PreviewImage();" required>
    
                    <script type="text/javascript">
                        function PreviewImage() {
                            var oFReader = new FileReader();
                            oFReader.readAsDataURL(document.getElementById("image").files[0]);
    
                            oFReader.onload = function(oFREvent) {
                                document.getElementById("uploadPreview").src = oFREvent.target.result;
                            };
                        };
    
                        // Validazione lato client: Se nessuna categoria è selezionata -> errore
                        (function() {
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
                    @error('image')
                        <div class="alert alert-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>
    
    
                <h6 class="text-muted">* Campo obbligatorio</h6>
                <div class="mt-3 row d-flex justify-content-end">
                <button type="submit" class="btn btn-dashboard mr-3">Crea</button>
                </div>
            </form>
        </div>
    </div>
@endsection
