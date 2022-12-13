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
                <h3>Special Offers</h3>
                @forelse($promo_products as $promo)
                    <div class="card shadow my-3 border">
                        <img src="{{ $promo->photoUrl() }}" class="card-img-top" alt=""
                            title="{{ $promo->name }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $promo->name }}</h5>
                            {!! $promo->excerpt !!}
                        </div>
                        <div class="card-footer d-flex justify-content-between bg-light border">
                            <a href="{{ route('product', $promo->slug) }}" class="btn btn-sm text-dark p-0"><i
                                    class="fas fa-eye text-primary mr-1"></i>View
                                Detail</a>
                            @livewire('products.add-cart', ['product_id' => $promo->id], key(time() . 'cart' . $promo->id))
                        </div>
                    </div>
                @empty
                @endforelse

            </div>

            <div class="col-lg-9">

                @include('front.content.carusel-photos', ['carusel' => $brand])
                <div class="text-center my-5">
                    <h2 class="section-title px-5"><span class="px-2">Most popular {{ $brand->name }}
                            products</span></h2>
                </div>
                <div class="row">
                    @forelse($popular_products as $product)
                        <div class="col-lg-4 col-md-6 col-sm-12 pb-1">
                            @include('front.partials.product-single', ['item' => $product])
                        </div>
                    @empty
                    @endforelse
                </div>


                {!! $brand->description !!}
            </div>
        </div>
    </div>


@endsection
