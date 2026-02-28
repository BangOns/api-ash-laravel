<?php

namespace App\Exceptions;

use Exception;

class InvalidRefreshToken extends Exception
{
    public function render($request)
    {
        return response()->json([
            'status' => false,
            'code' => 401,
            'message' => 'Refresh token tidak valid.'
        ], 401);
    }
}
