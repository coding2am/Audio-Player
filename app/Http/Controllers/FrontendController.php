<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Songs;

class FrontendController extends Controller
{
    public function home()
    {
        $songs = Songs::all();
        return view('frontend.home', compact('songs'));
    }
    public function user_login()
    {
        return view('frontend.login');
    }
    public function user_register()
    {
        return view('frontend.register');
    }
}
