<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FontendController extends Controller
{
    function welcome(){
        return view('fontend.index');
    }
    function author_login_page(){
        return view('fontend.author.login');
    }
    function author_register_page(){
        return view('fontend.author.register');
    }
}
