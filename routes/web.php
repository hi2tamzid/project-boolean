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
});
