<div class="col-md-3 border-end d-flex flex-column justify-content-between">
    {{-- ===prima zona din coloana --}}
    <div class="my-2">
        <span class="badge rounded-pill bg-info text-dark float-start">{{ $current }}</span>
        <div class="row g-2">
            <div class="col-9">
                <input wire:model.lazy="position" type="number" class="form-control w-50 mb-2" title="position"
                    id="position-{{ $photo->id }}">
                @livewire('admin.sections-status',['model'=>$photo])
            </div>
            <div class="col-3">
                <button id="delete-{{ $photo->id }}"
                    onclick="deletePhotoConfirm('{{ $photo->id }}', '{{ $current }}' ) "
                    class="btn btn-danger float-end"><i class="fas fa-trash"></i>
                </button>
            </div>
        </div>
    </div>
    {{-- <<<===prima zona din coloana --}}

    {{-- ===a doua zona din coloana --}}

    <div>
        <input wire:model.lazy="image" type="file" class="d-none" accept="image/*"
            id="image-{{ $photo->id }}">
        @if ($image)
            <img src="{{ $image->temporaryUrl() }}" style="max-height: 250px; cursor:pointer;"
                id="temp-{{ $photo->id }}" class="img-fluid img-thumbnail mx-auto d-block clickable"
                onclick="document.getElementById('image-{{ $photo->id }}').click()">
        @else
            <img src="{{ '/photos/' . $path . $photo->name }}" style="max-height: 250px; cursor:pointer;"
                id="file-{{ $photo->id }}" class="img-fluid img-thumbnail mx-auto d-block clickable"
                onclick="document.getElementById('image-{{ $photo->id }}').click()">
        @endif
        <span class="text-danger">
            @error('image'){{ $message }}@enderror
            </span>
            <button wire:loading wire:target="image" class="btn btn-primary my-2" type="button" disabled>
                <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                Loading...
            </button>
        </div>


        {{-- <<<===a doua zona din coloana --}}

        {{-- ===a treia zona din coloana --}}
        <div>
            <input wire:model.lazy="title" type="text" class="form-control my-2" title="title of photo" id="title"
                placeholder="title of image">
            <input wire:model.lazy="description" type="text" class="form-control" title="description of photo"
                placeholder="description of image" id="description">
        </div>

        {{-- <<<===a treia zona din coloana --}}

    </div>
