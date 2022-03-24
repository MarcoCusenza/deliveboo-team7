@extends('layouts.app')



@section('content')
    <div class="container">
        <h2>Lista Ordini</h2>
        @if ($orders)
            <table class="table table-striped table-responsive">
                <thead>
                    <tr>
                        <th scope="col">Numero Ordine</th>
                        <th scope="col">Prezzo</th>
                        <th scope="col">Data</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($orders as $order)
                        <tr>
                            <td>{{ $order->order_number }}</td>
                            <td>{{ $order->price_tot }} &euro;</td>
                            <td>{{ $order->created_at }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection
