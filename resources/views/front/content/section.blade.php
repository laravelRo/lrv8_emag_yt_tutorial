@extends('front.template')

@section('meta_title', $section->meta_title ? $section->meta_title : 'Sectiunile R-Shop')
@section('meta_description', $section->meta_description ? $section->meta_description : 'Categoy list for section')
@section('meta_keywords',
    $section->meta_keywords
    ? $section->meta_keywords
    : 'Produsele R-Shop, filtrare pret produse,
    filtrare culori, filtrare marimi, xl')

@section('content')


    <!-- Page Header Start -->
    <div class="container-fluid bg-secondary mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
            <h1 class="font-weight-semi-bold text-uppercase mb-3 mt-2">{{ $section->name }}
                <a href="{{ route('section.products', $section->slug) }}" title="{{ $section->name }} products">
                    <span class="text-warning text-lowercase" style="font-size: 0.6em;">view products
                        ({{ $section->products_count }})
                    </span>
                </a>
            </h1>

            <div class="my-2">
                <img src="{{ $section->photoUrl() }}" alt="" style="max-width: 100%;">
            </div>
            <div class="text-center my-2 w-75" style="font-size: 1.2em; font-weight:bold; letter-spacing:1px;">
                {{ $section->description }}
            </div>
            <div class="d-inline-flex mb-2">
                <p class="m-0"><a href="{{ route('home') }}">Home</a></p>
                <p class="m-0 px-2">-</p>
                <p class="m-0">{{ $section->name }} - </p>
                <p class="m-0"> <a href="{{ route('section.products', $section->slug) }}"
                        title="{{ $section->name }} products">
                        <span class="text-warning"> view products</span>
                    </a>
                </p>
            </div>
        </div>
    </div>
    <!-- Page Header End -->

    <div class="container-fluid pt-5">
        <div class="row px-xl-5">
            <div class="col-lg-3 col-md-12">
                {{-- @include('front.filters.price')

                @include('front.filters.colors')

                @include('front.filters.size') --}}

            </div>

            <div class="col-lg-9 col-md-12">
                <div class="row pb-3">
                    @forelse ($section->categories as $category)
                        {{-- ===>>> afisam cateogriile sectiunii --}}
                        <div class="col-lg-4 col-md-6 col-sm-12 pb-1">
                            <div class="card product-item border-0 mb-4">
                                <div
                                    class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                                    <a href="{{ route('category', $category->slug) }}"><img class="img-fluid w-100"
                                            src="{{ $category->photoUrl() }}" alt="{{ $category->name }}"
                                            title="{{ $category->title }}"></a>
                                </div>
                                <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                                    <a href="{{ route('category', $category->slug) }}">
                                        <h6 class="text-truncate mb-3">{{ $category->name }}</h6>
                                    </a>
                                </div>
                                <div class="card-footer d-flex justify-content-between bg-light border">
                                    <a href="{{ route('category', $category->slug) }}" class="btn btn-sm text-dark p-0"><i
                                            class="fas fa-eye text-primary mr-1"></i>View
                                        category page</a>

                                </div>
                            </div>
                        </div>
                        {{-- <<<=== afisam cateogriile sectiunii --}}
                    @empty
                        <div class="alert alert-warning">
                            <h3>No categories for this section!</h3>
                        </div>
                    @endforelse



                </div>
            </div>

        </div>
    </div>

@endsection
