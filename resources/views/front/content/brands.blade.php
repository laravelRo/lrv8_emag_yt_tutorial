@extends('front.template')
@section('meta_title', 'R-Shop Brnads')
@section('meta_description', 'R-Shop Brands on site with products')
@section('meta_keywords', 'running, brands, clothes, accessories')

@section('content')
    <!-- Page Header Start -->
    <div class="container-fluid bg-secondary mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
            <h1 class="font-weight-semi-bold text-uppercase mb-3">R-Shop Brands</h1>
            <div class="d-inline-flex">
                <p class="m-0"><a href="{{ route('home') }}">Home</a></p>
                <p class="m-0 px-2">-</p>
                <p class="m-0">List of R-Shop Brands</p>
            </div>
        </div>
    </div>
    {{-- end container --}}
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3">

            </div>

            <div class="col-lg-9">

                <div class="row mt-4">
                    @forelse($brands as $brand)
                        <div class="col-md-3">
                            <a href="{{ route('brand', $brand->slug) }}">
                                <div class="card product-item border-0">
                                    <div
                                        class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                                        <img class="img-fluid w-100" src="{{ $brand->photoUrl() }}"
                                            alt="{{ $brand->name }}">
                                    </div>
                                    <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                                        <h6 class="text-truncate mb-3">{{ $brand->name }}</h6>
                                        <div class="d-flex justify-content-center">
                                            <h6>{{ $brand->title }}</h6>

                                        </div>
                                    </div>
                                    <div class="card-footer d-flex justify-content-between bg-light border">
                                        <a href="{{ route('brand', $brand->slug) }}" class="btn btn-sm text-dark p-0"><i
                                                class="fas fa-eye text-primary mr-1"></i>{{ $brand->name }} description
                                            and
                                            products</a>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @empty
                        <div class="alert alert-info">
                            <h3>No Brands in our Shop!</h3>
                        </div>
                </div>
                @endforelse


            </div>
        </div>
    </div>

@endsection
