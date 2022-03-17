@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Lista Piatti</div>
                    <a href="{{ route('dishes.create') }}" class="btn btn-warning">Aggiungi piatto</a>
                    <div class="card-body">
                        @if ($dishes->isEmpty())
                            Questo ristorante attualmente non ha piatti
                        @else
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">Nome</th>
                                        <th scope="col">Slug</th>
                                        <th scope="col">Prezzo</th>
                                        <th scope="col">Visibile al pubblico</th>
                                        <th scope="col"></th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($dishes as $dish)
                                        <tr>
                                            <td>{{ $dish->name }}</td>
                                            <td>{{ $dish->slug }}</td>
                                            <td>{{ $dish->price }} euro</td>
                                            <td>
                                                @if ($dish->visible)
                                                <h3><span class="badge badge-success">Visibile</span></h3>
                                                @else
                                                <h3><span class="badge badge-secondary">Non visibile</span></h3>
                                                @endif
                                            </td>
                                            <td><a href="{{ route('dishes.show', $dish->id) }}"
                                                    class="btn btn-warning">Visualizza
                                                    piatto</a></td>
                                            <td><a href="{{ route('dishes.edit', $dish->id) }}"
                                                    class="btn btn-warning">Modifica
                                                    piatto</a></td>
                                            <td>
                                                <form action="{{ route('dishes.destroy', $dish->id) }}" method="POST">
                                                    @csrf
                                                    @method("DELETE")
                                                    <button type="submit" class="btn btn-danger">Elimina piatto</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @endif
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
