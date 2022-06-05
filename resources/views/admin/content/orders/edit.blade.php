@extends('admin.template')

@section('content')
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Order - <span class="text-info">{{ $order->id }}</span> date:
                <span class="text-info">{{ $order->created_at->format('d-M Y') }}</span>
            </h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="{{ route('control-panel') }}">Control Panel</a></li>
                <li class="breadcrumb-item "><a href="{{ route('admin.orders.list') }}">Orders</a></li>
                <li class="breadcrumb-item active">Edit Order {{ $order->id }}</a></li>
            </ol>
        </div>

        @livewire('admin.order-items', ['order' => $order])

    </main>
@endsection
