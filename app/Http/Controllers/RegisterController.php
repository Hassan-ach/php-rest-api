<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserAddress;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    //
    public function store(Request $req)
    {
        //
        $credentials = $req->validate([
            'firstname' => 'required|max:255',
            'lastname' => 'required|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|min:8',
            'gender' => 'required|in:male,female',
        ]);
        $user = User::create($credentials);

        $resp['user'] = $user;
        $resp['token'] = Auth::login($user);
        event(new Registered($user));

        return $this->sendResponse($resp, 'User registered successfully.');
    }

    public function addAddr(Request $req)
    {
        $creadentials = $req->validate([
            //
            'phone_number_1' => 'required',
            'country' => 'required',
            'city' => 'required',
            'postal_code' => 'required',
            'street' => 'required',
        ]);
        $creadentials['user_id'] = Auth::user()->id;

        $addr = UserAddress::create($creadentials);

        return $this->sendResponse($addr, 'Address added successfully.');
    }
}
