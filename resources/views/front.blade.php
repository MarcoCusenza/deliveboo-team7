<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>DeliveBoo</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Outfit" rel="stylesheet">

    {{-- link css --}}
    <link rel="stylesheet" href="{{ asset('css/front.css') }}">

</head>

<body>
    {{-- <div class="flex-center position-ref full-height">
        @if (Route::has('login'))
            <div class="top-right links">
                @auth
                    <a href="{{ url('/home') }}">Home</a>
                @else
                    <a href="{{ route('login') }}">Login</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}">Register</a>
                    @endif
                @endauth
            </div>
        @endif --}}

    {{-- <a style="background-color: red; color:antiquewhite; padding: 10px; border-radius: 10px; font-weight:900;"
                href="{{ route('home') }}">Back
                Office</a> --}}

    <div id="app"></div>
    <script src="{{ asset('js/front.js') }}"></script>
</body>

</html>
