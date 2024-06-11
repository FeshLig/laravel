<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Hash;

class AuthController extends Controller
{
    function signin(){
        return view('auth.signin');
    }

    function registr(Request $request){
        $request->validate([
            'name'=>'required',
            'email'=>'required|unique:App\Models\User|email',
            'password'=>'required|min:6'
        ]);
        $response =[
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>$request->password,
        ];
        //return response()->json($response);

        $user = User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
        ]);
        $user->createToken('MyAppToken');
        return redirect()->route('login');
    }

    function login(){
        return view('auth.signup');
    }

    function signup(Request $request){
        $credentials = $request->validate([
        'email'=>'required',
        'password'=>'required|min:6'
    ]);
    if(Auth::attempt($credentials)){
        $request->session()->regenerate();
        return redirect()->intended('/articles');
    }
    return back()->withErrors()([
        'email'=>'The provided credentials do not match our records.',

    ])->onlyInput('email');

    }
    function logout(Request $request){
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return redirect('/');


    }
}
