<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\LoginStaffRequest;
use RealRashid\SweetAlert\Facades\Alert;

class AuthController extends Controller
{
    //afisam formularul de logare pentru staff
    public function loginForm()
    {
        //afisam formularul de logare
        return view('admin.personal.login');
    }

    //postam formularul de logare pentru staff
    public function login(LoginStaffRequest $request)
    {
        $request->authenticate();

        $request->session()->regenerate();
        Alert::success('Logare cu success', 'Ati fost logat in contul Dvs de utilizator pe emag')->persistent(true, false);

        // return redirect()->intended(RouteServiceProvider::HOME);
        return redirect()->intended(route('control-panel'));
    }

    public function logout()
    {
        Auth::guard('staff')->logout();
        Alert::success('Ati fost delogat din sistem!')->persistent(true, false);
        return redirect(route('home'));
    }
}
