@extends('front.template')
@section('meta_title', $brand->meta_title ? $brand->meta_title : 'R-Shop Brands')
@section('meta_description', $brand->meta_description ? $brand->meta_description : 'R-Shop products for brands')
@section('meta_keywords',
    $brand->meta_keywords
    ? $brand->meta_keywords
    : 'R-Shop Brands, best products, best running
    brands',)

@section('content')
    <!-- Page Header Start -->
    <div class="container-fluid bg-secondary mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">

            <h1 class="font-weight-semi-bold text-uppercase my-3 ">{{ $brand->name }}</h1>
            <img src="{{ $brand->photoUrl() }}" alt="">
            <h2 class="text-center mt-3">{{ $brand->title }}</h2>

            <div class="d-inline-flex mt-3">
                <p class="m-0"><a href="{{ route('home') }}">Home</a></p>
                <p class="m-0 px-2">-</p>
                <p class="m-0"><a href="{{ route('brands') }}">Brands</a></p>
                <p class="m-0 px-2">-</p>
                <p class="m-0">{{ $brand->name }}</p>
            </div>
        </div>
    </div>
    {{-- end container --}}
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3">

            </div>

            <div class="col-lg-9">

                @include('front.content.carusel-photos',['carusel'=>$brand])


                {!! $brand->description !!}
            </div>
        </div>
    </div>


@endsection
