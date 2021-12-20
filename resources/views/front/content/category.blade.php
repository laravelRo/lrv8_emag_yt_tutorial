@extends('front.template')

@section('meta_title', $category->meta_title ? $category->meta_title : 'Categorii R-Shop')
@section('meta_description', $category->meta_description ? $category->meta_description : 'Categoy list for section')
@section('meta_keywords',
    $category->meta_keywords
    ? $category->meta_keywords
    : 'Categorii produse R-Shop, filtrare pret produse,
    filtrare culori, filtrare marimi, xl',)

@section('content')

    <div class="container-fluid">
        <div class="row">
            {{-- zona lateral stanga --}}
            <div class="col-lg-3">
                @forelse($listCategories as $key => $sideCat)
                    <div class="list-category">
                        <a href="{{ route('category', $sideCat->slug) }}">
                            <h3>{{ $sideCat->name }}</h3>
                        </a>
                        <a href="{{ route('category', $sideCat->slug) }}">
                            <img src="{{ $sideCat->photoUrl() }}">
                        </a>
                    </div>

                @empty

                @endforelse

            </div>

            {{-- partea principala --}}
            <div class="col-lg-9">
                {{-- breadcrumb --}}
                <div class="bg-secondary">
                    <a href="{{ route('section', $category->section->slug) }}">{{ $category->section->name }}</a> /
                    {{ $category->name }}
                </div>

                {{-- titlul principal al paginii --}}
                <h1 class="text-primary text-center my-3">{{ $category->name }}</h1>

                {{-- sliderul categoriei --}}
                @include('front.content.carusel-photos',['carusel'=>$category])

                {{-- descrierea categoriei --}}
                <div class="row description">
                    <div class="col-md-6  border-right">
                        {!! $category->description !!}
                    </div>
                    <div class="col-md-6 d-flex flex-column justify-content-between">
                        <h2 class="text-info text-center">{{ $category->name }}</h2>
                        <div>
                            <img src="{{ $category->photoUrl() }}" alt="{{ $category->name }}">
                        </div>
                        <h4 class="text-info text-center">{{ $category->title }}</h4>
                    </div>
                </div>

                <hr>

            </div>
        </div>
    </div>


@endsection
