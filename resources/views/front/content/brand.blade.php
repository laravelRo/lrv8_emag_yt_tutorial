@extends('front.template')
@section('meta_title', $brand->meta_title ? $brand->meta_title : 'R-Shop Brands')
@section('meta_description', $brand->meta_description ? $brand->meta_description : 'R-Shop products for brands')
@section('meta_keywords',
    $brand->meta_keywords
    ? $brand->meta_keywords
    : 'R-Shop Brands, best products, best running
    brands')

@section('content')
    <!-- Page Header Start -->
    <div class="container-fluid bg-secondary mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">

            <h1 class="font-weight-semi-bold text-uppercase my-3 ">{{ $brand->name }} -
                <a href="{{ route('brand.products', $brand->slug) }}">
                    <span class="text-warning text-lowercase" style="font-size: 0.6em;">view products
                        {{ $brand->publicProducts()->total() }}</span>
                </a>
            </h1>
            <img src="{{ $brand->photoUrl() }}" alt="">
            <h2 class="text-center mt-3">{{ $brand->title }}</h2>

            <div class="d-inline-flex mt-3">
                <p class="m-0"><a href="{{ route('home') }}">Home</a></p>
                <p class="m-0 px-2">-</p>
                <p class="m-0"><a href="{{ route('brands') }}">Brands</a></p>
                <p class="m-0 px-2">-</p>
                <p class="m-0">{{ $brand->name }}</p>

                <p class="m-0 px-2">-</p>
                <p class="m-0"><a href="{{ route('brand.products', $brand->slug) }}">products
                        {{ $brand->publicProducts()->total() }}</a></p>
            </div>

            @if ($brand_coupons)
                @foreach ($brand_coupons as $coupon)
                    <p class="text-warning bg-info p-2">{{ $loop->iteration }}. Cod <b>{{ $coupon->code }}</b> :
                        {{ $coupon->description }}
                    </p>
                @endforeach
            @endif



        </div>
    </div>
    {{-- end container --}}
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3">

            </div>

            <div class="col-lg-9">

                @include('front.content.carusel-photos', ['carusel' => $brand])
                <div class="text-center my-5">
                    <h2 class="section-title px-5"><span class="px-2">Most popular {{ $brand->name }}
                            products</span></h2>
                </div>
                <div class="row">
                    @forelse($promo_products as $product)
                        <div class="col-lg-4 col-md-6 col-sm-12 pb-1">
                            <div class="card product-item border-0 mb-4">
                                <div
                                    class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                                    <img class="img-fluid w-100" src="{{ $product->photoUrl() }}" alt="">
                                </div>
                                <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                                    <h6 class="text-truncate mb-3">{{ $product->name }}</h6>
                                    <div class="d-flex justify-content-center">
                                        <h6>{{ $product->price }}</h6>
                                        <h6 class="text-muted ml-2">
                                            <del>{{ $product->price + ($product->price + $product->discount / 100) }}</del>
                                        </h6>
                                    </div>
                                </div>
                                <div class="card-footer d-flex justify-content-between bg-light border">
                                    <a href="{{ route('product', $product->slug) }}" class="btn btn-sm text-dark p-0"><i
                                            class="fas fa-eye text-primary mr-1"></i>View
                                        Detail</a>
                                    {{-- <a href="" class="btn btn-sm text-dark p-0"><i
                                            class="fas fa-shopping-cart text-primary mr-1"></i>Add To Cart</a> --}}
                                    @livewire('products.add-cart', ['product_id' => $product->id], key(time() . 'cart' . $product->id))
                                </div>
                            </div>
                        </div>
                    @empty
                    @endforelse
                </div>


                {!! $brand->description !!}
            </div>
        </div>
    </div>


@endsection
