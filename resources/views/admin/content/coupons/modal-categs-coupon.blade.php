<div class="modal fade" data-bs-backdrop="static" tabindex="-1" id="modalCategsCoupon" wire:ignore.self>
    <div class="modal-dialog">
        @if ($coupon_categs_active)
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Aplicarea couponului {{ $coupon_categs_active->code }}</h5>
                    <button wire:click="resetCategsModal" type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>

                <div class="modal-body">

                    <div class="alert alert-secondary">
                        Sectiunile sitului <br>
                        @forelse($sections as $section)
                            <span wire:click="selectSection({{ $section->id }})"
                                class="badge {{ $section_id == $section->id ? 'bg-success' : 'bg-info' }}"
                                style="cursor: pointer;">{{ $section->name }}</span>
                        @empty
                            No active sections on site
                        @endforelse
                    </div>

                    @if ($section_categs)
                        <hr>
                        @if ($confirm_categs)
                            <p class="text-info">{{ $confirm_categs }}</p>
                        @endif
                        <div class="alert alert-warning">
                            <h4>categorii</h4>

                            <form wire:submit.prevent="attachCouponCategs">
                                <div class="my-3">
                                    @forelse($section_categs as $categ)
                                        <div class="form-check">
                                            <input wire:model="coupon_categs" class="form-check-input" type="checkbox"
                                                id="select_categ_{{ $categ->id }}" value="{{ $categ->id }}">
                                            <label class="form-check-label" for="flexCheckDefault">
                                                {{ $categ->name }}
                                            </label>
                                        </div>
                                    @empty
                                        No category for this section
                                    @endforelse
                                </div>

                                <div class="my-3">
                                    <button wire:click="detachAllCategories" type="button"
                                        class="btn btn-secondary ">Detach all</button>
                                    <button class="btn btn-primary float-end" type="submit">Attach categories</button>
                                </div>
                            </form>

                        </div>

                    @endif
                </div>
            </div>
        @endif
    </div>
</div>
