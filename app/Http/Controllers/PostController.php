<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

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
    function post_store(Request $request){

        $thumbnail = $request->thumbnail;
        $extension = $thumbnail->extension();
        $thumbnail_name = uniqid().'.'.$extension;
        $manager = new ImageManager(new Driver());
        $image = $manager->read($thumbnail);
        $image->scale(width: 300);
        $image->save(public_path('uploads/posts/thumbnail/'.$thumbnail_name));


        $preview = $request->preview;
        $extension = $preview->extension();
        $preview_name = uniqid().'.'.$extension;
        $manager = new ImageManager(new Driver());
        $image = $manager->read($preview);
        $image->scale(width: 300);
        $image->save(public_path('uploads/posts/preview/'.$preview_name));

        Post::insert([
            'author_id'=> Auth::guard('author')->id(),
            'category_id'=>$request->category_id,
            'read_time'=>$request->read,
            'title'=>$request->title,
            'desp'=>$request->desp,
            'tags'=>implode(',', $request->tag_id),
            'thumbnail'=>$thumbnail_name, 
            'preview'=>$preview_name, 
            'created_at'=>Carbon::now(), 
        ]);
        return back();
    }
    function my_post(){
        $posts = Post::where('author_id', Auth::guard('author')->id())->get();
        return view('fontend.posts.my_post',[
           'posts'=> $posts, 
        ]);
    }
    function post_delete($post_id){
        $post = Post::find($post_id);

        $delete_from1 = public_path('uploads/posts/thumbnail/'.$post->thumbnail);
        unlink($delete_from1);

        $delete_from2 = public_path('uploads/posts/preview/'.$post->preview);
        unlink($delete_from2);

        Post::find($post_id)->delete();
        return back();
    }
}
