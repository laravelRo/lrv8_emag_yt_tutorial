@extends('front.template')

@section('meta_title', 'Produsele emag')
@section('meta_description',
    'Produsele emag cu posibilitatea de filtrare dupa culoare, marime, pret si de ordonare dupa
    diverse criterii')
@section('meta_keywords', 'Produsele emag Laravel, filtrare pret produse, filtrare culori, filtrare marimi, xl')

@section('content')

    <!-- Page Header Start -->
    <div class="container-fluid bg-secondary mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
            <h1 class="font-weight-semi-bold text-uppercase mb-3">Products find for <span
                    class="text-info">{{ $search_term }} ({{ $products->total() }})</span></h1>
            <div class="d-inline-flex">
                <p class="m-0"><a href="{{ route('home') }}">Home</a></p>
                <p class="m-0 px-2">-</p>
                <p class="m-0">Search results</p>
            </div>
        </div>
    </div>
    {{-- end container --}}

    <div class="container-fluid pt-5">
        <div class="row px-xl-5">
            <div class="col-lg-3 mb-5">

            </div>
            <div class="col-lg-9 mb-5">
                <div class="row my-3">
                    @forelse($products as $product)
                        <div class="col-md-4 my-2">
                            {{-- numerotam produsele --}}
                            <span class="badge badge-secondary float-start">
                                {{ $products->currentPage() > 1 ? $loop->iteration + $products->perPage() * ($products->currentPage() - 1) : $loop->iteration }}
                            </span>
                            @include('front.partials.product-single', ['item' => $product])
                        </div>
                    @empty
                        <div class="alert alert-warning">No products for <span class="text-info">{{ $search_term }}</span>
                        </div>
                    @endforelse
                    <div class="col-12 pb-1 my-3">
                        <nav aria-label="Page navigation">
                            {{ $products->links() }}
                        </nav>

                    </div>
                </div>


            </div>


        </div>
        {{-- end row --}}

    </div>
    {{-- end container --}}
@endsection
