@extends('front.template')

@section('meta_title', 'User Cart')
@section('meta_description', 'Produsele din cosul de cumparaturi')
@section('meta_keywords', 'laravel emag, product cart, user product, order')

@section('content')
    <!-- Page Header Start -->
    <div class="container-fluid bg-secondary mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
            <h1 class="font-weight-semi-bold text-uppercase mb-3">Cosul de produse @livewire('products.count-cart')</h1>
            <div class="d-inline-flex">
                <p class="m-0"><a href="">Home</a></p>
                <p class="m-0 px-2">-</p>
                <p class="m-0">Cosul de produse</p>
            </div>
        </div>
    </div>
    <!-- Page Header End -->

    <!-- Cart Start -->
    @livewire('products.cart-products')
    {{-- end contianer --}}

@endsection
@section('customJs')
    <script>
        window.confirmDeleteItem = function(id, name) {
            Swal.fire({
                icon: 'question',
                text: 'Confirmati stergerea produsului ' + name + ' din cos?',
                showCancelButton: true,
                confirmButtonText: 'Delete',
                confirmButtonColor: '#e3342f',
            }).then((result) => {
                if (result.isConfirmed) {
                    Livewire.emit('deleteItemCart', id);
                    Swal.fire({
                        icon: 'success',
                        title: 'Produs scos din cos',
                        text: 'Produsul ' + name + ' a fost sters din cos!'
                    })
                }
            });
        }
    </script>
@endsection
