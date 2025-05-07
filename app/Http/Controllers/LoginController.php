<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Facades\JWTAuth;

class LoginController extends Controller
{
    //
    public function store(Request $req)
    {
        //
        $credentials = $req->validate([
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);
        if (! $token = Auth::attempt($credentials)) {
            return $this->sendError('Unauthorized');
        }

        return $this->sendResponse($token, 'You loged');
    }

    public function logout() {
        //
        JWTAuth::invalidate(JWTAuth::getToken());

        return $this->sendResponse([], 'Successfully logged out');
    }

}
