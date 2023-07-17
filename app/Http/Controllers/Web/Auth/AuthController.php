<?php

namespace App\Http\Controllers\Web\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\UserStoreRequest;
use App\Models\User;
use App\Services\UserService;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function login()
    {
        return view('auth.login');
    }

    public function loginUser(LoginRequest $request)
    {
        $data = $request->validated();
        if (Auth::attempt($data)) {
            return redirect()->intended('/job');
        }
        return back()->withErrors([
            'email' => 'The credentials may be incorrect.',
        ]);
    }

    public function register()
    {
        return view('auth.register');
    }

    public function registerUser(UserStoreRequest $request)
    {
        $data = $request->validated();
        $user = User::create($data);
        $this->userService->sendVerifyEmail($user);
        return redirect('/register')->withErrors('Successfully registered'); // placeholder code, needs changes
    }

    public function logout()
    {
        auth()->guard('web')->logout();
        return redirect('/');
    }
}
