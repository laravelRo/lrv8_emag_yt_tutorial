@extends('front.template')
@section('meta_title', $brand->meta_title ? $brand->meta_title : 'R-Shop Brands')
@section('meta_description', $brand->meta_description ? $brand->meta_description : 'R-Shop products for brands')
@section('meta_keywords',
    $brand->meta_keywords
    ? $brand->meta_keywords
    : 'R-Shop Brands, best products, best running
    brands')

@section('content')
    <!-- Page Header Start -->
    <div class="container-fluid bg-secondary mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
            <h1 class="font-weight-semi-bold text-uppercase mb-3 mt-2">
                <a href="{{ route('brand', $brand->slug) }}">{{ $brand->name }}</a>
                Products - {{ $products->total() }}
            </h1>


            <div class="d-inline-flex mb-2">
                <p class="m-0"><a href="{{ route('home') }}">Home</a></p>
                <p class="m-0 px-2">-</p>
                <p class="m-0"><a href="{{ route('brand', $brand->slug) }}">{{ $brand->name }}</a></p>

                <p class="m-0 px-2">-</p>
                <p class="m-0"> <span class="text-muted">products ({{ $products->total() }})</span>
                </p>
            </div>

            @if ($brand_coupons)
                @foreach ($brand_coupons as $coupon)
                    <p class="text-warning bg-info p-2">{{ $loop->iteration }}. Cod <b>{{ $coupon->code }}</b> :
                        {{ $coupon->description }}
                    </p>
                @endforeach
            @endif
        </div>
    </div>
    <!-- Page Header End -->

    <div class="container-fluid pt-5">
        @livewire('products.brand-products', ['brand' => $brand])

    </div>

@endsection

@section('customCss')
    <style>
        .wrapper {
            position: relative;

            width: 100%;
            background-color: #ffffff;
            padding: 50px 40px 20px 40px;
            border-radius: 10px;

            border: 1px #3264fe solid;
        }

        .container {
            position: relative;
            width: 100%;
            height: 100px;
            margin-top: 30px;
        }

        input[type="range"] {
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            width: 100%;
            outline: none;
            position: absolute;
            margin: auto;
            top: 0;
            bottom: 0;
            background-color: transparent;
            pointer-events: none;
        }

        .slider-track {
            width: 100%;
            height: 5px;
            position: absolute;
            margin: auto;
            top: 0;
            bottom: 0;
            border-radius: 5px;
        }

        input[type="range"]::-webkit-slider-runnable-track {
            -webkit-appearance: none;
            height: 5px;
        }

        input[type="range"]::-moz-range-track {
            -moz-appearance: none;
            height: 5px;
        }

        input[type="range"]::-ms-track {
            appearance: none;
            height: 5px;
        }

        input[type="range"]::-webkit-slider-thumb {
            -webkit-appearance: none;
            height: 1.7em;
            width: 1.7em;
            background-color: #3264fe;
            cursor: pointer;
            margin-top: -9px;
            pointer-events: auto;
            border-radius: 50%;
        }

        input[type="range"]::-moz-range-thumb {
            -webkit-appearance: none;
            height: 1.7em;
            width: 1.7em;
            cursor: pointer;
            border-radius: 50%;
            background-color: #3264fe;
            pointer-events: auto;
        }

        input[type="range"]::-ms-thumb {
            appearance: none;
            height: 1.7em;
            width: 1.7em;
            cursor: pointer;
            border-radius: 50%;
            background-color: #3264fe;
            pointer-events: auto;
        }

        input[type="range"]:active::-webkit-slider-thumb {
            background-color: #ffffff;
            border: 3px solid #3264fe;
        }

        .values {
            background-color: #3264fe;
            /* width: 32%; */
            width: 80%;
            position: relative;
            margin: auto;
            padding: 10px 0;
            border-radius: 5px;
            text-align: center;
            font-weight: 500;
            /* font-size: 25px; */
            font-size: 18px;
            color: #ffffff;
        }

        .values:before {
            content: "";
            position: absolute;
            height: 0;
            width: 0;
            border-top: 15px solid #3264fe;
            border-left: 15px solid transparent;
            border-right: 15px solid transparent;
            margin: auto;
            bottom: -14px;
            left: 0;
            right: 0;
        }
    </style>

@endsection

@section('customJs')
    <script>
        window.onload = function() {
            slideOne();
            slideTwo();
        };

        let sliderOne = document.getElementById("slider-1");
        let sliderTwo = document.getElementById("slider-2");
        let displayValOne = document.getElementById("range1");
        let displayValTwo = document.getElementById("range2");
        let minGap = 0;
        let sliderTrack = document.querySelector(".slider-track");
        let sliderMaxValue = document.getElementById("slider-1").max;

        function slideOne() {
            if (parseInt(sliderTwo.value) - parseInt(sliderOne.value) <= minGap) {
                sliderOne.value = parseInt(sliderTwo.value) - minGap;
            }
            displayValOne.textContent = sliderOne.value;
            fillColor();
        }

        function slideTwo() {
            if (parseInt(sliderTwo.value) - parseInt(sliderOne.value) <= minGap) {
                sliderTwo.value = parseInt(sliderOne.value) + minGap;
            }
            displayValTwo.textContent = sliderTwo.value;
            fillColor();
        }

        function fillColor() {
            percent1 = (sliderOne.value / sliderMaxValue) * 100;
            percent2 = (sliderTwo.value / sliderMaxValue) * 100;
            sliderTrack.style.background =
                `linear-gradient(to right, #dadae5 ${percent1}% , #3264fe ${percent1}% , #3264fe ${percent2}%, #dadae5 ${percent2}%)`;
        }

        window.addEventListener('resetRangePrice', (e) => {
            // console.log(e.detail.percent1);
            sliderTrack.style.background =
                `linear-gradient(to right, #dadae5 ${e.detail.percent1}% , #3264fe ${e.detail.percent1}% , #3264fe ${e.detail.percent2}%, #dadae5 ${e.detail.percent2}%)`;
        });
    </script>
@endsection
