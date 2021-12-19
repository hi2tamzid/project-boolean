<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::group(['middleware' => 'IsLoggedIn'], function () {
  Route::get('/', [HomeController::class, 'home']);
  Route::get('/register', [HomeController::class, 'register']);
});

// Admin
Route::get('/register-admin', [AdminController::class, 'registerAdmin']);
Route::post('/store-admin', [AdminController::class, 'storeAdmin']);
Route::get('/login-admin', [AdminController::class, 'login']);
Route::get('/logout-admin', [AdminController::class, 'logout']);
Route::post('/login-admin', [AdminController::class, 'loginAdmin']);
Route::group(['middleware' => 'IsAdminIn'], function () {
  Route::get('/admin-dashboard', [AdminController::class, 'dashboard']);
  Route::get('/control-panel', [AdminController::class, 'controlPanel']);

  // Admin supervisor
  Route::get('/admin-supervisor', [AdminController::class, 'supervisor']);
  Route::get('/admin-supervisor-register', [AdminController::class, 'supervisorRegister']);
  Route::post('/admin-supervisor-register', [AdminController::class, 'supervisorRegistrationSubmit']);
  Route::get('/admin-supervisor-delete/{id}', [AdminController::class, 'supervisorDelete']);
  Route::get('/admin-supervisor-details/{id}', [AdminController::class, 'supervisorDetails']);

  // Admin student
  Route::get('/admin-student', [AdminController::class, 'student']);
  Route::get('/admin-student-register', [AdminController::class, 'studentRegister']);
  Route::post('/admin-student-register', [AdminController::class, 'studentRegisterSubmit']);
  Route::get('/admin-student-delete/{id}', [AdminController::class, 'studentDelete']);
  Route::get('/admin-student-details/{id}', [AdminController::class, 'studentDetails']);

  // Admin project
  Route::get('/admin-project', [AdminController::class, 'project']);

  // Admin Session
  Route::get('/admin-session', [AdminController::class, 'session']);
  Route::get('/admin-session-register', [AdminController::class, 'sessionRegister']);
  Route::post('/admin-session-register', [AdminController::class, 'sessionRegisterSubmit']);
  Route::get('/admin-session-delete/{id}', [AdminController::class, 'sessionDelete']);

  // Admin Session
  Route::get('/admin-team', [AdminController::class, 'team']);
  Route::get('/admin-team-register', [AdminController::class, 'teamRegister']);
  Route::post('/admin-team-register', [AdminController::class, 'teamRegisterSubmit']);
  Route::post('/admin-team-register2', [AdminController::class, 'teamRegisterSubmit2']);
  Route::get('/admin-team-register2', [AdminController::class, 'teamRegister']);
  Route::get('/admin-team-delete/{id}', [AdminController::class, 'teamDelete']);
});
