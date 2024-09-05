<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;


class CatagoryController extends Controller
{
    function category(){
        $abc = category::all();
        return view('admin.category.category', compact('abc'));
    }
    function category_store(Request $request){
        $request->validate([
            'category_name'=> ['required'],
            'category_image'=> ['required', 'mimes:png, jpg', 'max:1024'],
        ]);

        $cat_img = $request->category_image;
        $extension = $cat_img->extension();
        $file_name = uniqid().'.'.$extension;
        $manager = new ImageManager(new Driver());
        $image = $manager->read($cat_img);
        $image->scale(width: 300);
        $image->save(public_path('uploads/categories/'.$file_name));
        Category::insert([
            'category_name'=>$request->category_name,
            'category_image'=>$file_name,
            'created_at'=>Carbon::now(),
        ]);
        return back()->with('success', 'Category added successfully!');
        
    }
        
    function category_delete($user_id){
        $category= Category::find($user_id);
        if($category->category_image != null){
        $delete_from= public_path('uploads/categories/'.$category->category_image);
        unlink($delete_from);

        }
        Category::find($user_id)->delete();
        return back()->with('delete', 'User deleted successfully!');
    }

    function category_trash(){
        return view('admin.category.trash');
    }
    }

