@extends('admin.template')

@section('content')
    @livewire('admin.coupons')
@endsection

@section('customJs')
    <script>
        var userCouponModal = new bootstrap.Modal(document.getElementById("modalCouponsUser"), {});
        var brandsCouponModal = new bootstrap.Modal(document.getElementById("modalBrandsCoupon"), {});
        var categsCouponModal = new bootstrap.Modal(document.getElementById("modalCategsCoupon"), {});

        window.addEventListener('openCouponsModal', function(event) {
            userCouponModal.show();

        });
        window.addEventListener('openBrandsModal', function(event) {
            brandsCouponModal.show();

        });

        window.addEventListener('openCategsModal', function(event) {
            categsCouponModal.show();

        });
    </script>
@endsection
