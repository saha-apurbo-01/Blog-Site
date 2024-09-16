<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;

class FontendController extends Controller
{
    function welcome(){
        $categories = Category::all();
        $tags = Tag::all();
        return view('fontend.index', [
            'categories'=> $categories,
            'tags'=>$tags,
        ]);
    }
    function author_login_page(){
        return view('fontend.author.login');
    }
    function author_register_page(){
        return view('fontend.author.register');
    }
}
