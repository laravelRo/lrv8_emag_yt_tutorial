@extends('front.user.cpanel.main')

@section('panel_content')
    <h2 class="my-2">Coupoane active</h2>
    <hr>
    <div class="alert alert-info">
        <p class="my-3"><b>Coupoane generale - pentru orice comanda</b></p>
    </div>
    @forelse($coupons_gen as $coupon_gen)
        <p>
            Cod: <span class="text-info">{{ $coupon_gen->code }}</span>
            Valoare: {{ $coupon_gen->value }} {{ $coupon_gen->percent ? '%' : 'RON' }} <br>
            {{ $coupon_gen->description }}
        </p>

    @empty
        <p>Nu asunt disponibile coupone generale in momentul actual</p>
    @endforelse
    <hr>

    {{-- === Vouchere personale --}}
    <div class="alert alert-info">
        <p class="my-3"><b>Vouchere personale</b></p>
    </div>
    @forelse($vouchers as $voucher)
        <p>
            Cod: <span class="text-info">{{ $voucher->code }}</span>
            Valoare: {{ $voucher->value }} {{ $voucher->percent ? '%' : 'RON' }} <br>
            {{ $voucher->description }}
        </p>

    @empty
        <p>Nu sunt disponibile vouchere personale in momentul actual</p>
    @endforelse
    <hr>

    {{-- === Coupoane Brand --}}
    <div class="alert alert-info">
        <p class="my-3"><b>Coupoane de Brand</b></p>
    </div>
    @forelse($coupons_brands as $coupon_brand)
        <p>
            Cod: <span class="text-info">{{ $coupon_brand->code }}</span>
            Valoare: {{ $coupon_brand->value }} {{ $coupon_brand->percent ? '%' : 'RON' }} <br>
            {{ $coupon_brand->description }}
        </p>

    @empty
        <p>Nu asunt disponibile coupoane de Brand momentan</p>
    @endforelse
    <hr>
@endsection
