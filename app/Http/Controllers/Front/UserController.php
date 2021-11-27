<?php

namespace App\Http\Controllers\Front;

use App\Models\User;
use Illuminate\Http\Request;
use App\Rules\MatchOldPassword;
use App\Http\Controllers\Controller;
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
}
