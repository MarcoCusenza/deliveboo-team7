@extends('layouts.app')

@section('content')
<div class="container mx-auto">
<div class="card" style="width: 18rem;">
  <img width="500" class="card-img-top" src="{{asset("storage/{$restaurant->image}")}}" alt="{{$restaurant->restaurant_name}}">
  <div class="card-body">
    <h5 class="card-title">{{$restaurant->restaurant_name}}</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    <a href="#" class="btn btn-primary">Go somewhere</a>
  </div>
</div>
</div>
@endsection