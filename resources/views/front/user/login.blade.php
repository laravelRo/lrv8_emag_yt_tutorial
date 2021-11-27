@extends('front.template')

@section('meta_title', 'Logare utilizator')
@section('meta_description', 'Logare utilizatori pe situl e-mag online shopping')
@section('meta_keywords', 'emag larvel 8, login accout, register account')

@section('content')

    <!-- Page Header Start -->
    <div class="container-fluid bg-secondary mb-5">
        <div class="d-flex flex-column align-items-center py-4 justify-content-center" style="min-height: 300px">
            <h1 class="font-weight-semi-bold text-uppercase mb-3">Logare in cont</h1>
            <form style="width:500px;" action="{{ route('login') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="email">Adresa email cont *</label>
                    <input name="email" type="email" class="form-control  @error('email') is-invalid @enderror" id="email">
                    @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="password">Parola *</label>
                    <input name="password" type="password" class="form-control  @error('password') is-invalid @enderror"
                        id="password">
                    @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group mb-0">
                    <input type="submit" value="Login" class="btn btn-primary btn-block px-3">
                </div>
            </form>
            <div class="my-2">
                <a href="{{ route('password.request') }}">V-ati uitat parola contului? Otineti o noua parola</a>
            </div>
        </div>
    </div>
    <!-- Page Header End -->

@endsection
