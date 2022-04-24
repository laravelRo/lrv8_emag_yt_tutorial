@extends('front.template')

@section('meta_title', 'Setari cont')
@section('meta_description',
    'setari cont utilizator, resetare parola, adrese livrare, adrese facturare, cupoane
    reduceri, comenzi',)
@section('meta_keywords', 'emag larvel 8, setari cont, resetare parola, adaugare adrese, produse favorite, comenzi')

@section('content')
    <hr>
    <div class="container-fluid my-3 py-4" style="background-color: #F1F1F1;">

        <div class="row px-xl-5">
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header text-light" style="background-color: rgb(71, 53, 29)">
                        <a href="{{ route('settings') }}"> Setari cont</a>
                    </div>
                    <div class="card-body">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><a href="{{ route('address.show') }}">
                                    <i class="fas fa-address-book"></i> Adrese livrare /
                                    facturare</a></li>
                            <li class="list-group-item">Istoric comenzi</li>
                            <li class="list-group-item">Mesaje / sesizari admin</li>
                            <li class="list-group-item">Oferte speciale</li>
                            <li class="list-group-item"> <a href="{{ route('reset-pass') }}">Schimbare parola</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                @include('admin.partials.messages')
                @yield('panel_content')
            </div>
        </div>
        {{-- end row --}}
    </div>
    {{-- end container --}}

@endsection
