<div class="modal fade" data-bs-backdrop="static" tabindex="-1" id="modalBrandsCoupon" wire:ignore.self>
    <div class="modal-dialog">
        <div class="modal-content">
            @if ($coupon_brand_active)
                <div class="modal-header">
                    <h5 class="modal-title">Aplicarea couponului {{ $coupon_brand_active->code }}</h5>
                    <button wire:click="resetBrandsModal" type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @forelse($brands_free as $brand)
                        <button wire:click="addBrandToCoupon('{{ $brand->id }}')"
                            class="badge bg-light text-dark m-2">
                            {{ $brand->name }}
                        </button>
                    @empty
                        <p>All existant Brands are attached</p>
                    @endforelse

                    <hr>
                    Selected Brands <br>
                    @forelse($brands_coupon as $coupon_brand)
                        <button class="btn btn-success btn-sm m-2">
                            {{ $coupon_brand->name }} <span wire:click="detachBrand('{{ $coupon_brand->id }}')"
                                class="badge bg-danger">X</span>
                        </button>

                    @empty
                        <p>No Brands attached</p>
                    @endforelse

                </div>
            @endif
        </div>
    </div>
</div>
