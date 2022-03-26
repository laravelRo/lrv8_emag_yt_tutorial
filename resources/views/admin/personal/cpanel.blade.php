@extends('admin.template')

@section('content')
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">
                Administrators Control Panel
            </h1>
            <div class="row mt-2">
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-primary text-white mb-4">
                        <div class="card-body">Cart Items for guests expired -
                            {{ \App\Models\shop\Cart::countExpiredGuests() }}</div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <form action="{{ route('delete.expired.cart') }}" id="deleteExpired" method="POST">
                                @csrf
                                @method('delete')
                                <button onclick="event.preventDefault(); deleteConfirm('deleteExpired')"
                                    class=" btn btn-warning text-dark ">Delete
                                    expired items</button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection

@section('customJs')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        window.deleteConfirm = function(formId) {
            Swal.fire({
                icon: 'question',
                title: 'Confirmati curatarea cosului cu produse ?',
                text: 'Vor fi sterse toate produsele din Cart ale utilizatorilor guest mai vechi de 3 zile',
                showCancelButton: true,
                confirmButtonText: 'Delete',
                confirmButtonColor: '#e3342f',
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById(formId).submit();
                }
            });
        }
    </script>
@endsection
