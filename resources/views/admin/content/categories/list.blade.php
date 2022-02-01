@extends('admin.template')

@section('content')
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Categories
            </h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="{{ route('control-panel') }}">Control Panel</a></li>
                <li class="breadcrumb-item active">Categories</li>
            </ol>

            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    List of Categories By Sections



                </div>



                <div class="card-body">

                    @forelse($sections as $section)
                        <div class="card border-secondary m-3 p-2">
                            <div class="card-header bg-primary text-white">
                                {{ $section->name }}
                                <a href="{{ route('categories.new', $section->id) }}"
                                    class="btn btn-warning float-end ms-3">
                                    <i class="fas fa-plus"></i> Add category
                                </a>

                                <span class="text-warning float-end fw-bold ">{{ $section->categories->count() }}
                                    categories</span>
                            </div>

                            <div class="card-body">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th class="w-50">Name / Title</th>
                                            <th class="text-center" style="width: 150px;">Photo</th>
                                            <th>Position</th>
                                            <th>Active / Promo</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($section->categories as $category)

                                            <tr>
                                                <td>{{ $category->name }}<br>{{ $category->title }}</td>
                                                <td class="text-center">
                                                    <img src="{{ $category->photoUrl() }}" width="60" alt="">
                                                </td>
                                                <td>{{ $category->position }}</td>

                                                <td style="width: 220px;">
                                                    @livewire('admin.sections-status',
                                                    ['model'=>$category])
                                                </td>

                                                <td style="width: 100px;">
                                                    <a title="Editeaza categorie"
                                                        href="{{ route('categories.edit', $category->id) }}"
                                                        class="btn btn-success btn-sm btn-circle"><i
                                                            class="fas fa-edit fa-2x"></i>
                                                    </a>
                                                    <a href="{{ route('categories.photos', $category->id) }}"
                                                        title="adauga galerie foto"
                                                        class="btn btn-primary btn-sm btn-circle">
                                                        <i class="fas fa-images fa-2x"></i>
                                                    </a>
                                                    <button class="btn btn-danger btn-sm btn-circle">
                                                        <i class="fas fa-minus-square fa-2x"></i>
                                                    </button>
                                                </td>
                                            </tr>


                                        @empty
                                            <div class="alert alert-warning">
                                                No categories for these section
                                            </div>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    @empty

                        <div class="alert alert-info">No sections in DataBase</div>
                    @endforelse


                </div>
            </div>
        </div>
    </main>

@endsection
