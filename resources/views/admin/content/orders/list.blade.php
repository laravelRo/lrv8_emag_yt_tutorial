@extends('admin.template')

@section('content')
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Orders - {{ $orders->total() }}
            </h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="{{ route('control-panel') }}">Control Panel</a></li>
                <li class="breadcrumb-item active">Orders</li>
            </ol>
        </div>

        <div class="card">
            <div class="card-header">
                Lista cu comenzile plasate de utilizatori
            </div>
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Address</th>

                            <th>Details</th>

                            <th>
                                Actions
                            </th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Name</th>
                            <th>Address</th>

                            <th>Details</th>

                            <th>
                                Actions
                            </th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @forelse($orders as $order)
                            <tr>
                                <td>
                                    {{ $order->user->name }}<br>
                                    {{ $order->created_at->format('d-M Y') }}
                                </td>
                                <td>
                                    {{ $order->name }} - {{ $order->address }} - {{ $order->phone }}<br>
                                    {{ $order->city }}
                                </td>
                                <td>
                                    <b>Total Cost: </b>{{ number_format($order->totalCost(), '2', ',', '.') }}<br>
                                    <b>Product Number:: </b>{{ $order->order_items->count() }}

                                </td>

                                <td>
                                    <a href="{{ route('admin.orders.edit', $order->id) }}"
                                        class="btn btn-success btn-sm btn-circle"><i class="fas fa-edit fa-2x"></i></a>
                                </td>
                            </tr>
                        @empty
                        @endforelse
                    </tbody>
                </table>
                <div>
                    {{ $orders->links() }}
                </div>
            </div>
        </div>

    </main>
@endsection
