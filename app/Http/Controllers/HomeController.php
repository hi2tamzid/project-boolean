<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;

class HomeController extends Controller
{
    public function home()
    {
        return view('pages.homepage');
    }

    public function register()
    {
        return view('pages.register');
    }

    public function register_admin()
    {
        return view('pages.adminregister');
    }

    public function store_admin(Request $r)
    {
        $obj = new Admin();
        $obj->login_id = $r->login_id;
        $obj->password = $r->password;
        $obj->save();

        return redirect()->to('/register-admin')->with('msg', 'Registration  Successful');
    }
}
