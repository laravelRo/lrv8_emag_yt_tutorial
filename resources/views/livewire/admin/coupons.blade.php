<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Coupons - {{ $coupons->total() }}

        </h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('control-panel') }}">Control Panel</a></li>
            <li class="breadcrumb-item active">Coupons</li>
        </ol>
    </div>

    <div class="card m-4">
        <div class="card-header">
            <a href="{{ route('admin.coupons.new') }}" class="btn btn-primary float-end">Add Coupon</a>
            <h4>Lista coupoanelor</h4>
        </div>
        <div class="card-body">

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Code</th>
                        <th scope="col">Description</th>
                        <th scope="col">Type</th>

                        <th scope="col">Value</th>
                        <th scope="col">% / Fix</th>

                        <th scope="col">Amount</th>
                        <th scope="col">Expire</th>
                        <th scope="col" style="max-width: 150px">Active</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($coupons as $coupon)
                        <tr>
                            <td>{{ $coupons->currentPage() > 1
                                ? $loop->iteration + $coupons->perPage() * ($coupons->currentPage() - 1)
                                : $loop->iteration }}
                            </td>
                            <td>{{ $coupon->code }}</td>
                            <td>{{ $coupon->description }}</td>
                            <td>
                                @if ($coupon->coupon_type == 2)
                                    <span class="text-info"> categories</span>
                                @endif
                                @if ($coupon->coupon_type == 4)
                                    <span class="text-info"> brands</span>
                                @endif
                                @if ($coupon->coupon_type == 3)
                                    <span class="text-info"> users</span>
                                @endif
                                @if ($coupon->coupon_type == 1)
                                    <span class="text-info"> general</span>
                                @endif
                            </td>
                            <td>{{ $coupon->value }}</td>
                            <td>{{ $coupon->percent ? '%' : 'Fix' }}</td>
                            <td>{{ $coupon->amount }}</td>
                            <td>{{ $coupon->expired_at->format('d-M Y') }}</td>
                            <td>
                                @livewire('admin.sections-status', ['model' => $coupon, 'show_standard' => false], key(time() . $coupon->id))
                            </td>
                            <td>
                                <a href="{{ route('admin.coupons.edit', $coupon->id) }}"
                                    class="btn btn-circle btn-sm btn-success">
                                    <i class="far fa-edit fa-2x"></i>
                                </a>

                                @if ($coupon->coupon_type == 3)
                                    <button id="{{ time() }}_user_{{ $coupon->id }}" wire:ignore
                                        wire:click="openModalCoupons('{{ $coupon->id }}')"
                                        class="btn btn-circle btn-sm btn-primary">
                                        <i class="fas fa-user-plus fa-2x"></i>
                                    </button>
                                @endif
                                @if ($coupon->coupon_type == 4)
                                    <button id="{{ time() }}_user_{{ $coupon->id }}" wire:ignore
                                        wire:click="openModalBrand('{{ $coupon->id }}')"
                                        class="btn btn-circle btn-sm btn-warning">
                                        <i class="fab fa-buffer fa-2x"></i>
                                    </button>
                                @endif
                                @if ($coupon->coupon_type == 2)
                                    <button id="{{ time() }}_categs_{{ $coupon->id }}" wire:ignore
                                        wire:click="openModalCategs('{{ $coupon->id }}')"
                                        class="btn btn-circle btn-sm btn-info">
                                        <i class="fas fa-list fa-2x"></i>
                                    </button>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <div class="alert alert-info">
                            Nu exista nici un coupon in baza de date!
                        </div>
                    @endforelse

                </tbody>
            </table>
            <div>{{ $coupons->links() }}</div>

        </div>
        @include('admin.content.coupons.modal-user-coupons')
        @include('admin.content.coupons.modal-brands-coupon')
        @include('admin.content.coupons.modal-categs-coupon')

    </div>

</main>
