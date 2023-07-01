<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Actions\Auth\{LoginAction, RegisterAction, LogoutAction};
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\OrganizationController;
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
    return view('welcome2');
});


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('test', [UserController::class, 'test']);

// Route::group(function () {
Route::get('login', [AuthController::class, 'login'])->name('login');
Route::post('login', [AuthController::class, 'loginUser'])->name('loginUser');
// Route::post('register', AuthController::class)->name('register');
//     Route::post('forgot-password', ForgotPasswordAction::class)->name('forgot-password');
//     Route::post('reset-password', ResetPasswordAction::class)->name('reset-password');
//     Route::get('verify/reset-token', VerifyPasswordTokenAction::class);
//     Route::get('verify/invite-token', VerifyInviteTokenAction::class);
// });
Route::middleware('auth:sanctum')->prefix('user')->group(function () {
    Route::get('logout', LogoutAction::class)->name('logout');
});

Route::middleware('auth:sanctum')->group(function () {
    Route::Resource('job', JobController::class);
    Route::Resource('organization', OrganizationController::class);
});
