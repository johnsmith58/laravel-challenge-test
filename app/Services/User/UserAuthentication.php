<?php

namespace App\Services\User;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Exceptions\UserNotFoundException;
use Illuminate\Validation\UnauthorizedException;

class UserAuthentication
{
    public function login (string $email, string $password) : array
    {
        $user = User::where('email', $email)->first();
        if (!$user) {
            throw new UserNotFoundException('Model not found.');
        }

        if (!Auth::attempt(['email' => $email, 'password' => $password]))
        {
            throw new UnauthorizedException('Invalid credentials');
        }

        return [
            'user' => $user,
            'token' => $user->createToken('User-Token')->plainTextToken
        ];
    }
}