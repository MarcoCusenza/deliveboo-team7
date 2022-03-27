@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-12">
        <div class="card">
          <h3 class="card-header">{{ $order->order_number }}</h3>

          <div class="client-data">
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

            <div class="delivery-address">Prezzo totale: {{ $order->price_tot }}€</div>
          </div>



        </div>
      </div>
    </div>
  </div>
@endsection
