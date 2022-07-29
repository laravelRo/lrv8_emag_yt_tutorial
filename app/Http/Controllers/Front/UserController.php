<?php

namespace App\Http\Controllers\Front;

use App\Models\User;
use App\Models\Address;
use App\Models\shop\Coupon;
use Illuminate\Http\Request;
use App\Rules\MatchOldPassword;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\AddressAddRequest;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    public function showSettings()
    {
        return view('front.user.cpanel.info');
    }

    //afisam formularul pentru resetarea parolei
    public function showResetPass()
    {
        return view('front.user.cpanel.reset');
    }
    // schimbam parola
    public function resetPass(Request $request)
    {
        $request->validate(
            [
                'current_pass' => ['required', new MatchOldPassword],
                'newpassword' => ['required', 'confirmed', 'min:8'],
                //optional
                'newpassword_confirmation' => 'same:newpassword'
            ],
            [
                'current_pass.required' => 'Trebuie sa introduceti parola actuala pentru a o putea schimba!',
                'newpasssword.required' => 'Trebuie sa introduceti noua parola!',
                'newpasssword.confirmed' => 'Nu ati confirmat corect noua parola',
                'newpasssword.min' => 'Parola trebuie sa aiba minim 8 caractere!',
                'newpassword_confirmation.same' => 'Nu ati confirmat corect noua parola!',
            ]
        );

        $user = User::findOrFail(auth()->id());
        $user->password = bcrypt($request->newpassword);
        $user->save();

        Alert::success('Parola a fost schimbata!', 'Noua parola este - ' . $request->newpassword . ' - . Notati noua parola intr-un loc sigur!')
            ->persistent(true, false);

        return back();
    }

    public function showAddress()
    {
        $user = Auth::user();
        return view('front.user.cpanel.address')
            ->with('user', $user);
    }

    public function addAddress()
    {
        return view('front.user.cpanel.address-add');
    }

    public function createAddress(AddressAddRequest $request)
    {
        $address = new Address;

        $address->user_id = Auth::id();

        $address->name = $request->name;
        $address->phone = $request->phone;
        $address->city = $request->city;
        $address->address = $request->address;
        $address->observations = $request->observations;

        $address->save();
        Alert::success('Adresa creata', 'Noua adresa a fost salvata in baza de date')->persistent(true, false);

        return redirect(route('address.show'));
    }

    public function editAddress($id)
    {
        $address = Address::findOrFail($id);
        return view('front.user.cpanel.address-edit')->with('address', $address);
    }

    public function updateAddress(AddressAddRequest $request, $id)
    {
        $address = Address::findOrFail($id);

        $address->name = $request->name;
        $address->phone = $request->phone;
        $address->city = $request->city;
        $address->address = $request->address;
        $address->observations = $request->observations;

        $address->save();
        Alert::success('Adresa actualizata', 'Datele noii adrese au fost actualizate cu succes!')->persistent(true, false);
        return redirect(route('address.show'));
    }

    public function deleteAddress($id)
    {
        $address = Address::findOrfail($id)->delete();
        return redirect()->back()->with('success', 'Adresa a fost stearsa din baza de date');
    }

    //==============
    // coupoane
    //==============

    public function showCoupons()
    {
        //afisam coupoanele generale
        $coupons_gen = Coupon::where('active', true)
            ->where('expired_at', '>=', now())
            ->where('coupon_type', 1)
            ->get();

        //afisam coupoanele de brand
        $coupons_brands = Coupon::where('active', true)
            ->where('expired_at', '>=', now())
            ->where('coupon_type', 4)
            ->get();

        //afisam coupoanele de utilizator
        $vouchers = auth()->user()->couponsActive();

        //afisam coupoanele pentru categorii
        $coupons_categs = Coupon::where('active', true)
            ->where('expired_at', '>=', now())
            ->where('coupon_type', 2)
            ->get();


        return view('front.user.cpanel.coupons')
            ->with('coupons_gen', $coupons_gen)
            ->with('vouchers', $vouchers)
            ->with('coupons_brands', $coupons_brands)
            ->with('coupons_categs', $coupons_categs);
    }
}
