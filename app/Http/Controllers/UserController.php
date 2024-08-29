<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    function edit_user(){
        return view('admin.user.edit');
    }
}
