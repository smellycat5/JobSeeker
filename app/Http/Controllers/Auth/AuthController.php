<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function loginUser(LoginRequest $request)
    {
        dd("pp");
        $data = $request->validated();
        if (!Auth::attempt($data)) {
            return "failed";
        }
        $user = Auth::user();
        return "success";
    }
}
