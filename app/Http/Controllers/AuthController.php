<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use App\Models\User;

class AuthController extends Controller
{
    /**
     * User login.
     *
     * @return \Illuminate\Http\Response
     */
    public function login(AuthRequest $request)
    {
        $user = User::where('email', $request->email)->first();

        if ($user == null) {
            return response()->json(['error' => 'Unauthenticated.'], 401);
        }

        return $user;
    }

    /**
     * User signup.
     *
     * @return \Illuminate\Http\Response
     */
    public function signup(AuthRequest $request)
    {
        $user = new User($request->all());
        $user->save();

        return $user;
    }

}
