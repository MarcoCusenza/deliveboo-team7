<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    {{-- <meta name="csrf-token" content="{{ csrf_token() }}">
    <script>
        window.token = document.querySelector("meta[name='csrf-token']").getAttribute("content");
    </script> --}}

    <title>DeliveBoo</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Outfit" rel="stylesheet">

    {{-- link css --}}
    <link rel="stylesheet" href="{{ asset('css/front.css') }}">

</head>

<body>
    <div id="app"></div>
    {{-- BRAINTREE --}}
    <script src="https://js.braintreegateway.com/web/dropin/1.13.0/js/dropin.min.js"></script>
    {{-- BRAINTREE --}}
    <script src="{{ asset('js/front.js') }}"></script>
</body>

</html>
