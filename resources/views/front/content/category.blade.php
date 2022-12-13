@extends('front.template')

@section('meta_title', $category->meta_title ? $category->meta_title : 'Categorii R-Shop')
@section('meta_description', $category->meta_description ? $category->meta_description : 'Categoy list for section')
@section('meta_keywords',
    $category->meta_keywords
    ? $category->meta_keywords
    : 'Categorii produse R-Shop, filtrare pret produse,
    filtrare culori, filtrare marimi, xl')

@section('content')

    <div class="container-fluid">
        <div class="row">
            {{-- zona lateral stanga --}}
            <div class="col-lg-3">
                @forelse($listCategories as $key => $sideCat)
                    <div class="list-category">
                        <a href="{{ route('category', $sideCat->slug) }}">
                            <h3>{{ $sideCat->name }}</h3>
                        </a>
                        <a href="{{ route('category', $sideCat->slug) }}">
                            <img src="{{ $sideCat->photoUrl() }}">
                        </a>
                    </div>

                @empty
                @endforelse

            </div>

            {{-- partea principala --}}
            <div class="col-lg-9">
                {{-- breadcrumb --}}
                <div class="bg-secondary">
                    <a href="{{ route('section', $category->section->slug) }}">{{ $category->section->name }}</a> /
                    {{ $category->name }}
                </div>

                {{-- titlul principal al paginii --}}
                <h1 class="text-primary text-center my-3">{{ $category->name }}
                    <a href="{{ route('category.products', $category->slug) }}" title="{{ $category->name }} products">
                        <span class="text-warning text-lowercase" style="font-size: 0.6em;">view products
                            ({{ $category->products_count }})
                        </span>
                    </a>
                </h1>

                {{-- sliderul categoriei --}}
                @include('front.content.carusel-photos', ['carusel' => $category])

                {{-- descrierea categoriei --}}
                <div class="row description">
                    <div class="col-md-6  border-right">
                        {!! $category->description !!}
                    </div>
                    <div class="col-md-6 d-flex flex-column justify-content-between">
                        <h2 class="text-info text-center">{{ $category->name }}</h2>
                        <div>
                            <img src="{{ $category->photoUrl() }}" alt="{{ $category->name }}">
                        </div>
                        <h4 class="text-info text-center">{{ $category->title }}</h4>
                    </div>
                </div>

                <hr>
                {{-- === afisam produsele favorite --}}
                <div class="row">
                    <div class="text-center my-5">
                        <h2 class="section-title px-5"><span class="px-2">Recomended
                                products in {{ $category->name }}</span></h2>
                    </div>
                    @forelse ($promo_products as $product)
                        <div class="col-lg-4 col-md-6 col-sm-12 pb-1">
                            @include('front.partials.product-single', ['item' => $product])
                        </div>

                    @empty
                    @endforelse
                </div>

            </div>
        </div>
    </div>


@endsection
