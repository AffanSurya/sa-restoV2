<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        // set validation rules
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|confirmed'
        ]);

        // check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $name = $request->input('name');
        $role = Str::endsWith($name, 'admin') ? 'admin' : 'user';
        $name = Str::replaceLast('admin', '', $name);

        // create user
        $user = User::create([
            'name' => $name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => $role
        ]);

        // return response JSON insert success
        if ($user) {
            return response()->json([
                'success' => true,
                'user' => $user
            ], 201);
        }

        // return response JSON insert failed
        return response()->json([
            'success' => false
        ], 409);
    }
}
