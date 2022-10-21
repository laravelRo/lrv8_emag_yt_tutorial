<div>
    <div class="row">
        <div class="col-md-4 mx-auto">
            <form wire:submit.prevent="attachProduct()">

                <div class="row p-2 bg-light">
                    <h4 class="text-center my-3">Attach product to suite</h4>

                    <label for="idproduct" class="col-sm-4 col-form-label text-end">id product</label>
                    <div class="col-sm-4">
                        <input wire:model="product_id" type="numeric" class="form-control" id="idproduct">
                    </div>
                    <div class="col-sm-4">
                        <button type="submit" class="btn btn-success">Attach</button>

                    </div>

                </div>
                @if ($noProoductText)
                    <div class="text-danger">{{ $noProoductText }}</div>
                @endif
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8 mx-auto my-4">
            @forelse($products as $product)
                <a class="text-decoration-none" href="{{ route('products.edit', $product->id) }}">
                    <img src="{{ $product->photoUrl() }}" height="75" />
                </a>
                <span class="badge bg-warning text-dark px-3 py-2 my-2">
                    {{ $product->name }}
                </span>

                <span wire:click="removeProduct({{ $product->id }})" class="badge bg-danger text-light px-3 py-2">
                    X
                </span>

                &nbsp; | &nbsp;

            @empty
                <div class="alert alert-warning">
                    No products attached to this suite
                </div>
            @endforelse
        </div>
    </div>
</div>
