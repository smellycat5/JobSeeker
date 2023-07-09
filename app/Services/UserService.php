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

class UserService
{
    public function generateToken(): string
    {
        return Str::random(50);
    }

    public function sendVerifyEmail($user)
    {
        $token = $this->generateToken();
        $url = config('frontend.url') . '/register/' . $token . '?email=' . $user->email . '&name=' . urlencode($user->name);
        Mail::to($email)->send(new InviteCreated($url));
        return true;
    }
}
