@extends('front.template')

@section('meta_title', $category->meta_title ? $category->meta_title : 'Sectiunile R-Shop')
@section('meta_description', $category->meta_description ? $category->meta_description : 'Category products')
@section('meta_keywords',
    $category->meta_keywords
    ? $category->meta_keywords
    : 'Produsele R-Shop, filtrare pret produse,
    filtrare culori, filtrare marimi, xl')

@section('content')


    <!-- Page Header Start -->
    <div class="container-fluid bg-secondary mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
            <h1 class="font-weight-semi-bold text-uppercase mb-3 mt-2"><a
                    href="{{ route('section.products', $category->section->slug) }}">
                    {{ $category->section->name }}</a>
                - <a href="{{ route('category', $category->slug) }}">{{ $category->name }}</a> - products
                ({{ $category->products_count }})</h1>


            <div class="d-inline-flex mb-2">
                <p class="m-0"><a href="{{ route('home') }}">Home</a></p>
                <p class="m-0 px-2">-</p>
                <p class="m-0"><a
                        href="{{ route('section.products', $category->section->slug) }}">{{ $category->section->name }}
                        products</a>
                </p>
                <p class="m-0 px-2">-</p>
                <p class="m-0"><a href="{{ route('category', $category->slug) }}">{{ $category->name }}</a>
                </p>
                <p class="m-0 px-2">-</p>
                <p class="m-0"> <span class="text-muted">products ({{ $category->products_count }})</span>
                </p>
            </div>
        </div>
    </div>
    <!-- Page Header End -->

    <div class="container-fluid pt-5">
        @livewire('products.category-products', ['category' => $category])
    </div>

@endsection
