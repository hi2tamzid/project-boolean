<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Validation\Rules\Password;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use App\Models\Admin;
use App\Models\Student;
use App\Models\Project;
use App\Models\Supervisor;
use App\Models\Session;
use App\Models\Team;
use App\Models\Project_Supervisor;
use App\Models\Team_Member;
use App\Models\Team_Project;
use App\Models\Project_Session;
use App\Models\Student_Mark;

class AdminController extends Controller
{
    public function supervisorLogin(Request $r)
    {
        $login_id = $r->login_id;
        $password = $r->password;

        $supervisor_user = Supervisor::where('login_id', '=', $login_id)
            ->where('password', '=', $password)
            ->first();

        if (!$supervisor_user) {
            return redirect()->back()->with('err_msg', 'Invalid login ID or password');
        } else {
            // Store user data into session
            $r->session()->put('supervisor_login_id', $supervisor_user->login_id);
            // dd("working");
            return redirect()->to('admin-dashboard');
        }
        return view('pages.homepage');
    }
    public function supervisorLoginpage()
    {
        return view('pages.supervisorLogin');
    }
    public function registerAdmin()
    {
        return view('pages.adminregister');
    }

    public function storeAdmin(Request $r)
    {
        $validated = $r->validate([
            'login_id' => 'required|unique:App\Models\Admin,login_id',
            'password' => ['required', Password::min(6)] // Require  at least 6 characters...

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
        if(session()->has('admin_login_id'))
        {
            $request->session()->forget('admin_login_id');
            return redirect()->to('/login-admin');
        }
        else if(session()->has('supervisor_login_id'))
        {
            $request->session()->forget('supervisor_login_id');
            return redirect()->to('/');
        }
    }

    // Supervisor Controller

    public function supervisor()
    {
        $supervisors = Supervisor::all();
        return view('pages.adminSupervisorPanel', compact('supervisors'));
    }
    public function supervisorEdit($id)
    {
        $s = Supervisor::find($id);
        return view('pages.adminSupervisorEdit', compact('s'));
    }
    public function supervisorUpdate(Request $r, $id) {
        
        $obj = Supervisor::find($id);
        $obj->login_id = $r->login_id;
        $obj->password = $r->password;
        $obj->name = $r->name;
        $obj->email = $r->email;
        $obj->gender = $r->gender;
        $obj->mobile = $r->mobile;
        if ($r->has('image'))
            $obj->image = $obj->imageUpload($r);
        $obj->save();
        return redirect()->back()->with('msg', 'Updated Successfully'); // only once
    }
    public function supervisorRegister()
    {
        return view('pages.adminSupervisorRegister');
    }
    public function supervisorRegistrationSubmit(Request $r)
    {
        $validated = $r->validate([
            'login_id' => 'required|unique:App\Models\Supervisor,login_id',
            'password' => ['required', Password::min(6)->letters()], // Require at least one letter and  at least 6 characters...
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
        if ($r->has('image'))
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
        $s = Supervisor::find($id);
        return view('pages.adminSupervisorDetails', compact('s'));
    }

    // Student Controllers

    public function student()
    {
        $student = Student::all();
        return view('pages.adminStudentPanel', compact('student'));
    }

    public function studentEdit($id)
    {
        $s = Student::find($id);
        return view('pages.adminStudentEdit', compact('s'));
    }
    public function studentUpdate(Request $r, $id) {
        
        $obj = Student::find($id);
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
        if ($r->has('image'))
            $obj->image = $imgProcess->imageUpload($r);
        $obj->save();
        return redirect()->back()->with('msg', 'Updated Successfully'); // only once
    }

    public function studentRegister()
    {
        return view('pages.adminStudentRegister');
    }
    public function studentRegisterSubmit(Request $r)
    {
        $validated = $r->validate([
            'student_id' => 'required|unique:App\Models\Student,student_id',
            'password' => ['required', Password::min(6)->letters()], // Require at least one letter and  at least 6 characters...
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
        if ($r->has('image'))
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
    public function studentDetails($id)
    {
        $s = Student::find($id);
        return view('pages.adminstudentDetails', compact('s'));
    }

    // Project Controller


    public function project()
    {
        $project = Project::all();

        

        return view('pages.adminProjectPanel', compact('project'));
    }
    public function projectEdit($id)
    {
        $p = Project::find($id);
        $supervisors  = Supervisor::all();
        $teams = Team::all();
        $sessions = Session::all();
        return view('pages.adminProjectEdit', compact('p', 'supervisors', 'teams', 'sessions'));
    }
    public function projectUpdate(Request $r, $id) {
        
        $obj = Project::find($id);

        $obj->name = $r->name;
        $obj->type = $r->type;
        $obj->description = $r->description;
        $obj->start_time = $r->start_time;
        $obj->end_time = $r->end_time;

        $obj->save();

        $project_last_id = $id;

        $obj = Project_Supervisor::find($r->project__supervisors);
        $obj->project_id = $project_last_id;
        $obj->supervisor_id = $r->supervisor_id;
        $obj->save();

        $obj =  Team_Project::find($r->team__projects);
        $obj->project_id = $project_last_id;
        $obj->team_id = $r->team_id;
        $obj->save();

        $obj = Project_Session::find($r->project__sessions);
        $obj->project_id = $project_last_id;
        $obj->session_id = $r->session_id;
        $obj->save();


        return redirect()->back()->with('msg', 'Updated Successfully'); // only once
    }
    public function projectRegister()
    {
        $supervisors  = Supervisor::all();
        $teams = Team::all();
        $sessions = Session::all();
        return view('pages.adminProjectRegister', compact('supervisors', 'teams', 'sessions'));
    }
    public function projectRegisterSubmit(Request $r)
    {
        $mytime = Carbon::now();
        $mytime = $mytime->toDateString();
        $validated = $r->validate([
            'name' => 'required',
            'type' => [
                'required',
                Rule::in(['Advanced Database design', 'Neural Network & Fuzzy Logic', 'Machine Learning', 'Pattern Recognition', 'Parallel & Distributed Computing', 'VLSI Design', 'Digital Signal Processing', 'Deep Learning'])
            ],
            'start_time' => 'required|date|after_or_equal:' . $mytime,
            'end_time' => 'after_or_equal:start_time',
            'supervisor_id' => 'required|exists:App\Models\Supervisor,id',
            'team_id' => 'required|exists:App\Models\Team,id',
            'session_id' => 'required|exists:App\Models\Session,id'
        ]);

        $obj = new Project();

        $obj->name = $r->name;
        $obj->type = $r->type;
        $obj->description = $r->description;
        $obj->start_time = $r->start_time;
        $obj->end_time = $r->end_time;

        $obj->save();

        $project_last_id = Project::latest()->first()->id;

        $obj = new Project_Supervisor();
        $obj->project_id = $project_last_id;
        $obj->supervisor_id = $r->supervisor_id;
        $obj->save();

        $obj = new Team_Project();
        $obj->project_id = $project_last_id;
        $obj->team_id = $r->team_id;
        $obj->save();

        $obj = new Project_Session();
        $obj->project_id = $project_last_id;
        $obj->session_id = $r->session_id;
        $obj->save();


        return redirect()->to('/admin-project-register')->with('msg', 'Registration  Successful');
    }

    public function projectDelete($id)
    {
        $obj = Project::find($id);
        $obj->delete();
        return redirect()->to('/admin-delete')->with('msg', 'Project  successfully deleted');
    }

    public function projectDetails($id)
    {
        $p = Project::find($id);
        return view('pages.adminProjectDetails', compact('p'));
    }
    public function projectMark($id)
    {
        $p = Project::find($id);

        return view('pages.adminProjectMarks', compact('p'));
    }
    public function projectMarkSubmit(Request $r)
    {
        

        $team__projects = DB::table('team__projects')->where('project_id', '=', $r->p_id)->first();
        $project__sessions = DB::table('project__sessions')->where('project_id', '=', $r->p_id)->first();
        $team = DB::table('teams')->where('id', '=', $team__projects->team_id)->first();
        $team__members = DB::table('team__members')->where('team_id', '=', $team->id)->get();
        $team__members_count = DB::table('team__members')->where('team_id', '=', $team->id)->count();

        for ($i = 1; $i <= $team__members_count; $i++) {
            $validated = $r->validate([
                'class_attendence'.$i => 'required|between:0,10',
                'class_performance'.$i => 'required|between:0,10',
                'report'.$i => 'required|between:0,20',
                'viva'.$i => 'required|between:0,10',
                'final_exam'.$i => 'required|between:0,50'
            ]);
            
            $obj = new Student_Mark();
            $obj->student_id = $r->{'s_id'.$i};
            $obj->session_id = $project__sessions->session_id;
            $obj->project_id = $r->p_id;
            $obj->team_id = $team__projects->team_id;
            $obj->class_attendence = $r->{'class_attendence'.$i};
            $obj->class_performance = $r->{'class_performance'.$i};
            $obj->report = $r->{'report'.$i};
            $obj->viva = $r->{'viva'.$i};
            $obj->final_exam = $r->{'final_exam'.$i};
            $obj->save();
        }
        return redirect()->to('/admin-project')->with('msg', 'Marks entry  Successful');

    }

    public function projectMarkSave()
    {
        $project = Project::all();

        return view('pages.adminProjectPanel', compact('project'));
    }

    // Session Controller

    public function session()
    {
        $session = Session::all();
        return view('pages.adminSessionPanel', compact('session'));
    }
    public function sessionEdit($id)
    {
        $s = Session::find($id);
        return view('pages.adminSessionEdit', compact('s'));
    }
    public function sessionUpdate(Request $r, $id) {
        
        $obj = Session::find($id);
        $obj->name = $r->name;

        $obj->save();
        return redirect()->back()->with('msg', 'Updated Successfully'); // only once
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

    // Team Controller

    public function team()
    {
        $team = Team::all();
        // dd($team[0]->id);
        // $team_member = Team_Member::where('team_id', '=', $team[0]->id)->get();
        // $team_member =  DB::table('team__members')->where('team_id', '=', $team[1]->id)->get();
        // dd($team_member[0]->student_id.$team_member[1]->student_id);
        // dd($team_member[1]->student_id);
        return view('pages.adminTeamPanel', compact('team'));
    }
    public function teamEdit($id)
    {
        $t = Team::find($id);
        return view('pages.adminTeamEdit', compact('t'));
    }
    public function teamUpdate(Request $r, $id) {
        
        $obj = Team::find($id);
        $obj->name = $r->name;
        $obj->member_number = $r->member_number;

        $obj->save();
        $curr_id = $id;
        $member_number = $obj->member_number;
        // dd($curr_id);
        $student = Student::all();
        return view('pages.adminTeamEdit', compact('member_number', 'curr_id', 'student'));
    }
    public function teamUpdate2(Request $r, $id) {
        $team__members = DB::table('team__members')->where('team_id', '=', $id)->get();
        foreach($team__members as $tm) {
            $obj = Team_Member::find($tm->id);
            $obj->team_id = $r->curr_id;
            $obj->student_id = $r->{'member' . $i};
            $obj->save();
        }
        return redirect()->back()->with('msg', 'Updated Successfully'); // only once
    }
    

    public function teamRegister()
    {

        return view('pages.adminTeamRegister');
    }
    public function teamRegisterSubmit(Request $r)
    {
        $validated = $r->validate([
            'name' => 'required',
            'member_number' => 'required|integer|between:1,3'
        ]);

        $obj = new Team();
        $obj->name = $r->name;
        $obj->member_number = $r->member_number;

        $obj->save();
        $curr_id = Team::latest()->first()->id;
        $member_number = $obj->member_number;
        // dd($curr_id);
        $student = Student::all();

        return view('pages.adminTeamRegister', compact('member_number', 'curr_id', 'student'));
    }
    public function teamRegisterSubmit2(Request $r)
    {
        for ($i = 1; $i <= $r->member_number; $i++) {
            $obj = new Team_Member();
            $obj->team_id = $r->curr_id;
            $obj->student_id = $r->{'member' . $i};
            $obj->save();
        }
        return redirect()->to('/admin-team-register2')->with('msg', 'Team  successfully created');
    }

    public function teamDelete($id)
    {
        $obj = Team::find($id);
        $obj->delete();
        return redirect()->to('/admin-team')->with('msg', 'Session  successfully deleted');
    }
}
