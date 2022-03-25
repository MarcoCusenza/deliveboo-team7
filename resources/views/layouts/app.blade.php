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
</body>

</html>
