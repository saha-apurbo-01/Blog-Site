<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RoleController extends Controller
{
   function role_manager(){
        return view('admin.role.role_manager');
   }
}
