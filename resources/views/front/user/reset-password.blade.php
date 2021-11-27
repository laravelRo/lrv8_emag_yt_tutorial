@extends('front.template')

@section('meta_title', 'Resetare parola')
@section('meta_description', 'Cerere resetare parola utilizator')
@section('meta_keywords', 'emag larvel 8, login accout, register account')

@section('content')

    <!-- Page Header Start -->
    <div class="container-fluid bg-secondary mb-5">
        <div class="d-flex flex-column align-items-center py-4 justify-content-center" style="min-height: 300px">
            <h1 class="font-weight-semi-bold text-uppercase mb-3">Cerere link resetare parola</h1>
            <form style="width:500px;" action="{{ route('password.email') }}" method="POST">
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


                <div class="form-group mb-0">
                    <input type="submit" value="Link resetare parola" class="btn btn-primary btn-block px-3">
                </div>
            </form>

            @php
                if (session('status')) {
                    alert()
                        ->success('Linkul a fost trimis', session('status'))
                        ->persistent(true, false);
                }

            @endphp
            {{ session('status') }}


            @error('email')
                @php
                    alert()
                        ->error('Eroare', $message)
                        ->persistent(true, false);
                @endphp
            @enderror

        </div>
    </div>

    <!-- Page Header End -->

@endsection
