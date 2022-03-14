@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Lista Piatti</div>
                <a href="{{ route('dishes.create') }}" class="btn btn-warning">Aggiungi piatto</a>
                <div class="card-body">
                    <table class="table table-striped">
                    <thead>
                      <tr>
                        <th scope="col">Nome</th>
                        <th scope="col">Slug</th>
                        <th scope="col">Prezzo</th>
                        <th scope="col">Visible</th>
                        <th scope="col"></th>
                      </tr>
                    </thead>
                    
                    <tbody>
                        @foreach ($dishes as $dish)
                        <tr>
                            <td>{{$dish->name}}</td>
                            <td>{{$dish->slug}}</td>
                            <td>{{$dish->price}} euro</td>
                            <td>{{$dish->visible}}</td>
                            {{-- <td><a href="{{ route('dishes.edit', $dish->id) }}" class="btn btn-warning">Modifica piatto</a></td> --}}
                        </tr>
                        @endforeach
                    </tbody>                      
                   </table>
                </div>
                    
            </div>
        </div>
    </div>
</div>
@endsection