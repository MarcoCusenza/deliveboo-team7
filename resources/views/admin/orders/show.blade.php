@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <h3 class="card-header">{{$order->order_number}}</h3>

                    @dd($order)
                </div>
            </div>
        </div>
    </div>
@endsection