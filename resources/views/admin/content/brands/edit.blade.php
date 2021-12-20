@extends('admin.template')

@section('content')
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Edit Brand <span class="text-info">{{ $brand->name }}</span> </h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="{{ route('control-panel') }}">Control Panel</a></li>
                <li class="breadcrumb-item"><a href="{{ route('brands.list') }}">Brands</a></li>
                <li class="breadcrumb-item active">
                    Edit <span class="text-info">{{ $brand->name }}</span>
                </li>
            </ol>

            <div class="card mb-4 p-4">
                <form action="{{ route('brands.update', $brand->id) }}" method="POST" enctype="multipart/form-data">
                    @method('put')
                    @csrf
                    {{-- === randul 1 name slug title --}}
                    <div class="row my-3">
                        <div class="col-md-3">
                            <label for="name" class="form-label">Brand name</label>
                            <input onblur="setSlug()" type="text" name="name"
                                class="form-control @error('name') is-invalid @enderror" id="name"
                                value="{{ old('name', $brand->name) }}" placeholder="enter brand name">
                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-md-3">

                            <div class="form-check form-check-inline">
                                <input name="change_slug" class="form-check-input" type="checkbox" id="inlineCheckbox1"
                                    value="true">
                                {{-- <label class="form-check-label" for="inlineCheckbox1">1</label> --}}
                            </div>

                            <label for="slug" class="form-label">Brand slug</label>
                            <input type="text" name="slug" class="form-control @error('slug') is-invalid @enderror"
                                id="slug" value="{{ old('slug', $brand->slug) }}"
                                placeholder="slug must be unique and slug">

                            @error('slug')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="title" class="form-label">Brand title</label>
                            <input type="text" name="title" class="form-control @error('title') is-invalid @enderror"
                                id="title" value="{{ old('title', $brand->title) }}" placeholder="Brand slogan">
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

                            <label for="description" class="form-label">Brand description</label>
                            <textarea name="description" class="form-control @error('description') is-invalid @enderror"
                                id="description" rows="3">{!! old('description', $brand->description) !!}</textarea>
                            @error('description')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-md-2">
                            <label for="position" class="form-label">Position</label>
                            <input name="position" type="number" value="{{ old('position', $brand->position) }}"
                                class="form-control @error('position') is-invalid @enderror" id="position">

                            @error('position')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror


                        </div>

                        <div class="col-md-2 align-bottom">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" value="1" name="active" id="active1"
                                    {{ old('active', $brand->active) == 1 ? 'checked' : '' }} @if (is_null(old('active', $brand->active))) checked @endif>
                                <label class="form-check-label" for="active1">
                                    Active
                                </label>

                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="active" id="active2" value="0"
                                    {{ old('active', $brand->active) === 0 ? 'checked' : '' }}>
                                <label class="form-check-label" for="active2">
                                    Inactive
                                </label>

                            </div>

                        </div>

                        <div class="col-md-2 align-bottom">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="promo" id="promo1" value="0"
                                    {{ old('promo', $brand->promo) === 0 ? 'checked' : '' }} @if (is_null(old('promo', $brand->promo))) checked @endif>
                                <label class="form-check-label" for="promo1">
                                    Standard
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="promo" id="promo2" value="1"
                                    {{ old('promo', $brand->promo) == 1 ? 'checked' : '' }}>
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
                                <img id="photo-preview" src="{{ $brand->photoUrl() }}" alt=""
                                    style="max-width: 200px; max-height:200px; display:inline-block;">
                            </div>
                            <div class="custom-file">
                                <label for="photoFile" class="form-label">Selectati foto Brand</label>
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
                                value="{{ old('meta_title', $brand->meta_title) }}">
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
                                value="{{ old('meta_description', $brand->meta_description) }}">
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
                                value="{{ old('meta_keywords', $brand->meta_keywords) }}">
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
                            <a href="{{ route('brands.list') }}" class="btn btn-dark float-start" type="submit">
                                <i class="fas fa-undo"></i> return</a>

                            <button class="btn btn-primary float-end" type="submit"> <i class="fas fa-save"></i>
                                Update Brand</button>
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
