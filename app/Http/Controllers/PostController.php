<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Tag;

class PostController extends Controller
{
    function add_post(){
        $categories = Category::all();
        $tags = Tag::all();
        return view('fontend.posts.add_post', [
           'categories'=> $categories, 
           'tags'=> $tags,
        ]);
    }
}
