@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-12">
        <div class="card">
          <h3 class="card-header">N° Ordine: {{ $order->order_number }}</h3>

          <div class="client-data">
            <h4>Dati del cliente:</h4>
            <div class="client-name">Cliente: {{ $order->client_name }} {{ $order->client_surname }}</div>

            <div class="client-address">Indirizzo: {{ $order->client_address }}</div>
            @if ($order->client_address != $order->delivery_address)
              <div class="delivery-address">Indirizzo di spedizione: {{ $order->delivery_address }}</div>
            @endif

            <div class="client-address">Email: {{ $order->client_email }}</div>
            <div class="client-address">Telefono: {{ $order->client_phone }}</div>

            @if ($order->note != null)
              <div class="delivery-address">Note: {{ $order->note }}</div>
            @endif

            {{-- @dd($dishes); --}}
            <div class="dishes">
              <h4>Piatti Ordinati:</h4>
              @foreach ($dishes as $dish)
                <div class="dish">
                  <span class="dish-name">{{ $dish[0]->name }} x{{ $dish[1] }}</span>
                </div>
              @endforeach
            </div>

            <div class="delivery-address">
              <h4>Prezzo totale: </h4>
              <span>{{ number_format($order->price_tot, 2) }} &euro;</span>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>
@endsection
