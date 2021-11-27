@extends('admin.template')

@section('content')
    <main>
        <div class="container-fluid px-4">


            <h1 class="mt-4">Staff members - Add new member</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="{{ route('control-panel') }}">Control Panel</a></li>
                <li class="breadcrumb-item "><a href="{{ route('show.staff') }}">Staff members</a></li>
                <li class="breadcrumb-item active">Add new member of Staff</li>
            </ol>


            <div class="card p-4">
                <form action="{{ route('create.staff') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-4">
                            <label for="name" class="form-label">Nume si prenume*</label>
                            <input name="name" type="text" class="form-control @error('name') is-invalid @enderror" required
                                id="name">
                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <label for="email" class="form-label">Email*</label>
                            <input name="email" type="email" class="form-control @error('email') is-invalid @enderror" id="
                                                    email" required>
                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="col-md-4">
                            <label for="phone" class="form-label">Telefon (pot fi mai multe numere)</label>
                            <input name="phone" type="text" class="form-control @error('phone') is-invalid @enderror"
                                id="phone">
                            @error('phone')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mt-3 d-flex align-items-end">
                        <div class="col-md-4">
                            <div id="img-preview">
                                <img id="photo-preview" src="/admin/images/staff.jpg" alt=""
                                    style="max-width: 200px; max-height:200px; display:inline-block;">
                            </div>
                            <div class="custom-file">
                                <label for="formFile" class="form-label">Selectati foto membru</label>
                                <input class="form-control" type="file" accept="image/*" id="photoFile" name="photo">
                            </div>
                            @error('photo')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="col-md-4 align-bottom">
                            <label class="form-label">Selectati functia*</label>
                            <select class="form-select" aria-label="Default select example" name="type">
                                <option selected>Selectati functia membrului</option>
                                <option value="editor">Editor</option>
                                <option value="asistent">Asistent</option>
                                <option value="manager">Manager</option>
                            </select>

                            @error('type')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mt-5 p-3 bg-light">
                        <div class="col-md-4 offset-md-2">
                            <label for="password" class="form-label">Password*</label>
                            <input name="password" type="password"
                                class="form-control @error('password') is-invalid @enderror" id=" password">
                            @error('password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-md-4">
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
                    </div>

                    <div class="row mt-4">
                        <div class="col-md-12">
                            <a href="{{ route('show.staff') }}" class="btn btn-dark float-start" type="submit">
                                <i class="fas fa-undo"></i> return</a>

                            <button class="btn btn-primary float-end" type="submit"> <i class="fas fa-user-plus"></i> Add
                                member</button>
                        </div>
                    </div>



                </form>
            </div>


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
