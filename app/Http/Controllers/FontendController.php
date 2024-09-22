<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class FontendController extends Controller
{
    function welcome(){
        $categories = Category::all();
        $tags = Tag::all();
        $posts = Post::where('status', 1)->paginate(2);
        $slider_post = Post::where('status', 1)->latest()->take(3)->get();
        return view('fontend.index', [
            'categories'=> $categories,
            'tags'=>$tags,
            'posts'=> $posts,
            'slider_post'=> $slider_post,
        ]);
    }
    function author_login_page(){
        return view('fontend.author.login');
    }
    function author_register_page(){
        return view('fontend.author.register');
    }
}
