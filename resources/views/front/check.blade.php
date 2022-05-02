@extends('front.template')

@section('meta_title', 'Comanda produse')
@section('meta_description', 'Verificarea cosului de cumparaturi si plasarea comenzii')
@section('meta_keywords', 'emag Laravel, check order, address, shipping address')

@section('content')
    <!-- Page Header Start -->
    <div class="container-fluid bg-secondary mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
            <h1 class="font-weight-semi-bold text-uppercase mb-3">Comanda produse</h1>
            <div class="d-inline-flex">
                <p class="m-0"><a href="{{ route('home') }}">Home</a></p>
                <p class="m-0 px-2">-</p>
                <p class="m-0"><a href="{{ route('cart') }}">Cos</a></p>
                <p class="m-0 px-2">-</p>
                <p class="m-0">Comanda produse</p>
            </div>
        </div>
    </div>
    <!-- Page Header End -->


    @livewire('products.check')

    {{-- end container --}}
@endsection
