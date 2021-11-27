<?php

namespace App\Http\Controllers\Admin;

use App\Models\Staff;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Http\Requests\StaffNewRequest;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\StaffUpdateRequest;
use Illuminate\Validation\Rules\Password;

class ManagerController extends Controller
{
    public function showStaff()
    {
        if (request('blocked') == true) {
            $users = Staff::onlyTrashed()->orderBy('deleted_at', 'DESC')->get();

        } else {
            $users = Staff::all()
                ->whereNotIn('id', 1)
                ->sortBy('name');
        }



        return view('admin.personal.staff-view')
            ->with('users', $users)
            ->with('blocked_members', request('blocked'));
    }

    public function newStaff()
    {
        return view('admin.personal.staff-new');
    }

    public function createStaff(StaffNewRequest $request)
    {
        $staff = new Staff;

        //uploadam imaginea daca exista
        if ($request->hasFile('photo')) {
            //obtinem extensia fisierului
            $extension = $request->file('photo')->getClientOriginalExtension();
            $photo_name = str_replace(' ', '', $request->name) . '_' . time() . '.' . $extension;
            //georgescu_263454328.jpg

            $request->file('photo')->move('admin/images/staff', $photo_name);

            $staff->photo = $photo_name;
        }

        $staff->name = $request->name;
        $staff->email = $request->email;
        $staff->phone = $request->phone;
        $staff->type = $request->type;

        $staff->password = bcrypt($request->password);

        $staff->save();
        return redirect(route('show.staff'))->with('success', 'A fost creat un nou membru al staff-ului cu numele ' .  $request->name);
    }

    public function editStaff($id)
    {
        $staff = Staff::findOrFail($id);
        return view('admin.personal.staff-edit')->with('user', $staff);
    }

    public function updateStaff(StaffUpdateRequest $request, $id)
    {
        $staff = Staff::findOrFail($id);

        //verificam ca a fost modificata poza
        if ($request->hasFile('photo')) {

            //stergem vechea fotografie a membrului staff
            if (!($staff->photo == 'staff.jpg')) {
                File::delete($staff->photoPath());
            }

            //obtinem extensia fisierului
            $extension = $request->file('photo')->getClientOriginalExtension();
            $photo_name = str_replace(' ', '', $request->name) . '_' . time() . '.' . $extension;
            //georgescu_263454328.jpg

            $request->file('photo')->move('admin/images/staff', $photo_name);

            $staff->photo = $photo_name;
        }

        //actualizez restul campurilor
        $staff->name = $request->name;
        $staff->email = $request->email;
        $staff->phone = $request->phone;
        $staff->type = $request->type;

        $staff->save();

        $mess = 'Datele membrului Staff ' . $staff->name . ' au fost actualizate cu success!';
        Alert::success('Actualizare reusita', $mess)->persistent(true, false);

        return back()->with('success', $mess);
    }

    public function updatePassword(Request $request, $id)
    {
        $request->validate(
            [
                'password' => [
                    'required', 'confirmed', Password::min(8)

                        ->letters()
                        ->numbers()
                        ->symbols()
                        ->uncompromised(5),
                ],
            ],
            [
                'password.required' => 'Trebuie sa introduceti o parola',
                'password.confirmed' => 'Trebuie sa confirmati exact parola',


            ]
        );

        $staff = Staff::findOrFail($id);

        $staff->password = bcrypt($request->password);
        $staff->save();

        $mess = 'Parola membrului Staff ' . $staff->name . ' a fost modificata: ' . $request->password;
        Alert::success('Parola modificata', $mess)->persistent(true, false);

        return back()->with('success', $mess);
    }

    public function blockStaff($id)
    {
        $staff = Staff::findOrFail($id);
        $staff->delete();
        return back()->with('success', 'Membrul Staff ' . $staff->name . ' a fost blocat!');
    }

    public function restoreStaff($id)
    {
        $staff=Staff::onlyTrashed()->where('id',$id)->first();
        $staff->restore();
        return redirect(route('show.staff'))->with('success', 'Membrul staff ' . $staff->name . ' A fost deblocat!');
    }

    public function removeStaff($id)
    {
        $staff=Staff::onlyTrashed()->where('id',$id)->first();
        $staff->forceDelete();

        return redirect(route('show.staff'))
        ->with('success', 'Membrul staff ' . $staff->name . ' A fost sters definitiv din baza de date!');

    }
}
