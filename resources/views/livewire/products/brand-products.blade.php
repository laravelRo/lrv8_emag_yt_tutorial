<div class="row px-xl-5">
    <div class="col-lg-3 col-md-12">
        {{-- ===>>> FILTRELE CU ATRIBUTELE SECTIUNII --}}
        <span class="badge bg-success text-light p-2 my-2">total produse: {{ $products->total() }}</span>
        <button wire:click="resetFilters" class="bg-transparent text-success float-right" style="border:none;"
            title="Reset all filters">
            <i class="fas fa-sync-alt"></i>
        </button>

        {{-- === range input for price --}}
        <div class="wrapper">
            <div class="values">
                <span id="range1">
                    {{ $minPriceSelected }}
                </span>
                <span> &dash; </span>
                <span id="range2">
                    {{ $maxPriceSelected }}
                </span>
            </div>
            <div wire:ignore class="container">
                <div class="slider-track"></div>
                <input wire:model="minPriceSelected" type="range" min="0" max="{{ $maxPrice }}"
                    id="slider-1" oninput="slideOne()">
                <input wire:model="maxPriceSelected" type="range" min="0" max="{{ $maxPrice }}"
                    id="slider-2" oninput="slideTwo()">
            </div>
        </div>
        {{-- END=== range input for price --}}

        @forelse($sections as $section)
            <div class="card my-3 p-2 {{ $filteredSection == $section->section->id ? 'bg-success' : '' }}">
                <img wire:click="setSection({{ $section->section->id }})" src="{{ $section->section->photoUrl() }}"
                    title="{{ $section->section->name }}" alt="" class="card-img-top" style="cursor: pointer;">
                <div class="card-body bg-warning">
                    <h5 class="card-title">{{ $section->section->name }}</h5>
                    <h6 wire:click="setSection({{ $section->section->id }})" class="card-subtitle mb-2 text-primary"
                        style="cursor: pointer;">{{ $section->number_products }}
                        products</h6>
                </div>

            </div>

        @empty
            <div class="alert alert-warning">
                No sections with products for this brand
            </div>
        @endforelse

    </div>

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
                </div>
            @empty
                <div class="alert alert-info">
                    <h3>No products for this brand</h3>
                </div>
            @endforelse
            <div class="col-12 pb-1 my-3">
                <nav aria-label="Page navigation">
                    {{ $products->links() }}
                </nav>

            </div>

        </div>
    </div>

</div>
