@extends('admin.template')

@section('content')
    <main>
        <div class="container-fluid px-4">
            <h1 class="my-4">Editare atribute <span class="text-info">{{ $product->name }}</span> </h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="{{ route('control-panel') }}">Control Panel</a></li>
                <li class="breadcrumb-item">
                    <a href="{{ route('products.list', ['page' => $currentPage]) }}">Products</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ route('products.edit', $product->id) }}">
                        Edit <span class="text-info">{{ $product->name }}</span>
                    </a>
                </li>
                <li class="breadcrumb-item active">Attributes</li>
                <li class="breadcrumb-item">
                    <a href="{{ route('admin.attributes.set.section', ['id' => $product->section->id]) }}">
                        Attributes for <span class="text-info">{{ $product->section->name }}</span>
                    </a>
                </li>
            </ol>

            <div class="row">
                @forelse($attributes as $attribute)
                    <div class="col-md-6 my-3">

                        @livewire('admin.attribute-attach', ['attribute' => $attribute, 'product' => $product], key($attribute->id . time()))

                    </div>
                @empty
                    <div class="alert alert-warning">Nu sunt setate atribute pentru sectiunea produsului</div>
                @endforelse
            </div>
        </div>
    </main>
@endsection
