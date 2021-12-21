<div class="container-fluid offer pt-5">
    <div class="row px-xl-5">
        @foreach ($brands as $brand)
            <div class="col-md-6 pb-4">
                <div class="position-relative bg-secondary text-center text-md-right text-white mb-2 py-5 px-5">
                    <img src="{{ $brand->photoUrl() }}" alt="">
                    <div class="position-relative" style="z-index: 1;">
                        <h5 class="text-uppercase text-primary mb-3">{{ $brand->title }}</h5>
                        <h1 class="mb-4 font-weight-semi-bold">{{ $brand->name }}</h1>
                        <a href="{{ route('brand', $brand->slug) }}"
                            class="btn btn-outline-primary py-md-2 px-md-3">Details</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
