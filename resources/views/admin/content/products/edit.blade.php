@extends('admin.template')

@section('content')
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Edit Product <span class="text-info">{{ $product->name }}</span> - <span class="text-danger">id:
                    {{ $product->id }}</span>
            </h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="{{ route('control-panel') }}">Control Panel</a></li>
                <li class="breadcrumb-item">
                    <a href="{{ route('products.list', ['page' => $currentPage]) }}">Products</a>
                </li>
                <li class="breadcrumb-item active">Edit Product {{ $product->name }}</li>
                <li class="breadcrumb-item">
                    <a href="{{ route('products.photos', ['id' => $product->id, 'currentPage' => $currentPage]) }}">Photo
                        Gallery
                    </a>
                </li>
                @if ($product->suite_id > 0)
                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.suites.edit', $product->suite_id) }}">
                            Suita: {{ $product->suite->name }}
                        </a>
                    </li>
                @endif
            </ol>

            <div class="card p-4">
                <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    {{-- ===>>> Selectarea sectiunii formularului --}}
                    <div class="row my-3">
                        <div class="col-md-4 bg-light p-3 border">
                            <label class="form-label text-danger">Product section*</label>
                            <select name="section_id" class="form-select" aria-label="Default select example">
                                <option selected>Select product section</option>
                                @foreach ($sections as $section)
                                    <option {{ $section->id == $product->section_id ? 'selected' : '' }}
                                        value="{{ $section->id }}">{{ $section->name }}</option>
                                @endforeach

                            </select>
                        </div>
                        <div class="col-md-4 p-3">
                            <label class="form-label text-primary">Select Brand</label>
                            <select name="brand_id" class="form-select" aria-label="Default select example">
                                <option value="" selected>Select product Brand</option>
                                @foreach ($brands as $brand)
                                    <option {{ $brand->id == $product->brand_id ? 'selected' : '' }}
                                        value="{{ $brand->id }}">{{ $brand->name }}</option>
                                @endforeach

                            </select>
                        </div>
                    </div>

                    {{-- <<<=== Selectarea sectiunii formularului --}}


                    {{-- ===>>> PRIMUL RAND AL FORMULARULUI --}}
                    <div class="row my-3 d-flex align-items-end">
                        <div class="col-md-3 p-2">
                            <label for="name" class="form-label">Name*</label>
                            <input name="name" value="{{ old('name', $product->name) }}" type="text"
                                class="form-control @error('name') is-invalid @enderror" required id="name">
                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-md-3 p-2 bg-light">
                            <div class="form-check form-check-inline">
                                <input name="change_slug" class="form-check-input" type="checkbox" id="inlineCheckbox1"
                                    value="true">
                                {{-- <label class="form-check-label" for="inlineCheckbox1">1</label> --}}
                            </div>
                            <label for="slug" class="form-label">Slug*</label>
                            <input name="slug" value="{{ old('slug', $product->slug) }}" type="text"
                                class="form-control @error('slug') is-invalid @enderror" id="slug" required>
                            @error('slug')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="col-md-2 p-2">
                            <label for="price" class="form-label">Price*</label>
                            <input name="price" value="{{ old('price', $product->price) }}" type="number"
                                class="form-control @error('price') is-invalid @enderror" id="price">
                            @error('price')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-md-2 p-2">
                            <label for="discount" class="form-label">Discount %</label>
                            <input name="discount" value="{{ old('discount', $product->discount) }}" type="number"
                                class="form-control @error('discount') is-invalid @enderror" id="discount">
                            @error('discount')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-md-2 p-2">
                            <label for="stock" class="form-label">Stock</label>
                            <input name="stock" value="{{ old('stock', $product->stock) }}" type="number"
                                class="form-control @error('stock') is-invalid @enderror" id="stock">
                            @error('stock')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    {{-- <<<=== PRIMUL RAND AL FORMULARULUI --}}


                    {{-- ===>>> Al doilea rand RAND AL FORMULARULUI --}}
                    <div class="row my-3">
                        <div class="col-md-6">

                            <label for="description" class="form-label">Product excerpt* (max 700 chars)</label>
                            <textarea name="excerpt" class="form-control @error('excerpt') is-invalid @enderror" id="excerpt" rows="5">{{ old('excerpt', $product->excerpt) }}</textarea>
                            @error('excerpt')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label for="presentation" class="form-label">Product presentation</label>
                            <textarea name="presentation" class="form-control @error('presentation') is-invalid @enderror" id="presentation"
                                rows="5">{{ old('presentation', $product->presentation) }}</textarea>
                            @error('presentation')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                    </div>
                    {{-- <<<=== Al doilea rand RAND AL FORMULARULUI --}}

                    {{-- ===>>> Al treilea rand RAND AL FORMULARULUI --}}
                    <div class="row my-3 d-flex align-items-end">
                        <div class="col-md-4">
                            <div id="img-preview">
                                <img id="photo-preview" src="{{ $product->photoUrl() }}" alt=""
                                    style="max-width: 200px; max-height:200px; display:inline-block;">
                            </div>
                            <div class="custom-file">
                                <label for="photoFile" class="form-label">Selectati foto produs</label>
                                <input class="form-control" value="{{ old('photo') }}" type="file" accept="image/*"
                                    id="photoFile" name="photo">
                            </div>
                            @error('photo')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>
                        <div class="col-md-2">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" value="1" name="active"
                                    id="active1" {{ old('active', $product->active) == 1 ? 'checked' : '' }}
                                    @if (is_null(old('active'))) checked @endif>
                                <label class="form-check-label" for="active1">
                                    Active
                                </label>

                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="active" id="active2"
                                    value="0" {{ old('active', $product->active) === 0 ? 'checked' : '' }}>
                                <label class="form-check-label" for="active2">
                                    Inactive
                                </label>

                            </div>
                            @error('active')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>

                        <div class="col-md-2 align-bottom">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="promo" id="promo1"
                                    value="0" {{ old('promo', $product->promo) === 0 ? 'checked' : '' }}
                                    @if (is_null(old('promo'))) checked @endif>
                                <label class="form-check-label" for="active1">
                                    Standard
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="promo" id="promo2"
                                    value="1" {{ old('promo', $product->promo) == 1 ? 'checked' : '' }}>
                                <label class="form-check-label" for="promo2">
                                    Promo
                                </label>
                            </div>
                            @error('promo')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>

                        <div class="col-md-2">
                            <label for="position" class="form-label">Position in lists</label>
                            <input name="position" type="number" value="{{ old('position', $product->position) }}"
                                class="form-control @error('position') is-invalid @enderror" id="position">

                            @error('position')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror


                        </div>
                        <div class="col-md-2">
                            <label for="views" class="form-label">Views of product page</label>
                            <input name="views" type="number" value="{{ old('views', $product->views) }}"
                                class="form-control @error('views') is-invalid @enderror" id="views">

                            @error('views')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror


                        </div>



                    </div>
                    {{-- <<<=== Al treilea rand RAND AL FORMULARULUI --}}


                    {{-- ===>>> Al treilea rand RAND AL FORMULARULUI --}}

                    <div class="row mt-5 p-3 bg-light">
                        <div class="col-md-4">
                            <label for="meta_title" class="form-label">Meta title</label>
                            <input name="meta_title" type="text"
                                class="form-control @error('meta_title') is-invalid @enderror" id="meta_title"
                                value="{{ old('meta_title', $product->meta_title) }}">
                            @error('meta_title')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="col-md-4">
                            <label for="meta_description" class="form-label">Meta description</label>
                            <input name="meta_description" type="text"
                                class="form-control @error('meta_description') is-invalid @enderror"
                                id="meta_description" value="{{ old('meta_description', $product->meta_description) }}">
                            @error('meta_description')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <label for="meta_keywords" class="form-label">Meta keywords</label>
                            <input name="meta_keywords" type="text"
                                class="form-control @error('meta_keywords') is-invalid @enderror" id="meta_keywords"
                                value="{{ old('meta_keywords', $product->meta_keywords) }}">
                            @error('meta_keywords')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                    </div>

                    {{-- <<<=== Al treilea rand RAND AL FORMULARULUI --}}

                    <div class="row mt-4">
                        <div class="col-md-12">
                            <a href="{{ route('products.list', ['page' => $currentPage]) }}"
                                class="btn btn-dark float-start" type="submit">
                                <i class="fas fa-undo"></i> return</a>

                            <button class="btn btn-primary float-end" type="submit"> <i class="fas fa-save"></i>
                                Update Product</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </main>
