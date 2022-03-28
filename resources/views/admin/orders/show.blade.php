@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <h3 class="card-header">N° Ordine: {{ $order->order_number }}</h3>

                <div class="client-data p-4">
                    <h4><i class="fa-solid fa-user mr-3"></i>Dati del cliente:</h4>
                    <div class="client-name mt-3"><span style="font-weight: bold">Cliente: </span>
                        {{ $order->client_name }} {{ $order->client_surname }}</div>

                    <div class="client-address mt-1"><span style="font-weight: bold">Indirizzo:
                        </span>{{ $order->client_address }}</div>
                    @if ($order->client_address != $order->delivery_address)
                    <div class="delivery-address mt-1">Indirizzo di spedizione: {{ $order->delivery_address }}</div>
                    @endif

                    <div class="client-address mt-1"><span style="font-weight: bold">Email:</span>
                        {{ $order->client_email }}</div>
                    <div class="client-address mt-1"><span style="font-weight: bold">Telefono:</span>
                        {{ $order->client_phone }}</div>

                    @if ($order->note != null)
                    <div class="delivery-address mt-1"><span style="font-weight: bold">Note: </span>{{ $order->note }}
                    </div>
                    @endif

                    <div class="dishes">
                        <h4 class="mt-3 mb-2"><i class="fa-solid fa-utensils mr-3"></i>Piatti Ordinati:</h4>
                        @foreach ($dishes as $dish)
                        <div class="dish mt-1">
                            <span class="dish-name">{{ $dish[0]->name }} x{{ $dish[1] }}</span>
                        </div>
                        @endforeach
                    </div>

                    <div class="delivery-address">
                        <h4 class="mt-4">Prezzo totale: <span
                                style="font-weight: bold">{{ number_format($order->price_tot, 2) }} &euro;</span></h4>
                    </div>

                    <a href="{{ route('orders.index') }}" class="btn btn-primary mt-3">Torna agli ordini</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection