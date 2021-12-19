<?php

namespace App\Http\Controllers;

use Illuminate\Validation\Rules\Password;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\Admin;
use App\Models\Student;
use App\Models\Project;
use App\Models\Supervisor;
use App\Models\Session;
use App\Models\Team;
use App\Models\Project_Supervisor;

class AdminController extends Controller
{
    public function registerAdmin()
    {
        return view('pages.adminregister');
    }

    public function storeAdmin(Request $r)
    {
        $validated = $r->validate([
            'login_id' => 'required|unique:App\Models\Admin,login_id',
            'password' => ['required', Password::min(6)]// Require  at least 6 characters...
            
        ]);
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
        $request->session()->forget('admin_login_id');
        return redirect()->to('/login-admin');
    }
    public function supervisor()
    {
        $supervisors = Supervisor::all();
        $project_supervisor = Project_Supervisor::groupBy('supervisor_id')
               ->count();
        // dd($project_supervisor);
        return view('pages.adminSupervisorPanel', compact('supervisors', 'project_supervisor'));
    }
    public function supervisorRegister()
    {
        return view('pages.adminSupervisorRegister');
    }
    public function supervisorRegistrationSubmit(Request $r)
    {
        $validated = $r->validate([
            'login_id' => 'required|unique:App\Models\Supervisor,login_id',
            'password' => ['required', Password::min(6)->letters()],// Require at least one letter and  at least 6 characters...
            'name' => 'required',
            'email' => 'required|email|unique:App\Models\Supervisor,email',
            'gender' => [
                'required',
                Rule::in(['male', 'female'])
            ],
            'mobile' => 'required',
            'image' => 'image'
        ]);

        $obj = new Supervisor();
        $obj->login_id = $r->login_id;
        $obj->password = $r->password;
        $obj->name = $r->name;
        $obj->email = $r->email;
        $obj->gender = $r->gender;
        $obj->mobile = $r->mobile;
        if($r->has('image'))
            $obj->image = $obj->imageUpload($r);
        $obj->save();

        return redirect()->to('/admin-supervisor-register')->with('msg', 'Registration  Successful');
    }
    public function supervisorDelete($id)
    {
        $obj = Supervisor::find($id);
        $obj->delete();
        return redirect()->to('/admin-supervisor')->with('msg', 'Admin account  successfully deleted');
    }
    public function supervisorDetails($id)
    {
        $supervisor = Supervisor::find($id);
        return view('pages.adminSupervisorDetails', compact('supervisor'));
    }
    
    // Student Controllers
    
    public function student()
    {
        $student = Student::all();
        return view('pages.adminStudentPanel', compact('student'));
    }

    public function studentRegister()
    {
        return view('pages.adminStudentRegister');
    }
    public function studentRegisterSubmit(Request $r)
    {
        $validated = $r->validate([
            'student_id' => 'required|unique:App\Models\Student,student_id',
            'password' => ['required', Password::min(6)->letters()],// Require at least one letter and  at least 6 characters...
            'name' => 'required',
            'email' => 'required|email|unique:App\Models\Student,email',
            'gender' => [
                'required',
                Rule::in(['male', 'female'])
            ],
            'mobile' => 'required',
            'year_of_admission' => 'required|date',
            'current_semester' => [
                'required',
                Rule::in(['1st', '2nd', '3rd', '4th', '5th', '6th', '7th', '8th'])
            ],
            'batch' => 'required|integer',
            'image' => 'image'
        ]);

        $obj = new Student();
        $imgProcess = new Supervisor();
        $obj->student_id = $r->student_id;
        $obj->password = $r->password;
        $obj->name = $r->name;
        $obj->email = $r->email;
        $obj->gender = $r->gender;
        $obj->mobile = $r->mobile;
        $obj->year_of_admission = $r->year_of_admission;
        $obj->current_semester = $r->current_semester;
        $obj->batch = $r->batch;
        if($r->has('image'))
            $obj->image = $imgProcess->imageUpload($r);
        $obj->save();

        return redirect()->to('/admin-student-register')->with('msg', 'Registration  Successful');
    }
    public function studentDelete($id)
    {
        $obj = Student::find($id);
        $obj->delete();
        return redirect()->to('/admin-student')->with('msg', 'Student account  successfully deleted');
    }
    public function studentDetails()
    {
        $student = Student::find($id);
        return view('pages.adminstudentDetails', compact('student'));
    }


    public function project()
    {
        $project = Project::all();
        return view('pages.adminprojectPanel', compact('project'));
    }

    public function session()
    {
        $session = Session::all();
        return view('pages.adminSessionPanel', compact('session'));
    }
    public function sessionRegister()
    {
        return view('pages.adminSessionRegister');
    }
    public function sessionRegisterSubmit(Request $r)
    {
        $validated = $r->validate([
            'name' => 'required|unique:App\Models\Session,name'
        ]);

        $obj = new Session();

        $obj->name = $r->name;

        $obj->save();

        return redirect()->to('/admin-session-register')->with('msg', 'Registration  Successful');
    }
    public function sessionDelete($id)
    {
        $obj = Session::find($id);
        $obj->delete();
        return redirect()->to('/admin-session')->with('msg', 'Session  successfully deleted');
    }
}
