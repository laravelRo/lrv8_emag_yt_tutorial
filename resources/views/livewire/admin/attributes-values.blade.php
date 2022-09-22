<div class="row">
    @forelse($attributes as $attribute)
        <div class="col-md-4 my-3">
            <div class="list-group d-flex flex-column h-100 justify-content-between">
                {{-- formularul titlu pentur editarea atributului --}}
                <a href="#" class="list-group-item list-group-item-action active" aria-current="true">
                    <div class="d-flex w-100 justify-content-between">
                        <h5>
                            @if ($attribute->id == $nameId)
                                <input wire:model.lazy="activeName" wire:blur="$set('nameId',null)" type="text"
                                    maxlength="30" id="activeName-{{ $attribute->id }} " />
                            @else
                                <span wire:click="showName({{ $attribute->id }})">{{ $attribute->name }}</span>
                            @endif

                        </h5>
                        <div>
                            {{-- <input type="number" style="width: 50px;" value={{ $attribute->position }}> --}}
                            @livewire('admin.change-position', ['model' => $attribute], key(time() . 'position' . $attribute->id))
                            <small class="d-inline-block">@livewire('admin.sections-status', ['model' => $attribute, 'show_standard' => false], key(time() . 'active' . $attribute->id))
                            </small>
                            <button class="btn btn-danger btn-sm btn-circle float-end ms-2"
                                onclick="deleteAttribute({{ $attribute->id }},'{{ $attribute->name }}')">
                                <i class="fas fa-2x fa-minus-circle "></i>
                            </button>
                        </div>

                    </div>

                </a>

                {{-- //lista de valori pentru atribut --}}
                <div>
                    @forelse($attribute->values->sortBy('position') as $value)
                        <li class="list-group-item list-group-item-light">

                            @if ($editValueId == $value->id)
                                <form wire:submit.prevent="updateValue({{ $value->id }})"
                                    id="form-value-edit{{ $attribute->id }}{{ $value->id }}">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <input wire:model.lazy='valueName' type="text" class="form-control"
                                                placeholder="New value" aria-label="New value" maxlength="30"
                                                id="active-name{{ $attribute->id }}{{ $value->id }}">
                                        </div>
                                        <div class="col-md-2">
                                            <input wire:model.lazy='valuePosition' type="numeric" class="form-control"
                                                placeholder="Position" aria-label="position"
                                                id="active-pos{{ $attribute->id }}{{ $value->id }}">
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-check">
                                                <input wire:model="valueActive" type="checkbox" class=""
                                                    id="active-chk{{ $attribute->id }}{{ $value->id }}">
                                                <label class="form-check-label" for="active">
                                                    Active
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-2 text-center">
                                            <button type="submit" class="btn btn-info btn-sm btn-circle">
                                                <i class="fas fa-2x fa-edit"></i>
                                            </button>
                                        </div>

                                    </div>
                                </form>
                            @else
                                <span class="{{ $value->active ? 'text-success' : 'text-secondary' }}">
                                    {{ $value->name }}
                                </span>
                                <button class="btn btn-danger btn-sm btn-circle float-end ms-2"
                                    onclick="deleteConfirm({{ $value->id }},'{{ $value->name }}')">
                                    <i class="fas fa-2x fa-minus-circle "></i>
                                </button>
                                <button wire:click="editValue({{ $value->id }})" type="button"
                                    title="Editati valorile atributului"
                                    class="btn btn-success btn-sm btn-circle float-end"
                                    id="edit-value-for-{{ $attribute->id }}-{{ $value->id }}">
                                    <i class="fas fa-2x fa-edit"></i>
                                </button>
                            @endif
                        </li>

                    @empty
                    @endforelse
                </div>

                {{-- forularul pentru adaugarea de valori ale atributului --}}
                <li class="list-group-item list-group-item-dark">
                    <form action="{{ route('admin.attributes.add.values', $attribute->id) }}" method="POST"
                        id="add-value-{{ $attribute->id }}">
                        @csrf
                        <div class="row">

                            {{-- numele atributului --}}
                            <div class="col-md-6">
                                <label for="name_attribute">Name</label>
                                <input name="name" type="text"
                                    class="form-control @error('name') is-invalid @enderror" id="name_attribute"
                                    placeholder="new value for attribute" value="{{ old('name') }}"required>

                                {{-- validare --}}
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror

                            </div>

                            {{-- pozitia in liste --}}
                            <div class="col-md-3">
                                <label for="name_position">Position</label>
                                <input name="position" type="number"
                                    class="form-control  @error('position') is-invalid @enderror" id="name_position"
                                    placeholder="Position in lists" value="{{ old('position', 10) }}" />
                                {{-- validare --}}
                                @error('position')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- activ pentru public --}}
                            <div class="col-md-3">
                                <div class="form-check">
                                    <input name="active" class="form-check-input" type="checkbox" value="1"
                                        id="active" checked>
                                    <label class="form-check-label" for="active">
                                        Activ
                                    </label>
                                </div>

                                {{-- butonul submit --}}
                                <button class="btn btn-primary btn-sm" type="submit">Add Value</button>
                            </div>

                        </div>
                    </form>
                </li>

            </div>
        </div>
    @empty
        <div class="alert alert-info">
            Nu exista atribute ale produselor inregistrate in baza de date!
        </div>
    @endforelse
</div>
