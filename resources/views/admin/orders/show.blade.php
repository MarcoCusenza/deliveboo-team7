@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-12">
        <div class="card">
          <h3 class="card-header">{{ $order->order_number }}</h3>

          <div class="client-data">
            <div class="client-name">Cliente: {{ $order->client_name }} {{ $order->client_surname }}</div>
            <div class="client-address">{{ $order->client_address }}</div>
            @if ($order->client_address != $order->delivery_address)
              <div class="delivery-address">{{ $order->delivery_address }}</div>
            @endif
          </div>



        </div>
      </div>
    </div>
  </div>
@endsection
