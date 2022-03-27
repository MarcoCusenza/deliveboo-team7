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
                  <td class="d-none d-md-block">{{ $order->created_at }}</td>
                  <td>{{ $order->order_number }}</td>
                  <td>{{ number_format($order->price_tot, 2) }} &euro;</td>
                  <td class="d-none d-md-block">{{ $order->client_name }} {{ $order->client_surname }}</td>

                  <td>
                    <a href="{{ route('orders.show', $order->id) }}"><button type="button"
                        class="btn btn-primary">Dettagli</button></a>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>

          <div class="paginate-box text-center">
            @if ($orders->currentPage() - 1 > 0)
              <a href='/admin/orders?page={{ $orders->currentPage() - 1 }}'>
                <span class="prev">
                  < </span></a>
            @endif
            <span class="num-page">Pagina {{ $orders->currentPage() }} di
              {{ $orders->lastPage() }}</span>
            @if ($orders->currentPage() + 1 <= $orders->lastPage())
              <a href='/admin/orders?page={{ $orders->currentPage() + 1 }}'>
                <span class="prev">
                  > </span></a>
            @endif
          </div>
        @endif
      </div>
    </div>
  </div>
@endsection
