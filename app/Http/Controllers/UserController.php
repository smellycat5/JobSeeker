<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Notifications\UserVerifyEmail;
use Illuminate\Support\Facades\Auth;
use App\Services\UserService;

class UserController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }
    
    public function test()
    {
        $user = User::findorfail(1);
        // dd("$user");
        $this->userService->sendVerifyEmail($user);
        return "success";
    }
}
