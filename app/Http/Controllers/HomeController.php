<?php

namespace App\Http\Controllers;

use App\Models\Supervisor;
use Illuminate\Http\Request;

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
    

    
}
