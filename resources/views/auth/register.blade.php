@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Registrati come ristoratore') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nome') }} *</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" maxlength="100"
                                        class="form-control @error('name') is-invalid @enderror" name="name"
                                        value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="surname" class="col-md-4 col-form-label text-md-right">{{ __('Cognome') }}
                                    *</label>

                                <div class="col-md-6">
                                    <input id="surname" type="text" maxlength="100"
                                        class="form-control @error('surname') is-invalid @enderror" name="surname"
                                        value="{{ old('surname') }}" required autocomplete="surname" autofocus>

                                    @error('surname')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail') }}
                                    *</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" maxlength="150"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}
                                    *</label>

                                <div class="col-md-6">
                                    <input id="password" minlength="8" maxlength="100" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password-confirm"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Conferma Password') }} *</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" minlength="8" maxlength="100" type="password"
                                        class="form-control" name="password_confirmation" required
                                        autocomplete="new-password">
                                </div>
                            </div>

                            {{-- verifica che la password ripetuta sia uguale alla prima --}}
                            <script>
                                let password = document.getElementById("password");
                                let confirm_password = document.getElementById("password-confirm");

                                function validatePassword() {
                                    if (password.value != confirm_password.value) {
                                        confirm_password.setCustomValidity("Le Password non corrispondono");
                                    } else {
                                        confirm_password.setCustomValidity('');
                                    }
                                }

                                password.onchange = validatePassword;
                                confirm_password.onkeyup = validatePassword;
                            </script>

                            <div class="form-group row">
                                <label for="VAT_number"
                                    class="col-md-4 col-form-label text-md-right">{{ __('P.IVA / VAT') }} *</label>

                                <div class="col-md-6">
                                    <input id="VAT_number" minlength="11" maxlength="15" type="tel" pattern="[0-9]{11,15}"
                                        class="form-control @error('VAT_number') is-invalid @enderror" name="VAT_number"
                                        value="{{ old('VAT_number') }}" required autocomplete="VAT_number" autofocus>

                                    @error('VAT_number')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <h5 class="text-muted">* Campo obbligatorio</h5>
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Registrati') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
