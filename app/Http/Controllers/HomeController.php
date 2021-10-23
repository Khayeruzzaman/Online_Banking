<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function contactus()
    {
        return view('home.contact');
    }

    public function aboutus()
    {
        return view('home.about');
    }

    public function news()
    {
        return view('home.news');
    }

    public function login()
    {
        return view('home.login');
    }
}
