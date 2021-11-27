<div>
    <h1>Upload photos for gallery</h1>
    <form wire:submit.prevent="save">
        <div>
            @if (session()->has('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
        </div>

        <div class="col-md-6 mb-3">
            <label for="photos" class="form-label">Add photos for gallery (12 files per upload permitted)</label>
            <input wire:model.lazy="photos" class="form-control" type="file" id="photos" accept="image/*" multiple>


            <div class="d-flex justify-content-center">
                <div wire:loading wire:target="photos" class="spinner-border" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
            </div>
        </div>

        @if ($photos)
            Photo Preview:
            <div class="row">

                @foreach ($photos as $photo)
                    <div class="col-md-3 border-end d-flex flex-column justify-content-between">
                        <div>
                            <span
                                class="badge rounded-pill bg-info text-dark float-start">{{ $loop->iteration }}</span>
                            <img src="{{ $photo->temporaryUrl() }}" class="img-fluid img-thumbnail mx-auto d-block"
                                style="max-height: 250px;">
                        </div>
                        @php
                            $size = number_format(get_headers($photo->temporaryUrl(), 1)['Content-Length'] / (1024 * 1024), 2);
                        @endphp
                        <span class="text-info {{ $size > 1 ? 'text-danger' : '' }}">
                            {{ $photo->getClientOriginalName() }} / {{ $size }} Mb</span>

                    </div>
                @endforeach

            </div>
            <div>
                @error('photos.*') <div class="row"><span
                            class="text-danger fw-bold">{{ $message }}</span>
                    </div>
                @enderror
            </div>
            <div class="row mt-3">
                <div class="col-md-12">
                    <button class="btn btn-primary float-end" type="submit">Upload {{ count($photos) }}
                        photos</button>
                    <a href="{{ route('categories.list') }}" class="btn btn-secondary float-start"><i
                            class="fas fa-undo mr-2"></i>return</a>
                </div>

            </div>
        @endif

    </form>


    <hr>

    <div class="my-4">
        <h1>Gallery images for <span class="text-info"> {{ $model->name }} -
                {{ $images->count() }}</span>
            @if ($images->count() > 0)<button onclick="deleteAllPhotos() "
                    class="btn btn-danger float-end">Delete all
                    images</button>@endif
        </h1>

    </div>

    <div class="row mt-3">

        @forelse ($images as $photo )
            {{-- <div class="col-md-3 border-end d-flex flex-column justify-content-between">
                <div>
                    <span class="badge rounded-pill bg-info text-dark float-start">{{ $loop->iteration }}</span>
                    <img src="{{ asset($model->galleryUrl() . $photo->name) }}"
                        class="img-fluid img-thumbnail mx-auto d-block" style="max-height: 250px;">
                </div>

            </div> --}}


            @livewire('admin.edit-photo',['current'=>$loop->iteration, 'photo'=>$photo,
            'path'=>'categories/'.$model->id .'/'], key($loop->index))


        @empty
            <div class="alert alert-info">
                No images for {{ $model->name }} gallery
            </div>

        @endforelse
    </div>

</div>
