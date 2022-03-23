<table class="table table-bordered text-center mb-0">
    <thead class="bg-secondary text-dark">
        <tr>
            <th class="align-left">Products - ({{ $cartProducts->count() }})</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Total</th>
            <th>Remove</th>
        </tr>
    </thead>
    <tbody class="align-middle">
        @forelse($cartProducts as $item)
            @livewire('products.cart-item', ['item'=>$item], key(time().$item->id))
        @empty
            <div class="alert alert-warning">
                <h4>Nu aveti nici un produs in cos</h4>
            </div>
        @endforelse

    </tbody>
    <tfoot>
        <th></th>
        <th></th>
        <th></th>
        <th>{{ $totalCart }}</th>
        <th></th>
    </tfoot>


</table>
