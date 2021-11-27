@extends('front.template')

@section('meta_title', 'Resetare parola')
@section('meta_description', 'Resetare parola uitata pentru utilizatorii existenti')
@section('meta_keywords', 'emag larvel 8, login accout, register account')

@section('content')

    <!-- Page Header Start -->
    <div class="container-fluid bg-secondary mb-5">
        <div class="d-flex flex-column align-items-center py-4 justify-content-center" style="min-height: 300px">
            <h1 class="font-weight-semi-bold text-uppercase mb-3">Resetare parola</h1>
            <form style="width:500px;" action="{{ route('password.update') }}" method="POST">
                @csrf
                <!-- Password Reset Token -->
                <input type="hidden" name="token" value="{{ $request->route('token') }}">


                <div class="form-group">
                    <label for="email">Adresa email cont *</label>
                    <input name="email" type="email" class="form-control  @error('email') is-invalid @enderror" id="email"
                        value="{{ old('email', $request->email) }}" required>
                    @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="password">Parola *</label>
                    <input name="password" type="password" class="form-control  @error('password') is-invalid @enderror"
                        id="password" required>
                    @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="password_confirmation">Confirmare parola *</label>
                    <input name="password_confirmation" type="password"
                        class="form-control  @error('password_confirmation') is-invalid @enderror"
                        id="password_confirmation" required>
                    @error('password_confirmation')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group mb-0">
                    <input type="submit" value="Reset password" class="btn btn-primary btn-block px-3">
                </div>
            </form>

        </div>
    </div>
    <!-- Page Header End -->

@endsection
