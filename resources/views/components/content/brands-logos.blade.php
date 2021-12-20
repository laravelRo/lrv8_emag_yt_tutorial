<!-- Vendor Start -->
<div class="container-fluid py-5">
    <div class="row px-xl-5">
        <div class="col">
            <div class="owl-carousel vendor-carousel">
                @foreach ($brands as $brand)
                    <a href="{{ route('brand', $brand->slug) }}">
                        <div class="vendor-item border p-4">
                            <img src="{{ $brand->photoUrl() }}" alt="">
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
</div>
<!-- Vendor End -->
