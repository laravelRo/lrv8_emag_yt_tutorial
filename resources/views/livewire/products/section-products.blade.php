<div class="row px-xl-5">
    {{-- ===ATRIBUTELE=== --}}
    <div class="col-lg-3 col-md-12">

        {{-- ===>>> FILTRELE CU ATRIBUTELE SECTIUNII --}}
        <span class="badge bg-success text-light p-2 my-2">total produse: {{ $products->total() }}</span>
        <button wire:click="resetFilters" class="bg-transparent text-success float-right" style="border:none;"
            title="Reset all filters">
            <i class="fas fa-sync-alt"></i>
        </button>
        {{-- === SHOW FILTER BRANDS --}}
        <h5 class="font-weight-semi-bold mb-4">
            Brands
        </h5>
        @forelse($brands AS $brand)
            <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                <input wire:model="filteredBrands" value="{{ $brand->id }}" type="checkbox"
                    class="custom-control-input" id="brand-value-{{ $brand->id }}">
                <label class="custom-control-label" for="brand-value-{{ $brand->id }}">{{ $brand->name }}</label>
                <span class="badge border font-weight-bold p-2">
                    {{ $brand->products()->where('section_id', $section->id)->count() }}
                </span>


            </div>


        @empty
        @endforelse
        {{-- ===END Brands --}}

        @forelse($attributes as $attribute)
            <div class="border-bottom mb-4 pb-4">
                <h5 class="font-weight-semi-bold mb-4">{{ $attribute->name }} ({{ $attribute->products->count() }})</h5>

                @forelse($attribute->values as $value)
                    <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                        <input wire:model="filteredValues" value="{{ $value->name }}" type="checkbox"
                            class="custom-control-input" id="attribute-value-{{ $attribute->id }}-{{ $value->id }}">
                        <label class="custom-control-label"
                            for="attribute-value-{{ $attribute->id }}-{{ $value->id }}">{{ $value->name }}</label>
                        <span class="badge border font-weight-bold p-2">
                            {{ $attribute->products()->wherePivot('value', $value->name)->where('section_id', $section->id)->count() }}
                        </span>


                    </div>
                @empty
                @endforelse



            </div>
        @empty
        @endforelse
        <!-- ===>>> Attributes filter END -->

        {{-- @include('front.filters.price')

                @include('front.filters.colors')

                @include('front.filters.size') --}}

    </div>
    {{-- === END ATRIBUTE --}}

    {{-- ===PRODUSELE=== --}}
    <div class="col-lg-9 col-md-12">
        <div class="row pb-3">
            <div class="col-12 pb-1">
                <div class="d-flex align-items-center justify-content-between mb-4">

                    <div class="input-group w-50">
                        <input wire:model.lazy="searchItem" type="text" class="form-control"
                            placeholder="Search by name">
                        <div wire:click="restoreSearch" class="input-group-append" style="cursor:pointer">
                            <span class="input-group-text bg-transparent text-primary">
                                <i class="fas fa-sync-alt"></i>
                            </span>
                        </div>
                    </div>




                    <div class="form-group ml-4">
                        <label for="exampleFormControlSelect1">Order By</label>
                        <select wire:model.lazy="orderItem" class="form-control" id="exampleFormControlSelect1">
                            <option value="name">Name</option>
                            <option value="price">Price asc</option>
                            <option value="price_desc">Price desc</option>
                            <option value="views_desc">Popularity</option>

                        </select>
                    </div>

                </div>
            </div>
            @forelse($products as $product)
                <div class="col-lg-4 col-md-6 col-sm-12 pb-1 my-3">
                    {{-- numerotam produsele --}}
                    <span class="badge badge-secondary float-start">
                        {{ $products->currentPage() > 1 ? $loop->iteration + $products->perPage() * ($products->currentPage() - 1) : $loop->iteration }}
                    </span>

                    @include('front.partials.product-single', ['item' => $product])

                    {{-- <div class="card product-item border-0 mb-4">
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
                    </div> --}}
                </div>
            @empty
                <div class="alert alert-info">
                    <h3>No products in this section</h3>
                </div>
            @endforelse
            <div class="col-12 pb-1 my-3">
                <nav aria-label="Page navigation">
                    {{ $products->links() }}
                </nav>

            </div>

        </div>
    </div>
    {{-- === END PRODUSE --}}

</div>
