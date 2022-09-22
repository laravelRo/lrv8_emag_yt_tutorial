@extends('admin.template')

@section('content')
    <main>
        <div class="container-fluid px-4">
            <h1>Set <span class="text-info">{{ $section->name }} </span>attributes</h1>

            {{-- === breadcrumb=== --}}
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="{{ route('control-panel') }}">Control Panel</a></li>
                <li class="breadcrumb-item "><a href="{{ route('sections.list') }}"> Sections</a></li>
                <li class="breadcrumb-item "><a href="{{ route('sections.edit', $section->id) }}"> Edit Section</a></li>
                <li class="breadcrumb-item active"> Section attributes</li>
            </ol>

            <div class="row">
                <div class="col-md-7 mx-auto">
                    <form action="{{ route('admin.attributes.sync.section', $section->id) }}" method="POST">
                        @csrf
                        <div class="card">
                            <div class="card-title bg-primary text-light p-2">
                                <h4> Select Attributes</h4>
                            </div>

                            <div class="card-body">
                                <div class="row">
                                    @forelse($attributes as $attribute)
                                        <div class="col-md-4 my-3">
                                            <div class="form-check">
                                                <input name="attids[]" class="form-check-input" type="checkbox"
                                                    value="{{ $attribute->id }}" id="attr-{{ $attribute->id }}"
                                                    {{ $section->attributes()->find($attribute->id) ? 'checked' : '' }}>
                                                <label class="form-check-label" for="attr-{{ $attribute->id }}">
                                                    {{ $attribute->name }}
                                                </label>
                                            </div>

                                            <div>
                                                @forelse($attribute->values as $value)
                                                    <span class="text-secondary">{{ $value->name }}</span> |
                                                @empty
                                                    <div class="alert-info alert">
                                                        No values for this attribute
                                                    </div>
                                                @endforelse
                                            </div>
                                        </div>
                                    @empty
                                        <div class="alert alert-warning">
                                            Nu exista nici un atribut setat pe site
                                        </div>
                                    @endforelse
                                </div>
                            </div>
                            <div class="card-footer bg-dark">
                                <button type="submit" class="btn btn-primary float-end">Set Attributes</button>
                                <a href={{ route('sections.list') }} class="btn btn-secondary float-start">Return</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </main>
@endsection
