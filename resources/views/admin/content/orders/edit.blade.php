@extends('admin.template')

@section('content')
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Order - <span class="text-info">{{ $order->id }}</span> date:
                <span class="text-info">{{ $order->created_at->format('d-M Y') }}</span>
            </h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="{{ route('control-panel') }}">Control Panel</a></li>
                <li class="breadcrumb-item "><a
                        href="{{ route('admin.orders.list', ['page' => session('currentPage')]) }}">Orders</a></li>
                <li class="breadcrumb-item active">Edit Order {{ $order->id }}</a></li>
            </ol>
        </div>

        @livewire('admin.order-items', ['order' => $order])

    </main>
@endsection

@section('customJs')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    {{-- confirmare stergere item din comanda --}}
    <script>
        window.deleteOrderItem = function(id, name) {
            Swal.fire({
                icon: 'question',
                text: 'Confirmati stergerea produsului ' + name + ' ?',
                showCancelButton: true,
                confirmButtonText: 'DELETE',
                confirmButtonColor: '#e3342f',
            }).then((result) => {
                if (result.isConfirmed) {
                    Livewire.emit('deleteOrderItem', id);
                    Swal.fire(
                        'Produs sters!',
                        'Produsul ' + name + ' a fost sters din comanda!',
                        'success'
                    );

                }
            });
        }
    </script>
@endsection
