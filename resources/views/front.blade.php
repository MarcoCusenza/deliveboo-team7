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
    {{-- BRAINTREE --}}
    <script src="https://js.braintreegateway.com/web/dropin/1.13.0/js/dropin.min.js"></script>


    {{-- //vecchio --}}
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://js.braintreegateway.com/web/dropin/1.8.1/js/dropin.min.js"></script> --}}
    {{-- <script>
        var button = document.querySelector('#submit-button');
        braintree.dropin.create({
            authorization: "{{ \Braintree\ClientToken::generate() }} ",
            container: '#dropin-container'
        }, function(createErr, instance) {
            button.addEventListener('click', function() {
                instance.requestPaymentMethod(function(err, payload) {
                    //SUBMIT PAYLOAD + NONCE al mio server
                    // $.get('{{ route('payment.make') }}', {
                    //     payload
                    // }, function(response) {
                    //     if (response.success) {
                    //         alert('Payment successfull!');
                    //     } else {
                    //         alert('Payment failed');
                    //     }
                    // }, 'json');
                });
            });
        });
    </script> --}}
    {{-- BRAINTREE --}}
    <script src="{{ asset('js/front.js') }}"></script>
</body>

</html>
