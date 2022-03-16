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

        <nav class="navbar navbar-expand-md navbar-light bg-white">
            <div class="container-fluid">

                {{-- //LOGO --}}
                <div class="logo-container">
                    <a href="{{ url('/admin/home') }}"><img src="https://i.postimg.cc/4N3pvRP2/deliveroo-logo-4.png"
                            alt="deliveroo logo" class="logo" />
                        {{ config('DeliveBoo') }}
                    </a>
                </div>
                {{-- //HAMBURGER MOBILE --}}

                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">

                </ul>

                <!-- Right Side Of Navbar -->
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>
                {{-- //INIT DIV X RESPONSIVE MENU --}}
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ml-auto">
                            {{-- //LINK AUTENTICAZIONE --}}
                            @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Accedi') }}</a>
                            </li>
                            @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Registrati') }}</a>
                            </li>
                            @endif
                            @else

                            {{-- //LINK MENU --}}
                            <a href="{{ route('restaurants.index') }}" class="btn btn-light">Ristorante</a>
                            <a href="{{ route('dishes.index') }}" class="btn btn-light">Piatti</a>
                            {{-- //LINK UTENTE X LOGOUT --}}
                            <li class="nav-item dropdown">
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
                            </li>
                            @endguest
                        </ul>
                        {{-- //FINE ELEMENTI MENU --}}
                    </div>
                </div>

                {{-- //FINE DIV X RESPONSIVE MENU --}}

        </nav>





    </div>
    <main>
        @yield('content')
    </main>
</body>

</html>
