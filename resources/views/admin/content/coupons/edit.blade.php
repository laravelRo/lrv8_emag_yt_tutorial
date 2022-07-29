@extends('admin.template')

@section('content')
    <main>
        <div class="container-fluid px-4">


            <h1 class="m-3">Edit coupon <span class="text-info">{{ $coupon->code }}</span></h1>
            <ol class="breadcrumb mb-4 mx-3">
                <li class="breadcrumb-item"><a href="{{ route('control-panel') }}">Control Panel</a></li>
                <li class="breadcrumb-item "><a href="{{ route('admin.coupons.list') }}"> Coupons</a></li>
                <li class="breadcrumb-item active">Edit Coupon <span class="text-info">{{ $coupon->code }}</span></li>
            </ol>

            <div class="card mb-4 p-4">
                <form action="{{ route('admin.coupons.update', $coupon->id) }}" method="POST">
                    @method('put')
                    @csrf
                    {{-- === randul 1 name slug title --}}
                    <div class="row my-3">

                        {{-- numele codului --}}
                        <div class="col-md-3">
                            <label for="name" class="form-label">Coupon Code</label>
                            <input type="text" name="code" class="form-control @error('code') is-invalid @enderror"
                                id="code" value="{{ old('code', $coupon->code) }}" placeholder="enter coupon code"
                                required>
                            @error('coupon')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="col-md-3">
                            <label for="coupon_type" class="form-label  @error('coupon_type') is-invalid @enderror">Coupon
                                type</label>

                            <select class="form-select" name="coupon_type">

                                <option value="1" {{ $coupon->coupon_type == 1 ? 'selected' : '' }}>General</option>
                                <option value="2" {{ $coupon->coupon_type == 2 ? 'selected' : '' }}>Categories
                                </option>
                                <option value="3" {{ $coupon->coupon_type == 3 ? 'selected' : '' }}>Users</option>
                                <option value="4" {{ $coupon->coupon_type == 4 ? 'selected' : '' }}>Brands</option>
                            </select>

                            @error('coupon_type')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>


                        <div class="col-md-2 d-flex flex-column justify-content-end">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" value="1" name="percent" id="percent"
                                    {{ old('percent', $coupon->percent) == 1 ? 'checked' : '' }}
                                    @if (is_null(old('percent', $coupon->percent))) checked @endif>
                                <label class="form-check-label" for="percent">
                                    Percent
                                </label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="percent" id="active2" value="0"
                                    {{ old('percent', $coupon->percent) === 0 ? 'checked' : '' }}>
                                <label class="form-check-label" for="active2">
                                    Fixed
                                </label>

                            </div>
                        </div>

                        <div class="col-md-2">
                            <label for="value" class="form-label">Coupon Value</label>
                            <input type="numeric" name="value" class="form-control @error('value') is-invalid @enderror"
                                id="value" value="{{ old('value', $coupon->value) }}" placeholder="enter coupon value">
                            @error('value')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="col-md-2">
                            <label for="value" class="form-label">Coupon Amount</label>
                            <input type="numeric" name="amount" class="form-control @error('amount') is-invalid @enderror"
                                id="amount" value="{{ old('amount', $coupon->amount) }}"
                                placeholder="amount of order total for this coupon">
                            @error('amount')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    {{-- <<<=== randul 1 name slug title --}}

                    {{-- <<<=== randul 2 description promo, icon, active, position --}}
                    <div class="row my-3">
                        <div class="col-md-6">

                            <label for="description" class="form-label">Coupon description (500 chars)</label>
                            <textarea name="description" class="form-control @error('description') is-invalid @enderror" id="description"
                                rows="3">{{ old('description', $coupon->description) }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-md-2 d-flex flex-column justify-content-end">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" value="1" name="active" id="active1"
                                    {{ old('active', $coupon->active) == 1 ? 'checked' : '' }}
                                    @if (is_null(old('active', $coupon->active))) checked @endif>
                                <label class="form-check-label" for="active1">
                                    Active
                                </label>

                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="active" id="active2" value="0"
                                    {{ old('active', $coupon->active) === 0 ? 'checked' : '' }}>
                                <label class="form-check-label" for="active2">
                                    Inactive
                                </label>

                            </div>


                        </div>

                        <div class="col-md-2 d-flex flex-column justify-content-end">
                            <label for="expired_at" class="form-label">Expire date for coupon</label>
                            <input type="date" name="expired_at"
                                class="form-control @error('expired_at') is-invalid @enderror" id="expired_at"
                                value="{{ old('expired_at', $coupon->expired_at->format('Y-m-d')) }}"
                                placeholder="enter expire date for coupon" required>
                            @error('expired_at')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    {{-- <<<=== randul 2 description icon promo, active, position --}}


                    {{-- === randul cu butoanele de return si submit --}}
                    <div class="row mt-4">
                        <div class="col-md-12">
                            <a href="{{ route('admin.coupons.list') }}" class="btn btn-dark float-start">
                                <i class="fas fa-undo"></i> return</a>

                            <button class="btn btn-primary float-end" type="submit"> <i class="fas fa-plus"></i>
                                Update Coupon</button>
                        </div>
                    </div>
                    {{-- === randul cu butoanele de return si submit --}}
                </form>
            </div>

        </div>
    </main>
@endsection
