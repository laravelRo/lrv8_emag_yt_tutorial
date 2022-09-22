@extends('admin.template')

@section('content')
    <main>
        <div class="container-fluid px-4">

            {{-- === FORMULARUL PENTUR ADAUGAREA UNUI ATRIBUT === --}}

            <div class="row my-3">
                <div class="card col-md-7 mx-auto">
                    <div class="card-header bg-primary text-light">Add Attribute for products</div>

                    <div class="card-body">
                        <form action="{{ route('admin.attributes.add') }}" method="POST">
                            @csrf
                            <div class="row">

                                {{-- numele atributului --}}
                                <div class="col-md-6">
                                    <label for="name_attribute">Name</label>
                                    <input name="name" type="text"
                                        class="form-control @error('name') is-invalid @enderror" id="name_attribute"
                                        placeholder="Color, Size etc..." value="{{ old('name') }}"required>

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
                                        placeholder="Position in lists" value="{{ old('position', 10) }}">
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
                                    <button class="btn btn-primary" type="submit">Add Attribute</button>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
            {{-- <<<=== FORMULARUL PENTUR ADAUGAREA UNUI ATRIBUT === --}}

            {{-- ===>>> cOMPONENTA LIVEWIRE PENTRU ATRIBUTE SI VALORI ALE ACESTORA === --}}
            @livewire('admin.attributes-values')

        </div> {{-- END CONTAINER --}}
    </main>
@endsection

@section('customJs')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        window.deleteConfirm = function(valueId, name) {
            Swal.fire({
                icon: 'question',
                text: 'Confirmati stergerea valorii ' + name + ' ?',
                showCancelButton: true,
                confirmButtonText: 'Delete',
                confirmButtonColor: '#ff0000',
            }).then((result) => {
                if (result.isConfirmed) {
                    Livewire.emit('deleteValue', valueId);
                }
            });
        }

        window.deleteAttribute = function(valueId, name) {
            Swal.fire({
                icon: 'question',
                text: 'Confirmati stergerea atributului ' + name + ' ?',
                showCancelButton: true,
                confirmButtonText: 'Delete',
                confirmButtonColor: '#ff0000',
            }).then((result) => {
                if (result.isConfirmed) {
                    Livewire.emit('deleteAttribute', valueId);
                }
            });
        }
    </script>
@endsection
