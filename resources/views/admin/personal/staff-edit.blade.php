@extends('admin.template')

@section('content')
    <main>
        <div class="container-fluid px-4">


            <h1 class="mt-4">Staff members - Edit staff <span class="text-info">{{ $user->name }}</span> /
                <span class="text-danger">{{ $user->id }}</span>
            </h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="{{ route('control-panel') }}">Control Panel</a></li>
                <li class="breadcrumb-item "><a href="{{ route('show.staff') }}">Staff members</a></li>
                <li class="breadcrumb-item active">Edit staff data <span class="text-info">{{ $user->name }}</span>
                    with id <span class="text-danger">{{ $user->id }}</span> </li>
            </ol>
            <div class="row">
                {{-- primul formular --}}
                <div class="col-md-9">
                    <form id="dates" action="{{ route('update.staff', $user->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="card p-4">
                            <div class="row">
                                <div class="col-md-5">
                                    <label for="name" class="form-label">Nume si prenume*</label>
                                    <input name="name" value="{{ old('name', $user->name) }}" type="text"
                                        class="form-control @error('name') is-invalid @enderror" required id="name">
                                    @error('name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="col-md-5">
                                    <label for="email" class="form-label">Email*</label>
                                    <input name="email" value="{{ old('email', $user->email) }}" type="email"
                                        class="form-control @error('email') is-invalid @enderror"
                                        id="
                                                                                                                                                                                                                                                                                                    email"
                                        required>
                                    @error('email')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>


                            </div>

                            <div class="row mt-3 d-flex align-items-end">
                                <div class="col-md-5">
                                    <div id="img-preview">
                                        <img id="photo-preview" src="{{ $user->photoUrl() }}" alt=""
                                            style="max-width: 200px; max-height:200px; display:inline-block;">
                                    </div>
                                    <div class="custom-file">
                                        <label for="formFile" class="form-label">Selectati foto membru</label>
                                        <input class="form-control" value="{{ old('photo') }}" type="file"
                                            accept="image/*" id="photoFile" name="photo">
                                    </div>
                                    @error('photo')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="col-md-5 align-bottom">
                                    <div class="mb-3">
                                        <label for="phone" class="form-label">Telefon (pot fi mai multe numere)</label>
                                        <input name="phone" value="{{ old('phone', $user->phone) }}" type="text"
                                            class="form-control @error('phone') is-invalid @enderror" id="phone">
                                        @error('phone')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <label class="form-label">Selectati functia*</label>
                                    <select class="form-select" aria-label="Default select example"
                                        value="{{ old('type', $user->type) }}" name="type">
                                        <option value="editor" {{ $user->type == 'editor' ? 'selected' : '' }}>Editor
                                        </option>
                                        <option value="asistent" {{ $user->type == 'asistent' ? 'selected' : '' }}>
                                            Asistent
                                        </option>
                                        <option value="manager" {{ $user->type == 'manager' ? 'selected' : '' }}>Manager
                                        </option>
                                    </select>

                                    @error('type')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            {{-- >>> butoanele de submit si return --}}
                            <div class="row mt-3">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-success float-end">Update Staff</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                {{-- <<<=== end col-9 --}}

                {{-- al doilea formular --}}
                <div class="col-md-3">
                    <div class="row ">
                        <form id="password" action="{{ route('password.staff', $user->id) }}" method="POST">
                            @csrf
                            @method('put')
                            <div class="alert alert-info">
                                Parola trebuie sa contina cel putin o litera, cel putin un numar si cel putin un simbol
                            </div>
                            <div class="card p-4 bg-light">
                                <div class="col-md-12">
                                    <label for="password" class="form-label">Password*</label>
                                    <input name="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" id=" password">
                                    @error('password')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-md-12">
                                    <label for="password_confirmation" class="form-label">Confirm password*</label>
                                    <input name="password_confirmation" type="password"
                                        class="form-control @error('password_confirmation') is-invalid @enderror"
                                        id="password_confirmation">
                                    @error('password_confirmation')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-md-12 mt-3">
                                    <button type="submit" class="btn btn-danger float-end">Update password</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                {{-- <<<=== end col-3 --}}

                <div class="col-md-12">
                    <a href="{{ route('show.staff') }}" title="Return to staff list page"
                        class="btn btn-dark float-end">Return</a>
                </div>

            </div>
            {{-- <<<=== end layout row --}}

            {{-- end container --}}
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
@endsection
