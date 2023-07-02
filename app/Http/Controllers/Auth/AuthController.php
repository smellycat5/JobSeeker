<?php

namespace App\Http\Controllers\Auth;

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
        if (!Auth::attempt($data)) {
            return "failed";
        }
        $user = Auth::user();
        return "success";
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
