<div class="modal fade" tabindex="-1" id="modalCategs" wire:ignore.self>
    <div class="modal-dialog">
        <div class="modal-content">
            @isset($currentProduct)
                <form wire:submit.prevent="setCategories">
                    <div class="modal-header">
                        <h5 class="modal-title">Editare categorii <br> <span class="text-info">
                                {{ $currentProduct->name }}</span></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <h3>Section: <span class="text-danger">{{ $currentProduct->section->name }}</span></h3>
                        <div class="row my-4">
                            @foreach ($currentProduct->section->categories->sortBy('name') as $category)
                                <div class="col-md-6 my-3">
                                    <div class="form-check">
                                        <input wire:model.lazy="categs" class="form-check-input" type="checkbox"
                                            value="{{ $category->id }}" id="check-{{ $category->id }}"
                                            {{ $currentProduct->categories()->find($category->id) ? 'checked' : '' }}>
                                        <label
                                            class="form-check-label {{ $currentProduct->categories()->find($category->id) ? 'text-primary' : '' }}"
                                            for="check-{{ $category->id }}">
                                            {{ $category->name }}
                                        </label>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Set Categories</button>
                    </div>
                @endisset
            </form>
        </div>
    </div>
</div>
