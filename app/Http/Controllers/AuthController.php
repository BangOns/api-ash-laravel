<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Services\AuthServices;
use Illuminate\Http\Request;

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
