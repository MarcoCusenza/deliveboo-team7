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
    <div id="app"></div>
    <script src="{{ asset('js/front.js') }}"></script>
</body>

</html>
