@extends('admin.template')

@section('content')
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Edit category <span class="text-info">{{ $category->name }}</span> id - <span
                    class="text-danger">{{ $category->id }}</span> - Section <span
                    class="text-info">{{ $category->section->name }}</span>
            </h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="{{ route('control-panel') }}">Control Panel</a></li>
                <li class="breadcrumb-item"><a href="{{ route('categories.list') }}">Categories</a></li>
                <li class="breadcrumb-item active">Edit Category
                    <span class="text-info">{{ $category->name }}</span>
                </li>
                <li class="breadcrumb-item"><a href="{{ route('categories.photos', $category->id) }}">Photo Gallery</a>
                </li>
            </ol>

            <div class="card mb-4 p-4">
                <form action="{{ route('categories.update', $category->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    {{-- === randul 1 name slug title --}}
                    <div class="row my-3">
                        <div class="col-md-3">
                            <label for="name" class="form-label">Category name</label>
                            <input onblur="setSlug()" type="text" name="name" required
                                class="form-control @error('name') is-invalid @enderror" id="name"
                                value="{{ old('name', $category->name) }}" placeholder="enter category name">
                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-md-3">
                            <label for="slug" class="form-label">Category slug</label>
                            <input type="text" name="slug" required class="form-control @error('slug') is-invalid @enderror"
                                id="slug" value="{{ old('slug', $category->slug) }}"
                                placeholder="slug must be unique and slug">
                            @error('slug')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="title" class="form-label">Category title</label>
                            <input type="text" required name="title"
                                class="form-control @error('title') is-invalid @enderror" id="title"
                                value="{{ old('title', $category->title) }}" placeholder="Category short description">
                            @error('title')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    {{-- <<<=== randul 1 name slug title --}}

                    {{-- <<<=== randul 2 description promo, icon, active, position --}}
                    <div class="row my-3">
                        <div class="col-md-6">

                            <label for="description" class="form-label">Category description</label>
                            <textarea name="description" class="form-control @error('description') is-invalid @enderror"
                                id="description" rows="3">{!! old('description', $category->description) !!}</textarea>
                            @error('description')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-md-2">
                            <label for="position" class="form-label">Position</label>
                            <input name="position" type="number" value="{{ old('position', $category->position) }}"
                                class="form-control @error('position') is-invalid @enderror" id="position">

                            @error('position')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror


                        </div>

                        <div class="col-md-2">
                            <label for="icon" class="form-label">
                                <i class="{{ isset($category->icon) ? $category->icon : 'fas fa-th-list' }}"></i>
                                Icon (font-awesome)
                            </label>
                            <input name="icon" type="text" class="form-control @error('icon') is-invalid @enderror"
                                id="icon" value="{{ old('icon', $category->icon) }}">

                            @error('icon')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>



                        <div class="col-md-1 align-bottom">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" value="1" name="active" id="active1"
                                    {{ old('active', $category->active) == 1 ? 'checked' : '' }}
                                    @if (is_null(old('active'))) checked @endif>
                                <label class="form-check-label" for="active1">
                                    Active
                                </label>

                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="active" id="active2" value="0"
                                    {{ old('active', $category->active) === 0 ? 'checked' : '' }}>
                                <label class="form-check-label" for="active2">
                                    Inactive
                                </label>

                            </div>
                            @error('icon')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>

                        <div class="col-md-1 align-bottom">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="promo" id="promo1" value="0"
                                    {{ old('promo', $category->promo) === 0 ? 'checked' : '' }} @if (is_null(old('promo', $category->promo))) checked @endif>
                                <label class="form-check-label" for="active1">
                                    Standard
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="promo" id="promo2" value="1"
                                    {{ old('promo', $category->promo) == 1 ? 'checked' : '' }}>
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
                    </div>

                    {{-- <<<=== randul 2 description icon promo, active, position --}}

                    {{-- === randul 3 fotografia --}}
                    <div class="row my-3">
                        <div class="col-md-6">
                            <div id="img-preview">
                                <img id="photo-preview" src="{{ $category->photoUrl() }}" alt=""
                                    style="max-width: 200px; max-height:200px; display:inline-block;">
                            </div>
                            <div class="custom-file">
                                <label for="photoFile" class="form-label">Selectati foto categorie</label>
                                <input class="form-control" value="{{ old('photo') }}" type="file" accept="image/*"
                                    id="photoFile" name="photo">
                            </div>
                            @error('photo')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>
                    </div>
                    {{-- <<<=== randul 3 fotografia --}}

                    {{-- ===>>> randul 4 meta tagurile --}}

                    <div class="row mt-5 p-3 bg-light">
                        <div class="col-md-4">
                            <label for="meta_title" class="form-label">Meta title</label>
                            <input name="meta_title" type="text"
                                class="form-control @error('meta_title') is-invalid @enderror" id="meta_title"
                                value="{{ old('meta_title', $category->meta_title) }}">
                            @error('meta_title')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="col-md-4">
                            <label for="meta_description" class="form-label">Meta description</label>
                            <input name="meta_description" type="text"
                                class="form-control @error('meta_description') is-invalid @enderror" id="meta_description"
                                value="{{ old('meta_description', $category->meta_title) }}">
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
                                value="{{ old('meta_keywords', $category->meta_title) }}">
                            @error('meta_keywords')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                    </div>

                    {{-- <<<=== randul 4 meta tagurile --}}

                    {{-- === randul cu butoanele de return si submit --}}
                    <div class="row mt-4">
                        <div class="col-md-12">
                            <a href="{{ route('categories.list') }}" class="btn btn-dark float-start" type="submit">
                                <i class="fas fa-undo"></i> return</a>

                            <button class="btn btn-primary float-end" type="submit"> <i class="fas fa-save"></i>
                                Update category</button>
                        </div>
                    </div>
                    {{-- === randul cu butoanele de return si submit --}}
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
        CKEDITOR.replace('description');
    </script>


@endsection
