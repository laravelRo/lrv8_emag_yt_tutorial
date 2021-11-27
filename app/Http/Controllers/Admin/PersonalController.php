<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PersonalController extends Controller
{
    //ruta pentru afisarea Panoului de control al administratiei
    public function showControlPanel()
    {
        return view('admin.personal.cpanel');
    }
}
