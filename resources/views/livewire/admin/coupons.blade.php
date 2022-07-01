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
                        <th scope="col">Value</th>
                        <th scope="col">% / Fix</th>

                        <th scope="col">Amount</th>
                        <th scope="col">Expire</th>
                        <th scope="col">Active</th>
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
                            <td>{{ $coupon->value }}</td>
                            <td>{{ $coupon->percent ? '%' : 'Fix' }}</td>
                            <td>{{ $coupon->amount }}</td>
                            <td>{{ $coupon->expired_at->format('d-M Y') }}</td>
                            <td style="width: 220px;">
                                @livewire('admin.sections-status', ['model' => $coupon, 'show_standard' => false])
                            </td>
                            <td>
                                <a href="{{ route('admin.coupons.edit', $coupon->id) }}"
                                    class="btn btn-circle btn-sm btn-success">
                                    <i class="far fa-edit fa-2x"></i>
                                </a>
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
    </div>
</main>
