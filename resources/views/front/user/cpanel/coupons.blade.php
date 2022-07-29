@extends('front.user.cpanel.main')

@section('panel_content')
    <h2 class="my-2">Coupoane active</h2>
    <hr>
    <div class="alert alert-info">
        <p class="my-3"><b>Coupoane generale - pentru orice comanda</b></p>
    </div>
    @forelse($coupons_gen as $coupon_gen)
        <p>
            @if ($coupon_gen->amount > 0)
                <b>Valoare minima comanda:</b> <span class="text-info">{{ $coupon_gen->amount }}</span>
                <br>
            @endif
            Cod: <span class="text-info">{{ $coupon_gen->code }}</span>

            Valoare: <span class="text-info">{{ $coupon_gen->value }} {{ $coupon_gen->percent ? '%' : 'RON' }}</span> <br>
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
            @if ($voucher->amount > 0)
                <b>Valoare minima comanda:</b> <span class="text-info">{{ $voucher->amount }}</span>
                <br>
            @endif
            Cod: <span class="text-info">{{ $voucher->code }}</span>

            Valoare: <span class="text-info">{{ $voucher->value }} {{ $voucher->percent ? '%' : 'RON' }}</span> <br>
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
            @if ($coupon_brand->amount > 0)
                Valoare minima comanda: <span class="text-info">{{ $coupon_brand->amount }}</span>
                <br>
            @endif
            Cod: <span class="text-info">{{ $coupon_brand->code }}</span>
            Valoare: <span class="text-info">{{ $coupon_brand->value }} {{ $coupon_brand->percent ? '%' : 'RON' }}</span>
            <br>
            {{ $coupon_brand->description }}
        </p>

    @empty
        <p>Nu asunt disponibile coupoane de Brand momentan</p>
    @endforelse
    <hr>

    {{-- === Coupoane categorii --}}
    <div class="alert alert-info">
        <p class="my-3"><b>Coupoane pentru categorii de produse</b></p>
    </div>
    @forelse($coupons_categs as $coupon_categ)
        <p>
            Cod: <span class="text-info">{{ $coupon_categ->code }}</span>
            @if ($coupon_categ->amount > 0)
                Valoare minima comanda: <span class="text-info">{{ $coupon_categ->amount }}</span>
                <br>
            @endif
            Valoare: {{ $coupon_categ->value }} {{ $coupon_categ->percent ? '%' : 'RON' }} <br>
            {{ $coupon_categ->description }}
        </p>

    @empty
        <p>Nu asunt disponibile coupoane pentru momentan</p>
    @endforelse
    <hr>
@endsection
