@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card card-dashboard-dishes mb-5 p-3">
        <div class="card-header">
            <h2>Lista Piatti</h2>
        </div>
        <a href="{{ route('dishes.create') }}" class="btn btn-warning m-3">Aggiungi piatto</a>
        <div class="card-body">
            @if ($dishes->isEmpty())
            <span>Questo ristorante attualmente non ha piatti</span>
            @else
            <table class="table table-striped table-responsive">
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
                        <td>{{ $dish->price }} &euro;</td>
                        <td>
                            @if ($dish->visible)
                            <h3><span class="badge badge-success">Visibile</span></h3>
                            @else
                            <h3><span class="badge badge-secondary">Non visibile</span></h3>
                            @endif
                        </td>
                        <td><a href="{{ route('dishes.show', $dish->id) }}" class="btn btn-dashboard">Visualizza
                                piatto</a></td>
                        <td><a href="{{ route('dishes.edit', $dish->id) }}" class="btn btn-warning">Modifica
                                piatto</a></td>
                        <td> <button type="button" class="btn btn-danger" data-toggle="modal"
                                data-target="#exampleModal">
                                Elimina
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Conferma eliminazione</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            Sei sicuro di voler eliminare?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Torna
                                                indietro</button>
                                            <form action="{{ route('dishes.destroy', $dish->id) }}" method="POST">
                                                @csrf
                                                @method("DELETE")
                                                <button type="submit" class="btn btn-danger">Elimina piatto</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @endif
        </div>

@endsection