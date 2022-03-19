@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Verifica il tuo indirizo e-mail') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('È stato inviato un link di conferma al tuo indirizzo e-mail') }}
                        </div>
                    @endif

                    {{ __('Prima di continuare, controlla la tua e-mail per il link di conferma.') }}
                    {{ __('Se non hai ricevuto il link di conferma') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('Clicca qui per inviare un altro link di conferma') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
