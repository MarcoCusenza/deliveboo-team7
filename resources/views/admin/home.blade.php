@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        Benvenuto {{ Auth::user()->name }}

                        @php
                            use App\Restaurant;
                            $tot_rest = Restaurant::all()
                                ->where('user_id', auth()->id())
                                ->toArray();
                        @endphp

                        {{-- PULSANTE CREA RISTORANTE --}}
                        @if ($tot_rest == null)
                            <a type="button" class="btn btn-danger" href="{{ route('restaurants.create') }}">Crea
                                Ristorante</a>
                        @endif

                        @if ($tot_rest != null)
                            {{-- PULSANTE GUARDA RISTORANTE --}}
                            <a type="button" class="btn btn-success" href="{{ route('restaurants.index') }}">Guarda il tuo
                                Ristorante</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
