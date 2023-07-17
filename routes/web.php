<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
// use App\Http\Controllers\Actions\Auth\{LoginAction, RegisterAction, LogoutAction};
use App\Http\Controllers\Web\Auth\AuthController;
use App\Http\Controllers\Web\{OrganizationController, JobController};
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    // redirect('home');
    return view('home');
});
Route::get('/home', function () {
    return redirect('/');
});


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('test', [UserController::class, 'test']);

Route::middleware('guest')->group(function () {
    Route::get('login', [AuthController::class, 'login'])->name('login');
    Route::post('login', [AuthController::class, 'loginUser'])->name('loginUser');
    Route::get('register', [AuthController::class, 'register'])->name('register');
    Route::post('register', [AuthController::class, 'registerUser'])->name('registerUser');
});

//     Route::post('forgot-password', ForgotPasswordAction::class)->name('forgot-password');
//     Route::post('reset-password', ResetPasswordAction::class)->name('reset-password');
//     Route::get('verify/reset-token', VerifyPasswordTokenAction::class);
//     Route::get('verify/invite-token', VerifyInviteTokenAction::class);
Route::get('logout', function () {
    return view('home');
});
Route::middleware('auth:sanctum')->group(function () {
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');
});

Route::middleware('auth:sanctum')->group(function () {
    Route::Resource('job', JobController::class);
    Route::Resource('organization', OrganizationController::class);
    
});
