<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Facades\JWTAuth;

class LoginController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        // set validation rules
        $validator = Validator::make($request->all(), [
            'email' => 'required',
            'password' => 'required|min:8'
        ]);

        // check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        // get credentials
        $credentials = $request->only('email', 'password');

        // if auth failed
        if (!$token = JWTAuth::attempt($credentials)) {
            return response()->json([
                'success' => false,
                'Message' => 'Email dan Password Anda Salah'
            ], 401);
        }

        // if auth success
        return response()->json([
            'success' => true,
            'user' => auth()->user(),
            'token' => $token
        ], 200);
    }
}
