<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;

class AdminController extends Controller
{
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

    public function login()
    {
        return view('pages.adminlogin');
    }
    public function login_admin(Request $request)
    {
        $login_id = $request->login_id;
        $password = $request->password;

        $admin_user = Admin::where('login_id', '=', $login_id)
            ->where('password', '=', $password)
            ->first();

        if (!$admin_user) {
            return redirect()->back()->with('err_msg', 'Invalid login ID or password');
        } else {
            // Store user data into session
            $request->session()->put('admin_login_id', $admin_user->login_id);

            return redirect()->to('admin-dashboard');
        }
    }
    public function dashboard()
    {
        return view('pages.admindashboard');
    }
}
