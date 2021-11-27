@extends('front.user.cpanel.main')

@section('panel_content')
    <h1 class="text-center">
        Resetare parola
    </h1>
    <h3 class="text-center">
        {{ auth()->user()->name }} | cont <span class="text-primary">{{ auth()->user()->type }}</span>
    </h3>
    <div class="alert alert-info">
        Va puteti schimba parola curenta daca considerati ca nu mai este adecvata utilizarii acestui cont.<br>
        Introduceti parola curenta, apoi noua parola si confirmati aceasta noua parola.
    </div>
    <div class="card mx-auto w-75 p-3">
        <form class="mx-auto" style="width:500px;" action="{{ route('change-pass') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="current_pass">Parola actuala*</label>
                <input name="current_pass" type="text" class="form-control @error('current_pass') is-invalid @enderror"
                    id="current_pass">
                @error('current_pass')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="newpassword">Noua parola *</label>
                <input name="newpassword" type="password" class="form-control @error('newpassword') is-invalid @enderror"
                    id="newpassword">
                @error('newpassword')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="newpassword_confirmation">Confirmare noua parola *</label>
                <input name="newpassword_confirmation" type="password"
                    class="form-control @error('newpassword_confirmation') is-invalid @enderror"
                    id="newpassword_confirmation">
                @error('newpassword_confirmation')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group mb-0">
                <input type="submit" value="Reseteaza parola" class="btn btn-primary btn-block px-3">
            </div>
        </form>

    </div>

@endsection
