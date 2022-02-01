<div>
    <input wire:model="photo" type="file" class="d-none" accept="image/*" id="input-{{ $model->id }}" />

    @if ($photo)
        <img src="{{ $photo->temporaryUrl() }}" width="60" alt="" class="clickable photo-upload"
            style="cursor: pointer; max-height:150px;"
            onclick="document.getElementById('input-{{ $model->id }}').click();">
    @else
        <img src="{{ $model->photoUrl() }}" class="clickable photo-upload" width="60" alt=""
            style="cursor: pointer; max-height:150px;"
            onclick="document.getElementById('input-{{ $model->id }}').click();">
    @endif

    <div class="d-flex justify-content-center">
        <div wire:loading wire:target="photo" class="spinner-border spinner-border-sm" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>
    </div>

</div>
