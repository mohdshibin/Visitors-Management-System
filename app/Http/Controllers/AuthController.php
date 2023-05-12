<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;

class AuthController extends Controller
{
    function login(){
        return view(view: 'login');
    }

    function register(){
        return view(view: 'register');
    }

    function getAdminDashboard(){
        return view(view: 'admindashboard');
    }

    function getAccessForm(){
        return view(view: 'accessform');
    }

    function loginPost(Request $request){
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('email','password');


        //return "<h1>sdsa</h1>".$credentials['password'];
        //todo - checking
        if(Auth::attempt($credentials)){
            return redirect()->intended(route('getAdminDashboard'));
        }
        else {
            return back()->with('error','Invalid EmailId or Password');
            //return redirect()->intended(route('getAccessForm'));
        }
        
        //return redirect(route(name : 'home'));

        //return redirect()->route('login')->with('error','Some Problem');
    }

    function registerPost(Request $request){
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $data['email'] = $request->email;
        $data['password'] = Hash::make($request->password);

        $user = User::create($data);

        if(!$user){
            return redirect()->route('register')->with('error','Some Problem');
        }

        return redirect()->route('login');
    }
}
