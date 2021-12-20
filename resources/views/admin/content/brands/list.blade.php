@extends('admin.template')

@section('content')
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Brands
            </h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="{{ route('control-panel') }}">Control Panel</a></li>
                <li class="breadcrumb-item active">Brands</li>
            </ol>

            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    List of Brands - {{ $brands->count() }}


                    <a href="{{ route('brands.new') }}" class="btn btn-success float-end">
                        <i class="fas fa-plus"></i> Add brands
                    </a>
                </div>

                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th style="width: 150px;">Name / Title</th>
                                <th>Meta</th>
                                <th class="text-center" style="width: 150px;">Photo</th>
                                <th>Position</th>
                                <th>Active / Promo</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Name /Title</th>
                                <th>Meta</th>
                                <th class="text-center">Photo</th>
                                <th>Position</th>
                                <th>Active / Promo</th>
                                <th>Actions</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @forelse($brands as $brand)
                                <tr>
                                    <td width="250">

                                        {{ $brand->name }}
                                        <span class="text-info"> <br> {{ $brand->title }}</span>
                                    </td>
                                    <td>
                                        <span class="text-info">{{ $brand->meta_description }}</span><br>
                                        <span class="text-danger">{{ $brand->meta_keywords }}</span>
                                    </td>
                                    <td class="text-center">
                                        <img src="{{ $brand->photoUrl() }}" width="60" alt="">
                                    </td>
                                    <td>
                                        {{ $brand->position }}
                                    </td>
                                    <td style="width: 220px;">
                                        @livewire('admin.sections-status',['model'=>$brand])
                                    </td>

                                    <td style="width: 100px;">
                                        <a title="Editeaza brand {{ $brand->name }}"
                                            href="{{ route('brands.edit', $brand->id) }}"
                                            class="btn btn-success btn-sm btn-circle"><i class="fas fa-edit fa-2x"></i>
                                        </a>
                                        <button class="btn btn-danger btn-sm btn-circle" onclick="">
                                            <i class="fas fa-minus-square fa-2x"></i>
                                        </button>
                                        <a href="{{ route('brands.photos', $brand->id) }}" title="adauga galerie foto"
                                            class="btn btn-primary btn-sm btn-circle">
                                            <i class="fas fa-images fa-2x"></i>
                                        </a>
                                    </td>
                                </tr>

                            @empty
                                <div class="alert alert-info">
                                    Nu exista nici un brand in baza de date a sitului
                                </div>
                            @endforelse

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>

@endsection
