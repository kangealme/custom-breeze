<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    // public function index()
    // {
    //     return view('index');
    // }

    // public function register()
    // {
    //     return view('register');
    // }

    // public function home()
    // {
    //     return view('home');
    // }
    public function homeAdmin(Request $request)
    {
        //ambil data user
        return view('home.homeAdm');
    }

    public function home()
    {
        return view(('home.home'));
    }
}
