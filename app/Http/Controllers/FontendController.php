<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FontendController extends Controller
{
    function welcome(){
        return view('welcome');
    }
}
