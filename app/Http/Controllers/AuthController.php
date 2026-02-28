<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use App\Services\AuthServices;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    protected $authServices;
    public function __construct(AuthServices $authServices)
    {
        $this->authServices = $authServices;
    }
    public function login(LoginRequest $request)
    {
        $result = $this->authServices->login($request->email, $request->password);
        return response()->json([
            'status' => true,
            'data' => $result,
            'message' => 'login berhasil'
        ], 201);
    }
    public function register(RegisterRequest $request)
    {
        $result =  $this->authServices->register(
            $request->name,
            $request->email,
            $request->role,
            $request->password
        );

        return response()->json([
            'status' => true,
            'data' => $result,
            'message' => 'berhasil membuat akun'
        ], 201);
    }
    public function refreshToken(Request $request)
    {
        $user = $request->user();
        $refreshToken = $request->bearerToken();
        $result = $this->authServices->refreshToken($refreshToken, $user);

        return response()->json([
            'status' => true,
            'data' => $result,
            'message' => 'token berhasil diperbarui'
        ], 201);
    }
}
