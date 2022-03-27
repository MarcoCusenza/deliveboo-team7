@extends('layouts.app')



@section('content')
    <div class="container">
        <div class="card card-dashboard-dishes mb-5 p-3">
            <div class="card-header">
                <h2>Lista Ordini</h2>
            </div>
            
            <div class="card-body">                
                @if ($orders)
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col" class="d-none d-md-block">Data Ordine</th>
                                <th scope="col">Numero Ordine</th>
                                <th scope="col">Prezzo</th>                                
                                <th scope="col" class="d-none d-md-block">Cliente</th>
                                
                            </tr>
                        </thead>
        
                        <tbody>
                            @foreach ($orders as $order)
                                <tr>
                                    <td class="d-none d-md-block">{{$order->created_at}}</td>
                                    <td>{{$order->order_number}}</td>
                                    <td>{{$order->price_tot}} &euro;</td>                                    
                                    <td class="d-none d-md-block">{{$order->client_name}} {{$order->client_surname}}</td>
                                    
                                    <td>
                                        <a href="{{route("orders.show", $order->id)}}"><button type="button" class="btn btn-primary">Dettagli</button></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
    </div>
    
@endsection
