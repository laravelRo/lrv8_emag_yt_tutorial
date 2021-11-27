@extends('front.template')

@section('meta_title', 'Verificare email')
@section('meta_description', 'Cerere verificare email')
@section('meta_keywords', 'emag larvel 8, verificare email utilizator curent')

@section('content')
    <div class="container-fluid bg-secondary mb-5">
        <div class="d-flex flex-column align-items-center py-4 justify-content-center" style="min-height: 300px">
            <h1 class="font-weight-semi-bold text-uppercase mb-3">Validare cont utilizator</h1>
            <p>
                Nu puteti accesa aceasta sectiune a sitului fara a avea emailul validat. Va rugam apasati butonul de mai jos
                pentru a primi un email cu un link de validare a contului.
            </p>
            <form method="POST" action="{{ route('verification.send') }}">
                @csrf
                <div class="form-group mb-0">
                    <input type="submit" value="Trimite email validare" class="btn btn-primary btn-block px-3">
                </div>

            </form>
            @if (session('status') == 'verification-link-sent')
                <div class="mb-4 font-medium text-sm text-green-600">
                    A fost trimis un nou email la adresa {{ auth()->user()->email }} pentru validarea contului
                </div>
            @endif
        </div>
    </div>

@endsection
