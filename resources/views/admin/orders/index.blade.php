@extends('layouts.app')



@section('content')
    <div class="container">
        <div class="card card-dashboard-dishes mb-5 p-3">
            <div class="card-header">
                <h2>Lista Ordini</h2>
            </div>
            <div class="card-body">                
                @if ($orders)
                    <table class="table table-striped table-responsive">
                        <thead>
                            <tr>
                                <th scope="col">Data Ordine</th>
                                <th scope="col">Numero Ordine</th>
                                <th scope="col">Prezzo</th>                                
                                <th scope="col">Cliente</th>
                                <th scope="col">Indirizzo email</th>
                                <th scope="col">Numero di telefono </th>
                                <th scope="col">Indirizzo consegna</th>
                            </tr>
                        </thead>
        
                        <tbody>
                            @foreach ($orders as $order)
                                <tr>
                                    <td>{{$order->created_at}}</td>
                                    <td>{{$order->order_number}}</td>
                                    <td>{{$order->price_tot}} &euro;</td>                                    
                                    <td>{{$order->client_name}} {{$order->client_surname}}</td>
                                    <td>{{$order->client_email}}</td>
                                    <td>{{$order->client_phone}}</td>
                                    <td>{{$order->delivery_address}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
        </div>
    </div>
@endsection
