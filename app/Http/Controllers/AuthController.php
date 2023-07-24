<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{

    // public function index()
    // {
    //     return view('loginsea');
    // }

    public function authenticate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|min:6',
            'password' => 'required|min:8|max:12'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        // nanti index diganti route dashboard
        if (Auth::Attempt($data)) {
            return redirect('dashboard')->withInput();
        } else {
            Session::flash('error', 'Email or Password Wrong');
            return redirect('/login')->withInput();
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect('/login');
    }
}