<?php

namespace App\Http\Controllers\Admin\Content;

use App\Models\shop\Coupon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\Content\AddCouponRequest;

class CouponsController extends Controller
{
    //afisam lista cpouponelor
    public function listCoupons()
    {

        return view('admin.content.coupons.list');
    }

    //afisam formularul pentru adaugarea unui coupon
    public function newCoupon()
    {
        return view('admin.content.coupons.new');
    }

    //adaugam noul coupon
    public function addCoupon(AddCouponRequest $request)
    {
        $request->validate(
            [
                'code' => 'unique:coupons,code'
            ],
            [
                'code.unique' => 'Acest cod este deja utilizat in baza de date'
            ]
        );


        $coupon = new Coupon;

        $coupon->code = $request->code;
        $coupon->coupon_type = $request->coupon_type;

        $coupon->percent = $request->percent;

        $coupon->value = $request->value;
        $coupon->amount = $request->amount;
        $coupon->description = $request->description;

        if ($request->active == 1) {
            $coupon->active = 1;
        } else {
            $coupon->active = 0;
        }
        $coupon->expired_at = $request->expired_at;

        $coupon->save();

        Alert::success('Couponul a fost adaugat in baza de date')->persistent('true', 'false');
        return redirect(route('admin.coupons.list'));
    }

    //afisam formularul de editare a unui coupon
    public function editCoupon($id)
    {
        $coupon = Coupon::findOrFail($id);
        return view('admin.content.coupons.edit')->with('coupon', $coupon);
    }

    //updatam couponul
    public function updateCoupon(AddCouponRequest $request, $id)
    {
        $request->validate(
            [
                'code' => 'unique:coupons,code,' . $id,
            ],
            [
                'code.unique' => 'Acest cod este deja utilizat in baza de date'
            ]
        );

        $coupon = Coupon::findOrFail($id);

        $coupon->code = $request->code;
        $coupon->coupon_type = $request->coupon_type;

        $coupon->percent = $request->percent;

        $coupon->value = $request->value;
        $coupon->amount = $request->amount;
        $coupon->description = $request->description;

        if ($request->active == 1) {
            $coupon->active = 1;
        } else {
            $coupon->active = 0;
        }
        $coupon->expired_at = $request->expired_at;

        $coupon->save();

        Alert::success('Couponul a fost actualizat')->persistent('true', 'false');
        return redirect()->back();
    }
}
