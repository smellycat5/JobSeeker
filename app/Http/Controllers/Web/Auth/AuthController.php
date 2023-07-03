<?php

namespace App\Http\Controllers\Web\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\UserStoreRequest;
use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
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
        User::create($data);
        return "success";
    }
}
