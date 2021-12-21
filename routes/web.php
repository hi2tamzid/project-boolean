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
  Route::get('/admin-supervisor-edit/{id}', [AdminController::class, 'supervisorEdit']);
  Route::post('/admin-supervisor-update/{id}', [AdminController::class, 'supervisorUpdate']);
  Route::get('/admin-supervisor-register', [AdminController::class, 'supervisorRegister']);
  Route::post('/admin-supervisor-register', [AdminController::class, 'supervisorRegistrationSubmit']);
  Route::get('/admin-supervisor-delete/{id}', [AdminController::class, 'supervisorDelete']);
  Route::get('/admin-supervisor-details/{id}', [AdminController::class, 'supervisorDetails']);

  // Admin student
  Route::get('/admin-student', [AdminController::class, 'student']);
  Route::get('/admin-student-edit', [AdminController::class, 'studentEdit']);
  Route::post('/admin-student-update/{id}', [AdminController::class, 'studentUpdate']);
  Route::get('/admin-student-register', [AdminController::class, 'studentRegister']);
  Route::post('/admin-student-register', [AdminController::class, 'studentRegisterSubmit']);
  Route::get('/admin-student-delete/{id}', [AdminController::class, 'studentDelete']);
  Route::get('/admin-student-details/{id}', [AdminController::class, 'studentDetails']);

  // Admin project
  Route::get('/admin-project', [AdminController::class, 'project']);
  Route::get('/admin-project-edit', [AdminController::class, 'projectEdit']);
  Route::post('/admin-project-update/{id}', [AdminController::class, 'projectUpdate']);
  Route::get('/admin-project-register', [AdminController::class, 'projectRegister']);
  Route::post('/admin-project-register', [AdminController::class, 'projectRegisterSubmit']);
  Route::get('/admin-project-delete/{id}', [AdminController::class, 'projectDelete']);
  Route::get('/admin-project-details/{id}', [AdminController::class, 'projectDetails']);
  Route::get('/admin-project-mark/{id}', [AdminController::class, 'projectMark']);
  Route::post('/admin-project-mark', [AdminController::class, 'projectMarkSubmit']);
  Route::get('/admin-project-mark', [AdminController::class, 'projectMarkSave']);

  // Admin Session
  Route::get('/admin-session', [AdminController::class, 'session']);
  Route::get('/admin-session-edit', [AdminController::class, 'sessionEdit']);
  Route::post('/admin-session-update/{id}', [AdminController::class, 'sessionUpdate']);
  Route::get('/admin-session-register', [AdminController::class, 'sessionRegister']);
  Route::post('/admin-session-register', [AdminController::class, 'sessionRegisterSubmit']);
  Route::get('/admin-session-delete/{id}', [AdminController::class, 'sessionDelete']);

  // Admin Team
  Route::get('/admin-team', [AdminController::class, 'team']);
  Route::get('/admin-team-edit', [AdminController::class, 'teamEdit']);
  Route::post('/admin-team-update/{id}', [AdminController::class, 'teamUpdate']);
  Route::get('/admin-team-register', [AdminController::class, 'teamRegister']);
  Route::post('/admin-team-register', [AdminController::class, 'teamRegisterSubmit']);
  Route::post('/admin-team-register2', [AdminController::class, 'teamRegisterSubmit2']);
  Route::get('/admin-team-register2', [AdminController::class, 'teamRegister']);
  Route::get('/admin-team-delete/{id}', [AdminController::class, 'teamDelete']);
});
