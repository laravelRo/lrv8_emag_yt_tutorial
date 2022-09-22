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
        </div>
    </div>
    <!-- Page Header End -->

    <div class="container-fluid pt-5">
        <div class="row px-xl-5">
            <div class="col-lg-3 col-md-12">

                {{-- ===>>> FILTRELE CU ATRIBUTELE SECTIUNII --}}

                @forelse($attributes as $attribute)
                    <div class="border-bottom mb-4 pb-4">
                        <h5 class="font-weight-semi-bold mb-4">{{ $attribute->name }}</h5>
                        <form id="form-filter-{{ $attribute->id }}">
                            @forelse($attribute->values as $value)
                                <div
                                    class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                                    <input type="checkbox" class="custom-control-input"
                                        id="attribute-value-{{ $attribute->id }}-{{ $value->id }}">
                                    <label class="custom-control-label"
                                        for="attribute-value-{{ $attribute->id }}-{{ $value->id }}">{{ $value->name }}</label>
                                    <span class="badge border font-weight-normal">100</span>
                                </div>
                            @empty
                            @endforelse

                        </form>
                    </div>
                @empty
                @endforelse
                <!-- ===>>> Attributes filter END -->

                {{-- @include('front.filters.price')

                @include('front.filters.colors')

                @include('front.filters.size') --}}

            </div>

            <div class="col-lg-9 col-md-12">
                <div class="row pb-3">
                    <div class="col-12 pb-1">
                        <div class="d-flex align-items-center justify-content-between mb-4">
                            <form action="">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search by name">
                                    <div class="input-group-append">
                                        <span class="input-group-text bg-transparent text-primary">
                                            <i class="fa fa-search"></i>
                                        </span>
                                    </div>
                                </div>
                            </form>
                            <div class="dropdown ml-4">
                                <button class="btn border dropdown-toggle" type="button" id="triggerId"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Sort by
                                </button>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="triggerId">
                                    <a class="dropdown-item" href="#">Latest</a>
                                    <a class="dropdown-item" href="#">Popularity</a>
                                    <a class="dropdown-item" href="#">Best Rating</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @forelse($products as $product)
                        <div class="col-lg-4 col-md-6 col-sm-12 pb-1">
                            {{-- numerotam produsele --}}
                            <span class="badge badge-secondary float-start">
                                {{ $products->currentPage() > 1 ? $loop->iteration + $products->perPage() * ($products->currentPage() - 1) : $loop->iteration }}
                            </span>

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
                                    @livewire('products.add-cart', ['product_id' => $product->id], key(time() . 'cart' . $product->id))
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="alert alert-info">
                            <h3>No products in this section</h3>
                        </div>
                    @endforelse
                    <div class="col-12 pb-1">
                        <nav aria-label="Page navigation">
                            {{ $products->links() }}
                        </nav>

                    </div>

                </div>
            </div>

        </div>
    </div>

@endsection
