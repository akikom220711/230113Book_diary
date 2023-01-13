<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function goToRegist(){
        return view('regist');
    }

    public function regist(RegisterRequest $request){
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        $email = $request->email;
        $password = $request->password;
        if (Auth::attempt(['email' => $email, 'password' => $password])){
            return redirect('/thanks');
        }else{
            return redirect('/userlogin');
        }
    }

    public function thanks(){
        return view('thanks');
    }

    public function goToLogin(){
        return view('user_login');
    }

    public function login(LoginRequest $request){
        $email = $request->email;
        $password = $request->password;
        if (Auth::attempt(['email' => $email, 'password' => $password])){
            return redirect('/');
        }else{
            return redirect('/userlogin');
        }
    }

    public function userLogout(){
        Auth::logout();
        return redirect('/');
    }
}
