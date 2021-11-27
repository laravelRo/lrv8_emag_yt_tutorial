@extends('admin.template')

@section('content')
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Staff members
                {!! $blocked_members ? '<span class="text-danger"> - blocked staff </span>' : '' !!} - {{ $users->count() }}</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="{{ route('control-panel') }}">Control Panel</a></li>
                <li class="breadcrumb-item active">Staff members</li>
            </ol>

            {{-- afisarea managerului principal --}}
            <div class="card mb-4">
                <div class="card-body bg-warning">
                    <b>Manager principal:</b> Galan Rares, <b>email:</b> manager@emag.com, <b>telefon:</b> 0777 888 999
                    <img src="{{ asset('admin/images/manager.jpg') }}" width="60" alt="">
                </div>
            </div>

            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    List of Staff Members -
                    @if($blocked_members)
                    <a class="link-success" href="{{ route('show.staff') }}">
                        Staff members
                    </a>
                    @else
                    <a class="link-danger " href="{{ route('show.staff', ['blocked' => true]) }}">
                        Blocked members
                    </a>
                    <a href="{{ route('new.staff') }}" class="btn btn-success float-end">
                        <i class="fas fa-user-plus"></i> Add member
                    </a>
                    @endif


                </div>
                <div class="card-body">
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th class="text-center">Photo</th>
                                <th>Type</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th class="text-center">
                                    Photo
                                </th>
                                <th>Type</th>
                                <th>Actions</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @forelse($users as $user)
                                <tr>
                                    <td>
                                        {{ $user->name }}
                                    </td>
                                    <td>
                                        {{ $user->email }}
                                    </td>
                                    <td>
                                        {{ $user->phone }}
                                    </td>
                                    <td class="text-center">
                                        <img src="{{ $user->photoUrl() }}" width="60" alt="">
                                    </td>
                                    <td>
                                        {{ $user->type }}
                                    </td>
                                    <td>
                                        @if(!$user->trashed())
                                        <a title="Editeaza membru Staff" href="{{ route('edit.staff', $user->id) }}"
                                            class="btn btn-success btn-md btn-circle"><i class="fas fa-user-edit fa-2x"></i>
                                        </a>

                                        {{-- //formularul de blocare a unui utilizator --}}
                                        <form id="form-delete-{{ $user->id }}"
                                            action="{{ route('block.staff', $user->id) }}" method="POST"
                                            style="display:inline-block;">
                                            @csrf
                                            @method('delete')
                                        </form>
                                        <button class="btn btn-danger btn-md btn-circle"
                                            onclick="deleteConfirm('form-delete-{{ $user->id }}','{{ $user->name }}')">
                                            <i class="fas fa-user-slash fa-2x"></i>
                                        </button>
                                        @else
                                        {{-- restore staff --}}
                                        <form id="form-restore-{{ $user->id }}"
                                            action="{{ route('restore.staff', $user->id) }}" method="POST"
                                            style="display:inline-block;">
                                            @csrf
                                            @method('put')
                                        </form>

                                        <button class="btn btn-primary"
                                        onclick="restoreConfirm('form-restore-{{ $user->id }}','{{ $user->name }}')">
                                        Restore staff
                                    </button>

                                    {{-- <<< restore staff --}}

                                    {{-- remove staff --}}
                                    <form id="form-remove-{{ $user->id }}"
                                        action="{{ route('remove.staff', $user->id) }}" method="POST"
                                        style="display:inline-block;">
                                        @csrf
                                        @method('delete')
                                    </form>
                                    <button class="btn btn-danger"
                                    onclick="removeConfirm('form-remove-{{ $user->id }}','{{ $user->name }}')">
                                    Remove Staff
                                </button>


                                {{-- <<< remove staff --}}

                                        @endif

                                        {{-- <button title="Block this user"
                                            class="btn btn-danger btn-md btn-circle delete-confirm show_confirm"
                                            onclick="if(confirm('Confirmati stergerea membrului Staff {{ $user->name }}?'))
                                                    {document.getElementById('form-delete-{{ $user->id }}').submit();}">
                                            <i class="fas fa-user-slash fa-2x"></i>
                                        </button> --}}
                                    </td>
                                </tr>

                            @empty
                                <div class="alert alert-info">
                                    Nu exista membrii ai staff-ului inregistrati
                                </div>
                            @endforelse

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
@endsection

@section('customJs')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        window.deleteConfirm = function(formId, name) {
            Swal.fire({
                icon: 'question',
                text: 'Confirmati blocarea utilizatorului ' + name + ' ?',
                showCancelButton: true,
                confirmButtonText: 'Block',
                confirmButtonColor: '#e3342f',
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById(formId).submit();
                }
            });
        }
    </script>
    <script>
        window.restoreConfirm = function(formId, name) {
            Swal.fire({
                icon: 'question',
                text: 'Confirmati deblocarea membrului ' + name + ' ?',
                showCancelButton: true,
                confirmButtonText: 'Restore',
                confirmButtonColor: '#0d4aa5',
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById(formId).submit();
                }
            });
        }
    </script>
     <script>
        window.removeConfirm = function(formId, name) {
            Swal.fire({
                icon: 'question',
                text: 'Confirmati stergerea definitiva a membrului ' + name + ' ?',
                showCancelButton: true,
                confirmButtonText: 'Remove',
                confirmButtonColor: '#e3342f',
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById(formId).submit();
                }
            });
        }
    </script>
@endsection
