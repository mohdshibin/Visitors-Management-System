<?php

namespace App\Http\Controllers;

use App\Interfaces\AdminInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    protected $adminInterface;
    function __construct(AdminInterface $interface)
    {
        $this->adminInterface = $interface;
    }

    function login()
    {
        return view(view: 'login');
    }

    function register()
    {
        return view(view: 'register');
    }

    function getAccessForm()
    {
        return view(view: 'accessform');
    }

    function loginPost(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::guard('webvisitor')->attempt($credentials)) {
            return redirect()->intended(route('getVisitorDashboard'));
        }
        if (Auth::guard('webadmin')->attempt($credentials)) {
            return redirect()->intended(route('getAdminDashboard'));
        } else {
            return back()->with('error', 'Invalid EmailId or Password');
        }
    }

    function registerPost(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);


        $data['email'] = $request->email;
        $data['password'] = Hash::make($request->password);

        $admin = $this->adminInterface->store($data);

        //$admin = AdminCredential::create($data);

        // if (!$admin) {
        //     return redirect()->route('register')->with('error', 'Some Problem');
        // }

        // return redirect()->route('login');
        if (!$admin) {
            return response()->json(['error' => 'Some Problem'], 500);
        }

        return response()->json(['message' => 'Registration successful'], 200);
    }

    function logout()
    {
        Session::flush();
        Auth::logout();
        return  redirect()->route('login');
    }
}