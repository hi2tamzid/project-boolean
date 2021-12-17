<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Student;
use App\Models\Project;
use App\Models\Supervisor;
use App\Models\Session;
use App\Models\Team;

class AdminController extends Controller
{
    public function registerAdmin()
    {
        return view('pages.adminregister');
    }

    public function storeAdmin(Request $r)
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
    public function loginAdmin(Request $request)
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
        $students = Student::all()->count();
        $projects = Project::all()->count();
        $completed_projects = Project::where('is_completed', true)->count();
        $supervisors = Supervisor::all()->count();
        $sessions = Session::all()->count();
        $teams = Team::all()->count();
        return view('pages.admindashboard', compact('students', 'projects', 'completed_projects', 'supervisors', 'sessions', 'teams'));
    }
    public function controlPanel()
    {
        return view('pages.adminControlPanel');
    }
    public function logout(Request $request)
    {
        $request->session()->forget('login_id');
        return redirect()->to('/login-admin');
    }
}
