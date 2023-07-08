<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('index-yatch-carter');
    }

    public function login()
    {
        return view('login-page');
    }
}
