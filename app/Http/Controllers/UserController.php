<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function postLogin(Request $request)
    {
        $credential = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        $remember_me  = (!empty($request->remember_me)) ? TRUE : FALSE;

        if (Auth::attempt($credential)) {
            $user = User::where(["email" => $credential['email']])->first();

            Auth::login($user, $remember_me);
            return redirect('index');
        } else {
            return back();
        }
    }
    public function logout()
    {
        Auth::logout();
        return redirect('index');
    }
    public function postRegister(Request $request)
    {
        $request->validate([
            "name" => "required",
            "email" => "required|email|unique:users",
            "password" => "required|confirmed|min:10|regex:/[a-z]/|regex:/[A-Z]/|regex:/[0-9]/|regex:/[@$!%*#?&]/",
        ]);
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();
        $credential = [
            'email' => $request->email,
            'password' => $request->password,
        ];
        $user = User::where(["email" => $credential['email']])->first();

        Auth::login($user);
        return redirect('index');
    }
}
