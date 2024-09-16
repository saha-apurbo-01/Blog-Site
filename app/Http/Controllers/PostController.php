<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class PostController extends Controller
{
    function add_post(){
        $categories = Category::all();
        return view('fontend.posts.add_post', [
           'categories'=> $categories, 
        ]);
    }
}
