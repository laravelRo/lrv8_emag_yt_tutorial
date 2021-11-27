@extends('admin.template')

@section('customJs')

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    {{-- confirmare blocare utilizator --}}
    <script>
        window.blockUserConfirm = function(id, name) {
            Swal.fire({
                icon: 'question',
                text: 'Confirmati blocarea utilizatorului ' + name + ' ?',
                showCancelButton: true,
                confirmButtonText: 'Block',
                confirmButtonColor: '#e3342f',
            }).then((result) => {
                if (result.isConfirmed) {
                    Livewire.emit('blockUser', id);
                    Swal.fire(
                        'Utilizator blocat!',
                        'Utilizatorul ' + name + ' a fost blocat!',
                        'success'
                    );

                }
            });
        }
    </script>
    {{-- confirmare activare utilizator --}}
    <script>
        window.activateUserConfirm = function(id, name) {
            Swal.fire({
                icon: 'question',
                text: 'Confirmati reactivarea utilizatorului ' + name + ' ?',
                showCancelButton: true,
                confirmButtonText: 'Activate',
                confirmButtonColor: '#283ad6',
            }).then((result) => {
                if (result.isConfirmed) {
                    Livewire.emit('activateUser', id);
                    Swal.fire(
                        'Utilizator activat!',
                        'Utilizatorul ' + name + ' a fost activat!',
                        'success'
                    );

                }
            });
        }
    </script>

    {{-- confirmare stergere definitiva utilizator --}}
    <script>
        window.deleteUserConfirm = function(id, name) {
            Swal.fire({
                icon: 'question',
                text: 'Confirmati stergerea definitiva a utilizatorului ' + name + ' ?',
                showCancelButton: true,
                confirmButtonText: 'Delete',
                confirmButtonColor: '#e3342f',
            }).then((result) => {
                if (result.isConfirmed) {
                    Livewire.emit('deleteUser', id);
                    Swal.fire(
                        'Utilizator sters definitiv!',
                        'Utilizatorul ' + name + ' a fost sters definitiv!',
                        'success'
                    );

                }
            });
        }
    </script>
@endsection

@section('content')
    <main>
        <div class="container-fluid px-4">
            @livewire('admin.users')
        </div>
    </main>
@endsection
