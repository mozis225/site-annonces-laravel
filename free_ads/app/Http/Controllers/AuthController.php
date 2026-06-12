<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
class AuthController extends Controller
{
    //Formulaire d'inscription
    public function showSignup(){
        if(Auth::check()){
            return redirect('/');
        }
        return view('auth.register');
    }

    //Formulaire de connexion
    public function showlogin(){
        if(Auth::check()){
            return redirect('/');
        }
        return view('auth.login');
    }


    // L'inscription
    public function signUp(Request $request){
        $request->validate([
            'login' => 'required|unique:users',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed',
            'phone_number' => 'required'
        ]);
        

        $user = User::create([
            'login' => $request->login,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone_number' => $request->phone_number,
        ]);
        Auth::login($user);
        return redirect('/');

    }
  

    //La connexion
    public function login(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string'
        ]);
        if(Auth::attempt($request->only('email', 'password'))){
            return redirect('/');
        }
        return back()->withErrors(['email' => 'Incorrect credentials']);
    }

    //Deconnexion
    public function logout(){
        Auth::logout();
        return redirect('/login');
    }

}

