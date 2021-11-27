@extends('front.template')

@section('meta_title', 'Creare cont e-mag')
@section('meta_description', 'Creare cont pentru utilizatorii noi ai e-mag online shopping')
@section('meta_keywords', 'emag larvel 8, new accout, register account')

@section('content')

    <!-- Page Header Start -->
    <div class="container-fluid bg-secondary mb-5">
        <div class="d-flex flex-column align-items-center py-4 justify-content-center" style="min-height: 300px">
            <h1 class="font-weight-semi-bold text-uppercase mb-3">Inregistrare cont nou</h1>
            <form style="width:500px;" action="{{ route('register') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="name">Nume utilizator *</label>
                    <input name="name" type="text" class="form-control @error('name') is-invalid @enderror" id="name">
                    @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="email">Adresa email valida *</label>
                    <input name="email" type="email" class="form-control @error('email') is-invalid @enderror" id="email">
                    @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="passwords">Parola *</label>
                    <input name="password" type="password" class="form-control @error('password') is-invalid @enderror"
                        id="password">
                    @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="password_confirmation">Confirmare parola *</label>
                    <input name="password_confirmation" type="password"
                        class="form-control @error('password_confirmation') is-invalid @enderror"
                        id="password_confirmation">
                    @error('password_confirmation')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group mb-0">
                    <input type="submit" value="Creaza cont" class="btn btn-primary btn-block px-3">
                </div>
            </form>

        </div>
    </div>
    <!-- Page Header End -->

@endsection
