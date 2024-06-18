<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;

class LogoutController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        // remove JWT token
        $removeToken = JWTAuth::invalidate(JWTAuth::getToken());

        // return response JSON logout success
        if ($removeToken) {
            return response()->json([
                'success' => true,
                'message' => 'Logout Berhasil'
            ]);
        };
    }
}
