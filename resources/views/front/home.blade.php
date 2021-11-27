@extends('front.template')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3">

            </div>

            <div class="col-lg-9">
                {{-- @include('front.partials.caroussel') --}}
                <x-content.sections-slider :promo="true" :active="true" />
            </div>
        </div>
    </div>
    @include('front.partials.featured')
    @include('front.partials.promo')
    @include('front.partials.categories')
    @include('front.partials.brands')
@endsection