@endsection

@section('customJs')
    <script>
        const chooseFile = document.getElementById("photoFile");
        const imgPreview = document.getElementById("img-preview");
        chooseFile.addEventListener("change", function() {
            getImgData();
        });

        function getImgData() {
            const files = chooseFile.files[0];
            if (files) {
                const fileReader = new FileReader();
                fileReader.readAsDataURL(files);
                fileReader.addEventListener("load", function() {
                    imgPreview.style.display = "block";
                    imgPreview.innerHTML = '<img src="' + this.result +
                        '" style="max-height:200px; max-width:200px;" class="photo-preview"/>';
                });
            }
        }
    </script>
    {{-- <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js"
        integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin="anonymous"></script> --}}
    <script>
        function setSlug() {
            var theTitle = document.getElementById("name").value.toLowerCase().trim();

            var theSlug = theTitle.replace(/&/g, '-and-')
                .replace(/[^a-z0-9-]+/g, '-')
                .replace(/\-\-+/g, '-')
                .replace(/^-+|-+$/g, '');

            document.getElementById("slug").value = theSlug;
        }
    </script>
    {{-- ckeditor scripts --}}
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    <script>
        // Replace the <textarea id="editor1"> with a CKEditor 4
        // instance, using default configuration.
        CKEDITOR.replace('excerpt');
        CKEDITOR.replace('presentation');
    </script>
@endsection
