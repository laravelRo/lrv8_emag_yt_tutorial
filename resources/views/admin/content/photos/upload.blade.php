@extends('admin.template')

@section('content')

    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Photo Galery for <span class="text-info">{{ $category->name }}</a> category
            </h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="{{ route('control-panel') }}">Control Panel</a></li>
                <li class="breadcrumb-item"><a href="{{ route('categories.list') }}">Categories</a></li>
                <li class="breadcrumb-item active">Categories</li>
                <li class="breadcrumb-item"><a href="{{ route('categories.edit', $category->id) }}">Edit Category</a>
                </li>
            </ol>

            <div class="row">
                @livewire('admin.photos-upload', ['model'=>$category, 'path'=>'categories/'.$category->id.'/'])
            </div>


            {{-- @livewire('admin.photos-gallery', ['model'=>$category, 'path'=>'categories']) --}}


        </div>
    </main>

@endsection

@section('customJs')

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.getElementById("photos").addEventListener("change", function() {
            if (this.files.length > 12) {
                Swal.fire({
                    icon: 'error',
                    title: 'Too many files: ' + this.files.length + ' uploaded, 12 max',
                    text: 'You can upload max 12 files one time',
                    footer: '<h4>If you need to upload more than 12 files you mus repeat the upload process!</h4>'
                });
                this.value = '';
            }
        });

        Livewire.on('photosUploaded', (message) => {

            Swal.fire({
                icon: 'success',
                title: 'Imaginile au fost incarcate',
                text: message,

            });
            document.getElementById("photos").value = '';
        });

        window.deletePhotoConfirm = function(id, number) {
            Swal.fire({
                icon: 'question',
                text: 'Confirmati stergerea imaginii selectate cu numarul ' + number + ' ?',
                showCancelButton: true,
                confirmButtonText: 'Delete',
                confirmButtonColor: '#e3342f',
            }).then((result) => {
                if (result.isConfirmed) {
                    Livewire.emit('deletePhoto', id);

                }
            });
        }

        window.deleteAllPhotos = function() {
            Swal.fire({
                icon: 'question',
                text: 'Confirmati stergerea completa a gleriei foto?',
                showCancelButton: true,
                confirmButtonText: 'Delete',
                confirmButtonColor: '#e3342f',
            }).then((result) => {
                if (result.isConfirmed) {
                    Livewire.emit('deleteGallery');
                    Swal.fire(
                        'Galeria foto a fost stearsa!',
                        'Toate imaginile din galeria foto au fost sterse de pe hdd si din baza de date',
                        'success'
                    );
                }
            });
        }
    </script>

@endsection

@section('customCss')
    <style>
        img.clickable:hover {
            border: 1px solid blueviolet;
        }

    </style>

@endsection
