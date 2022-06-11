<div>
    <h3>{{ $products->total() }} Products -
        @if (isset($section_title))
            <span class="text-primary">{{ $section_title }}</span>
        @else
            all sections
        @endif

        @if (isset($category_title))
            <span class="text-success">{{ $category_title }}</span>
        @endif
        <a href="{{ route('products.new') }}" class="btn btn-primary float-end"><i class="fas fa-plus"></i>&nbsp;New
            Product</a>
    </h3>

    {{-- search row with group buttuns --}}
    <div class="row">
        <div class="col-md-4 offset-md-3 mb-2">
            <div class="input-group">
                <input wire:model.lazy="search_product" type="text" class="form-control"
                    placeholder="Search product and press ENTER" title="press Enter after typing product name"
                    aria-label="Input group example" aria-describedby="searchButton">
                <div wire:click="refreshProducts" class="input-group-text bg-success text-white" id="searchButton"
                    style="cursor:pointer;" title="Show all products"><i class="fas fa-sync-alt"></i></div>
            </div>
        </div>
    </div>

    {{-- fitler row by sections and categories --}}
    <div class="row bg-warning py-2 mb-4">
        <div class="col-md-4">
            Sections<br>
            @forelse ($sections as $section)
                <span wire:click="selectSection({{ $section->id }})"
                    class="badge mr-3
                    {{ $selected_section == $section->id ? 'bg-primary' : 'bg-secondary' }}"
                    style="cursor: pointer">{{ $section->name }}</span>
            @empty
                No sections and no products
            @endforelse
        </div>
        <div class="col-md-8">
            Categories
            @isset($selected_categories)
                @forelse($selected_categories as $selected_cat)
                    <span wire:click="selectCategory({{ $selected_cat->id }})"
                        class="badge rounded-pill mr-3
                     {{ $selected_categoryid == $selected_cat->id ? 'bg-success' : 'bg-secondary' }}"
                        style="cursor: pointer" id="category-{{ $selected_cat->id }}">{{ $selected_cat->name }}</span>
                @empty
                    No selected section - no categories
                @endforelse
            @endisset
        </div>
    </div>

    {{-- filter row for brands --}}
    <div class="row bg-light">
        <div class="col-md-12 mb-3">
            Brands:
            @forelse($brands as $brand)
                <span wire:click="selectBrand({{ $brand->id }})"
                    class="badge py-2
                   {{ $selected_brandid == $brand->id ? 'bg-danger text-white' : 'bg-warning text-dark' }}"
                    style="cursor: pointer;" id="brand-{{ $brand->id }}">{{ $brand->name }}</span>

            @empty
                No Brands
            @endforelse
        </div>

    </div>

    <table class="table table-bordered table-striped">
        <thead class="table-dark">

            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th class="text-center" scope="col">Photo</th>
            <th class="text-center" scope="col">Price / Stock</th>
            <th class="text-center" scope="col">Categories</th>
            <th scope="col">Active / Promo</th>
            <th scope="col">Actions</th>

        </thead>

        <tbody>
            @forelse ($products as $product )
                <tr>
                    <td>
                        {{ $products->currentPage() > 1 ? $loop->iteration + $products->perPage() * ($products->currentPage() - 1) : $loop->iteration }}
                    </td>
                    <td width="350">
                        {{ $product->name }} (<span class="text-danger">{{ $product->id }})</span> - <span
                            class="text-warning">{{ $product->brand->name }}</span>
                        <br>
                        <span wire:click="selectSection({{ $product->section->id }})" class="badge bg-primary"
                            style="cursor: pointer;"
                            id="section-{{ $section->id }} }}">{{ $product->section->name }}</span>
                    </td>
                    <td class="text-center">
                        @livewire('admin.product-photo', ['model' => $product, 'default_image' => 'product.jpg', 'folder' => 'products'], key(time() . 'img' . $product->id))
                        {{-- <img src="{{ $product->photoUrl() }}" width="60" alt=""> --}}
                    </td>
                    <td class="text-center" width="150">{{ $product->price }} <br> <span
                            class="text-info">{{ $product->stock }}</span></td>
                    <td class="text-left">
                        @forelse($product->categories->sortBy('name') as $categ)
                            <span wire:click="selectCategory({{ $categ->id }})"
                                id="{{ $categ->id }}-{{ $product->id }}"
                                class="badge mr-3
                                 {{ $selected_categoryid == $categ->id ? 'bg-success' : 'bg-secondary' }}"
                                style=" cursor: pointer">{{ $categ->name }}</span>
                        @empty
                            No category
                        @endforelse

                    </td>

                    <td wire:ignore.self width="200">
                        @livewire('admin.sections-status', ['model' => $product], key(time() . 'ap' . $product->id))
                    </td>
                    <td width="150">
                        <a title="Editeaza produs {{ $product->name }}"
                            href="{{ route('products.edit', ['id' => $product->id, 'currentPage' => $products->currentPage()]) }}"
                            class="btn btn-success btn-sm btn-circle"><i class="fas fa-edit fa-2x"></i>
                        </a>
                        <a href="{{ route('products.photos', ['id' => $product->id, 'currentPage' => $products->currentPage()]) }}"
                            title="adauga galerie foto" class="btn btn-primary btn-sm btn-circle">
                            <i class="fas fa-images fa-2x"></i>
                        </a>
                        <button wire:ignore wire:click="openModalCategs({{ $product->id }})" type="button"
                            class="btn btn-warning btn-sm btn-circle">
                            <i class="fas fa-list-alt fa-2x"></i>
                        </button>
                    </td>


                </tr>
            @empty
                <div class="alert alert-info">
                    No Products in the database!
                </div>
            @endforelse
        </tbody>
    </table>

    {{ $products->links() }}

    @include('admin.content.products.modal-categories')


</div>
