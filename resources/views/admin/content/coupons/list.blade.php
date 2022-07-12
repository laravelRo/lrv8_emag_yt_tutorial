@extends('admin.template')

@section('content')
    @livewire('admin.coupons')
@endsection

@section('customJs')
    <script>
        var userCouponModal = new bootstrap.Modal(document.getElementById("modalCouponsUser"), {});

        window.addEventListener('openCouponsModal', function(event) {
            userCouponModal.show();

        });
    </script>
@endsection
