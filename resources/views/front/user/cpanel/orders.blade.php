@extends('front.user.cpanel.main')

@section('panel_content')
    <h2>Comenzile mele - {{ $orders->total() }}</h2>
    <div class="accordion" id="accordionExample">
        @forelse($orders as $order)
            <div class="card">
                <div class="card-header" id="headingOne">
                    <h4 class="mb-0">
                        <span class="text-info">{{ $order->name }}
                            {{ $order->created_at->format('d-M Y') }}</span>
                        total: {{ number_format($order->totalCost(), '2', ',', '.') }} <span class="text-muted"
                            style="font-size: 0.7em;">(transport:
                            {{ $order->shipping_cost }})</span>

                    </h4>
                    <p>
                        <a href="{{ route('account.orders.pdf', $order->id) }}" target="_blank"
                            class="alert-link text-info float-right"><i class="fas fa-print"></i>
                            Print Order</a>
                        <i class="fas fa-address-book"></i> {{ $order->address }}, <i class="fas fa-city"></i>
                        {{ $order->city }}, <i class="fas fa-mobile"></i> {{ $order->phone }}
                    </p>

                    <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse"
                        data-target="#items{{ $order->id }}" aria-expanded="true" aria-controls="collapseOne">
                        Vezi comanda
                    </button>
                </div>

                <div id="items{{ $order->id }}" class="collapse" aria-labelledby="headingOne"
                    data-parent="#accordionExample">
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Produs</th>
                                    <th scope="col">Pret</th>
                                    <th scope="col">Nr buc</th>
                                    <th scope="col">Cost</th>
                                </tr>
                            </thead>

                            @forelse($order->order_items as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        {{ $item->product_name }}
                                    </td>
                                    <td>
                                        {{ $item->price }}
                                    </td>
                                    <td>
                                        {{ $item->qty }}
                                    </td>
                                    <td>
                                        {{ $item->qty * $item->price }}
                                    </td>
                                </tr>


                            @empty
                            @endforelse
                            <tr>
                                <div class="text-right">
                                    cost produse:
                                    <b>{{ number_format($order->totalCost() - $order->shipping_cost, 2, ',', '.') }}</b>
                                </div>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        @empty
            <div class="alert alert-info">
                Nu aveti nici o comanda pentur acest cont
            </div>
        @endforelse
        <div>
            {{ $orders->links() }}
        </div>


    </div>
@endsection
