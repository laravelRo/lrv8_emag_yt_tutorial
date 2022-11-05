<div>
    <div class="row">
        <div class="col-md-8 mx-auto ">

            {{-- === afisarea filtrelor in cascada --}}
            <div class="row">
                <div class="col-md-3 pl-3">
                    @if ($selectedBrand)
                        <span class="badge bg-success text-light">{{ $selectedBrand }}</span>
                        <span wire:click="deleteBrand" class="badge bg-danger text-light" style="cursor: pointer;">X</span>
                    @endif
                </div>
                <div class="col-md-3 pl-3">
                    @if ($selectedSection)
                        <span class="badge bg-success text-light">{{ $selectedSection }}</span>
                        <span wire:click="deleteSection" class="badge bg-danger text-light"
                            style="cursor: pointer;">X</span>
                    @endif
                </div>
                <div class="col-md-3 pl-3">
                    @if ($search_text)
                        <span class="badge bg-success text-light">{{ $search_text }}</span>
                        <span wire:click="deleteSearch" class="badge bg-danger text-light"
                            style="cursor: pointer;">X</span>
                    @endif
                </div>
            </div>

            {{-- === selectarea filtrelor --}}
            <div class="row bg-warning p-4">
                <div class="col-md-3">
                    <select wire:model="brand_id" name="brand_id" class="form-select">
                        <option value="0" selected>Select Brand</option>
                        @forelse($brands as $brand)
                            <option value="{{ $brand->id }}">{{ $brand->name }}</option>

                        @empty
                            <option value="">No brands registered</option>
                        @endforelse
                    </select>
                </div>

                <div class="col-md-3">
                    <select wire:model="section_id" name="section_id" class="form-select">
                        <option value="0" selected>Select section</option>
                        @forelse($sections as $section)
                            <option value="{{ $section->id }}">{{ $section->name }}</option>

                        @empty
                            <option value="">No sections registered</option>
                        @endforelse
                    </select>
                </div>

                <div class="col-md-4">

                    {{-- <label for="search">Search suite</label> --}}
                    <input wire:model.lazy="search_text" type="text" class="form-control" id="search"
                        placeholder="search suite...">

                </div>
                <div class="col-md-2">
                    <button wire:click="resetFilters" class="btn btn-success"><i class="fas fa-sync-alt"></i></button>
                </div>
            </div>

            {{-- === end selectarea filtrelor --}}

        </div>
    </div>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name (nr prods)</th>
                <th scope="col">Position</th>
                <th scope="col">Brand / Section</th>
                <th scope="col">Active</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($suites as $suite)
                <tr>
                    <td>
                        {{ $suites->currentPage() > 1
                            ? $loop->iteration + $suites->perPage() * ($suites->currentPage() - 1)
                            : $loop->iteration }}
                    </td>
                    <td>
                        {{ $suite->name }} (<span class="text-info">{{ $suite->products_count }} prods</span>)
                    </td>
                    <td>
                        {{ $suite->position }}
                    </td>
                    <td>
                        {{ $suite->brand->name }} / {{ $suite->section->name }}
                    </td>
                    <td>
                        @livewire('admin.sections-status', ['model' => $suite, 'show_standard' => false], key('active' . time() . $suite->id))
                    </td>
                    <td>
                        <a title="Edit suite" href="{{ route('admin.suites.edit', $suite->id) }}"
                            class="btn btn-success btn-sm btn-circle"><i class="fas fa-edit fa-2x"></i>
                        </a>
                        <form id="form-del-suite-{{ $suite->id }}" class="d-none"
                            action="{{ route('admin.suites.delete', $suite->id) }}" method="POST">
                            @csrf
                            @method('delete')

                        </form>
                        <a onclick="deleteConfirm('form-del-suite-{{ $suite->id }}', '{{ $suite->name }}')"
                            type="button" title="delete suite" href="#"
                            class="btn btn-danger btn-sm btn-circle"><i class="fas fa-trash fa-2x"></i>
                        </a>
                    </td>
                </tr>
            @empty
                <div class="alert alert-info">
                    Nu este inregistrata nici o suita de produse
                </div>
            @endforelse
        </tbody>

    </table>
    {{-- END TABLE LIST --}}
    <div class="my-3">
        {{ $suites->links() }}
    </div>

</div>
