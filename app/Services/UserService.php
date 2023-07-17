<?php

namespace App\Services;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Mockery\Exception;
use App\Http\Resources\UserResource;
use App\Notifications\UserVerifyEmail;

class UserService
{
    
    public function sendVerifyEmail($user)
    {
        $token = Str::random(50);
        $user->notify(new UserVerifyEmail($token, $user->name));
        return true;
    }
}
