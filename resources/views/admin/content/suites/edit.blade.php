@extends('admin.template')

@section('content')
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Suites
            </h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="{{ route('control-panel') }}">Control Panel</a></li>
                <li class="breadcrumb-item "><a href={{ route('admin.suites.list') }}>Suites</a></li>
                <li class="breadcrumb-item active">Edit <span class="text-info">{{ $suite->name }}</span></li>
            </ol>

            {{-- FORM --}}
            <div class="row">
                <div class="col-md-8 mx-auto">
                    <form class="p-3 bg-light" action="{{ route('admin.suites.update', $suite->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <h3>Edit suite</h3>

                        {{-- FORM ROW --}}
                        <div class="row mb-3 ">
                            <div class="form-floating col-md-5">
                                <input name="name" type="text" value="{{ old('name', $suite->name) }}"
                                    class="form-control @error('name') is-invalid @enderror" id="suitename"
                                    placeholder="name of product suite" required>
                                <label for="suitename" class="form-label">Name</label>
                                @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-md-2 form-floating">
                                <input name="position" type="number" value="{{ old('position', $suite->position) }}"
                                    class="form-control  @error('position') is-invalid @enderror" id="suiteposition"
                                    placeholder="position in lists">
                                <label for="suiteposition" class="form-label">Position</label>
                                @error('position')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="col-md-3">
                                <select name="brand_id" class="form-select">
                                    <option value="0" selected>Select Brand</option>
                                    @forelse($brands as $brand)
                                        <option value="{{ $brand->id }}"
                                            {{ $suite->brand_id == $brand->id ? 'selected' : '' }}>
                                            {{ $brand->name }}
                                        </option>

                                    @empty
                                        <option value="">No brands registered</option>
                                    @endforelse
                                </select>

                                <select name="section_id" class="form-select mt-3">
                                    <option value="0" selected>Select section</option>
                                    @forelse($sections as $section)
                                        <option value="{{ $section->id }}"
                                            {{ $suite->section_id == $section->id ? 'selected' : '' }}>
                                            {{ $section->name }}
                                        </option>

                                    @empty
                                        <option value="">No sections registered</option>
                                    @endforelse
                                </select>
                            </div>
                            <div class="col-md-2">
                                <div class="form-check">
                                    <input name="active" class="form-check-input" type="checkbox" value="1"
                                        id="suiteactive" {{ $suite->active ? 'checked' : '' }}>
                                    <label class="form-check-label" for="suiteactive">
                                        Active
                                    </label>
                                </div>
                                <button type="submit" class="btn btn-primary mt-3">Edit Suite</button>
                            </div>

                        </div> {{-- end form row --}}
                    </form>
                </div>
            </div>
            {{-- END FORM --}}

            {{-- attach product --}}
            <h2 class="my-4 text-center text-info">Produsele listei <span class="text-info">{{ $suite->name }}</span></h2>

            @livewire('products.suite-products', ['suite_id' => $suite->id])


        </div>
    </main>
@endsection
