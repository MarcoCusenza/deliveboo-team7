<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/admin.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Outfit" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">

</head>

<body>
    <div id="app">
        <header class="mb-4">
            <nav class="navbar navbar-expand-lg container-header bg-white">
                <div class="col-header navbar-brand ml-lg-5 ml-md-4 ml-sm-3 ml-2">
                    <a href="{{ url('/') }}"><img src="https://i.postimg.cc/s2WnCRpD/logo.png" alt="deliveroo logo"
                            class="logo" /> {{ config('DeliveBoo') }} </a>
                </div>


                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
                    aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa-solid fa-bars navbar-toggler-icon"></i>
                </button>


                <div class="collapse navbar-collapse bg-white" id="navbarNavDropdown">
                    <ul class="navbar-nav d-flex align-items-center ml-auto mr-lg-5">
                        @guest
                        <li class="nav-item">
                            <a class="nav-link " href="{{ route('login') }}">{{ __('Accedi') }}</a>
                        </li>
                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link " href="{{ route('register') }}">{{ __('Registrati') }}</a>
                        </li>
                        @endif
                        @else
                        <li class="nav-item">
                            <a href="{{ route('restaurants.index') }}" class="btn">Ristorante</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('dishes.index') }}" class="btn">Piatti</a>
                        </li>
                        <div class="nav-item dropdown ">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('home') }}">Pannello utente</a>
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                                document.getElementById('logout-form').submit();">
                                    {{ __('Esci') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </div>
                    </ul>
                    @endguest
                </div>
            </nav>
        </header>


    </div>
    <main>
        @yield('content')
    </main>
        <footer>
        <div class="footer-top container text-white">
            <div class="row mt-5 py-3 d-flex justify-content-around">
                <div class="col-footer col-5 col-lg-2 p-4">
                    <ul>
                        <h4>Scopri Deliveboo</h4>
                        <li>Chi siamo</li>
                        <li>Dicono di noi</li>
                        <li>Takeaway</li>
                        <li>Altro</li>
                        <li>News</li>
                        <li>Food Blog</li>
                        <li>Engineering blog</li>
                        <li>Carte regalo</li>
                        <li>Diventa un rider</li>
                        <li>Diventa un ristoratore</li>
                        <li>Unisciti a noi</li>
                    </ul>
                    <!-- <div class="image-container">
                        <img src="https://i.postimg.cc/43rpZ7Xr/logo-footer.png" alt="deliveroo-logo-footer" />
                    </div> -->
                </div>
                <div class="col-footer col-5 col-lg-2 p-4">
                    <ul>
                        <h4>Nozioni legali</h4>
                        <li>Termini e condizioni</li>
                        <li>Privacy</li>
                        <li>Cookies</li>
                        <li>Altro</li>
                    </ul>
                </div>
                <div class="col-footer  col-5 col-lg-2 p-4">
                    <ul>
                        <h4>Aiuti</h4>
                        <li>Contatti</li>
                        <li>FAQs</li>
                        <li>Partner</li>
                        <li>Brands</li>
                    </ul>
                </div>
                <div class="col-footer col-5 col-lg-2 p-4">
                    <ul>
                        <h4>Porta Deliveboo con te!</h4>
                        <img src="https://i.postimg.cc/Z5L7Z6y8/Tavola-da-disegno-4.png" alt="download android">
                        <img src="https://i.postimg.cc/RZmsjgqC/Tavola-da-disegno-5.png" alt="download ios">
                    </ul>
                </div>
            </div>
            <div class="footer-top-icon d-flex justify-content-between align-items-center mb-3">
                <div class="container-social d-flex justify-content-around">
                    <i class="fa-brands fa-instagram"></i>
                    <i class="fa-brands fa-facebook"></i>
                    <i class="fa-brands fa-twitter"></i>
                </div>
                <div class="container-copyright">
                    <span style="color: #b9b3b3">©Team-7 - Boolean</span>
                </div>
            </div>
        </div>

        <div class="footer-bottom d-flex align-items-center justify-content-center text-white">
            <p class="py-3 text-center">
                Made with <span style="color: red"><i class="fa-solid fa-heart"></i></span> by Marco Cusenza, Francesca
                De Luca, Andrei Gabriel Andrescu, Roberto D'Ambrosio
            </p>
        </div>
    </footer>
</body>

</html>
