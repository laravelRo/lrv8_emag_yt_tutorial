@extends('admin.template')

@section('content')
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Products
            </h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="{{ route('control-panel') }}">Control Panel</a></li>
                <li class="breadcrumb-item active">Products</li>
            </ol>

            @livewire('admin.admin-products')
        </div>
        {{-- end container --}}

    </main>



@endsection

@section('customJs')

    <script src="{{ asset('admin/js/sweetalert.js') }}"></script>
    <script>
        var categsModal = new bootstrap.Modal(document.getElementById("modalCategs"), {});

        window.addEventListener('openCategsModal', function(event) {
            categsModal.show();
        });
        window.addEventListener('closeCategoriesModal', function(event) {
            categsModal.hide();
            Swal.fire(
                'Categories updated!',
                'Categories for product: ' + event.detail.name + ' was succesufully updated',
                'success'
            )
        });
    </script>

@endsection
