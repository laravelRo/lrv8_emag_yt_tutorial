<div class="modal fade" data-bs-backdrop="static" tabindex="-1" id="modalCouponsUser" wire:ignore.self>
    <div class="modal-dialog">
        <div class="modal-content">
            @if ($coupon_user_active)
                <div class="modal-header">
                    <h5 class="modal-title">Aplicarea couponului {{ $coupon_user_active->code }}</h5>
                    <button wire:click="resetUserModal" type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form wire:submit.prevent='atachUser'>
                        <div class="input-group mb-3">
                            <input wire:model="user_id" type="text" class="form-control" placeholder="User ID"
                                aria-label="Recipient's username" aria-describedby="basic-addon2">
                            <button type="submit" class="input-group-text btn btn-primary" id="basic-addon2">
                                Attach User
                            </button>
                        </div>
                    </form>
                    @if ($error_message)
                        <p class="text-danger">{{ $error_message }}</p>
                    @endif

                    @forelse($coupon_users as $user)
                        <button class="btn btn-success btn-sm m-2">
                            {{ $user->name }} <span wire:click="detachUser('{{ $user->id }}')"
                                class="badge bg-danger">X</span>
                        </button>

                    @empty
                        <div class="alert alert-warning">
                            Nu exista utilizatori cu acest coupon
                        </div>
                    @endforelse
                </div>
                <div class="modal-footer">
                    <button wire:click="resetUserModal" type="button" class="btn btn-secondary"
                        data-bs-dismiss="modal">Close</button>

                </div>
            @endif
        </div>
    </div>
</div>
