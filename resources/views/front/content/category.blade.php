@extends('front.template')

@section('meta_title', $category->meta_title ? $category->meta_title : 'Categorii R-Shop')
@section('meta_description', $category->meta_description ? $category->meta_description : 'Categoy list for section')
@section('meta_keywords',
    $category->meta_keywords
    ? $category->meta_keywords
    : 'Categorii produse R-Shop, filtrare pret produse,
    filtrare culori, filtrare marimi, xl',)

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
                @include('front.content.carusel-photos',['carusel'=>$category])

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
                    @forelse ($promo_products as $product)
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
                                    <a href="" class="btn btn-sm text-dark p-0"><i
                                            class="fas fa-shopping-cart text-primary mr-1"></i>Add To Cart</a>
                                </div>
                            </div>
                        </div>

                    @empty
                    @endforelse
                </div>

            </div>
        </div>
    </div>


@endsection
