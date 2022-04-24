@extends('front.user.cpanel.main')

@section('panel_content')
    <a href="{{ route('address.add') }}" class="btn btn-primary float-right"><i class="fas fa-address-book"></i> Add
        Address</a>
    <h3>Adresele contului <span class="text-info">{{ $user->name }}</span> email: <span
            class="text-info">{{ $user->email }}</span> </h3>
    @if ($user->addresses->count() == 0)
        <div class="alert alert-info">
            Nu aveti inregistrata nici o adresa. Pentru a putea plasa comenzi inregistrati o adresa de destinatie in
            formularul de mai jos!
        </div>
    @else
        <div class="alert alert-warning">
            Aveti {{ $user->addresses->count() }} adrese inregistrate. Puteti editata sau adauga o noua adresa in
            formularul de mai jos.
        </div>
    @endif
    <div class="row">
        @forelse($user->addresses as $address)
            <div class="col-md-4">
                <div class="card h-100 d-flex flex-column justify-content-between">
                    <div class="card-header">
                        <b>Dest:</b> {{ $address->name }}
                    </div>
                    <div class="card-body">
                        <p><b>Phone:</b> {{ $address->phone }}</p>
                        <p><b>City:</b> {{ $address->city }}</p>
                        <p><b>Address:</b> {{ $address->address }}</p>
                        <p><b>Note:</b> {{ $address->observations }}</p>
                    </div>
                    <div class="card-footer">
                        <form action="{{ route('address.delete', $address->id) }}" class="d-none"
                            id="address-delete-{{ $address->id }}" method="POST">
                            @csrf
                            @method('delete')
                        </form>
                        <button onclick="deleteConfirm('address-delete-{{ $address->id }}','{{ $address->name }}')"
                            class="btn btn-danger float-left"><i class="fa fa-trash"></i> Delete</button>
                        <a href="{{ route('address.edit', $address->id) }}" class="btn btn-primary float-right">
                            <i class="fas fa-edit"></i>
                            Edit</a>
                    </div>
                </div>
            </div>
        @empty
        @endforelse
    </div>
@endsection

@section('customJs')
    <script>
        window.deleteConfirm = function(formId, name) {
            Swal.fire({
                icon: 'question',
                text: 'Confirmati stergerea adresei pe numele ' + name + ' ?',
                showCancelButton: true,
                confirmButtonText: 'Delete',
                confirmButtonColor: '#e3342f',
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById(formId).submit();
                }
            });
        }
    </script>
@endsection
