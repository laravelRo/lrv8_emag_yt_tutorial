<div class="card product-item border-0 h-100 d-flex flex-column justify-content-between">
    <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
        @if ($item->brand)
            <span class="badge bg-info text-light float-right">{{ $item->brand->name }}</span>
        @endif

        <img class="img-fluid w-100" src="{{ $item->photoUrl() }}" alt="">
    </div>
    <div>
        <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
            <h6 class="text-truncate mb-3 p-1 border-top">{{ $item->name }}</h6>
            <div class="d-flex justify-content-center">
                <h6>{{ $item->price }}</h6>
                <h6 class="text-muted ml-2">
                    <del>{{ $item->price + ($item->price + $item->discount / 100) }}</del>
                </h6>
            </div>
        </div>
        <div class="card-footer d-flex justify-content-between bg-light border">
            <a href="{{ route('product', $item->slug) }}" class="btn btn-sm text-dark p-0"><i
                    class="fas fa-eye text-primary mr-1"></i>View
                Detail</a>
            @livewire('products.add-cart', ['product_id' => $item->id], key(time() . 'cart' . $item->id))
        </div>
    </div>
</div>
