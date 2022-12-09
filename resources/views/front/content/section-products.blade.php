@extends('front.template')

@section('meta_title', $section->meta_title ? $section->meta_title : 'Sectiunile R-Shop')
@section('meta_description', $section->meta_description ? $section->meta_description : 'Section products')
@section('meta_keywords',
    $section->meta_keywords
    ? $section->meta_keywords
    : 'Produsele R-Shop, filtrare pret produse,
    filtrare culori, filtrare marimi, xl')

@section('content')


    <!-- Page Header Start -->
    <div class="container-fluid bg-secondary mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
            <h1 class="font-weight-semi-bold text-uppercase mb-3 mt-2">{{ $section->name }} - products
                ({{ $section->publicProducts()->total() }}) </h1>


            <div class="d-inline-flex mb-2">
                <p class="m-0"><a href="{{ route('home') }}">Home</a></p>
                <p class="m-0 px-2">-</p>
                <p class="m-0"><a href="{{ route('section', $section->slug) }}">{{ $section->name }}</a> -
                </p>
                <p class="m-0"> <span class="text-muted"> view products</span></p>
            </div>

            <div class="mx-3 my-2">
                @forelse($section->categories as $category)
                    <a href="{{ route('category.products', $category->slug) }}">{{ $category->name }}</a> &nbsp;
                @empty
                @endforelse
            </div>

        </div>
    </div>
    <!-- Page Header End -->

    <div class="container-fluid pt-5">
        @livewire('products.section-products', ['section' => $section])
    </div>

@endsection
