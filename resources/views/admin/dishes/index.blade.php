@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card card-dashboard-dishes mb-5 p-3">
        <div class="card-header bg-white d-flex align-items-center justify-content-between">
            <h2>Lista Piatti</h2>
            <a href="{{ route('dishes.create') }}" class="btn btn-dashboard mr-3">Aggiungi piatto</a>
        </div>
        
        <div class="card-body">
            @if ($dishes->isEmpty())
            <span>Questo ristorante attualmente non ha piatti</span>
            @else
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Nome</th>
                        <th scope="col">Prezzo</th>
                        <th scope="col">Visibile</th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($dishes as $dish)
                    <tr>
                        <td class="pt-3">{{ $dish->name }}</td>
                        <td  class="pt-3">{{number_format($dish->price, 2)}} &euro;</td>
                        <td  class="pt-3">
                            @if ($dish->visible)
                            <h6><span class="badge badge-success">Visibile</span></h6>
                            @else
                            <h6><span class="badge badge-secondary">Non visibile</span></h6>
                            @endif
                        </td>
                        <td class="pt-3"><a href="{{ route('dishes.show', $dish->id) }}" class="text-dark text-decoration-none"><i class="fa-solid fa-eye"></i></a></td>
                        <td class="pt-3"><a href="{{ route('dishes.edit', $dish->id) }}"class="text-dark text-decoration-none"><i class="fa-solid fa-pencil"></i></a></td>
                        <td> <button type="button" class="btn btn-danger" data-toggle="modal"
                                data-target="#exampleModal">
                                <i class="fa-solid fa-trash"></i>
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
    </div>
</div>
@endsection