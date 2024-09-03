<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CatagoryController extends Controller
{
    function category(){
        return view('admin.category.category');
    }
}
