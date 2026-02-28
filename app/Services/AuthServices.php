<?php

namespace App\Services;

use App\Exceptions\InvalidLoginException;
use App\Exceptions\InvalidRefreshToken;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException;

class AuthServices
{
    public function login($email, $password)
    {
        $validateData = User::where('email', $email)->first();
        if (!$validateData || !Hash::check($password, $validateData->password)) {
            throw new InvalidLoginException();
        }
        $token = $validateData->createToken('access_token', ["role:{$validateData->role}", 'access_api'], Carbon::now()->addMinutes(10))->plainTextToken;
        $refresh_token = $validateData->createToken('refresh_token', ["role:{$validateData->role}", 'issue_access_api'], Carbon::now()->addDays(1))->plainTextToken;
        return [
            'user' => $validateData,
            'token' => $token,
            'refresh_token' => $refresh_token
        ];
    }

    public function register($name, $email, $role, $password)
    {
        $validateData = User::create([
            'name' => $name,
            'email' => $email,
            'role' => $role,
            'password' => Hash::make($password)
        ]);

        return [
            'user' => $validateData,

        ];
    }

    public function refreshToken($refreshToken, $user)
    {
        $tokenId = strtok($refreshToken, '|');
        $valid = $user->tokens()
            ->where('id', $tokenId)
            ->where('name', 'refresh_token')
            ->exists();
        if (!$refreshToken || !$valid) {
            throw new InvalidRefreshToken();
        }

        $newAccessToken = $user->createToken('access_token', ['role' => $user->role, 'access_api'], Carbon::now()->addMinutes(10))->plainTextToken;
        return [
            'token' => $newAccessToken,
        ];
    }
}
