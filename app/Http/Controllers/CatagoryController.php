<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class CatagoryController extends Controller
{
    function category(){
        $abc = category::all();
        return view('admin.category.category', compact('abc'));
    }
    function category_store(Request $request){
        $request->validate([
            'category_name'=> ['required'],
            'category_image'=> ['required', 'max:1024'],
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

    function category_edit($category_id){
        $category = Category::find($category_id);
        return view('admin.category.edit', compact('category'));
    }

    function category_delete($category_id){
        Category::find($category_id)->delete();
        return back()->with('delete', 'Category moved to trash successfully!');
    }

    function category_trash(){
        $category = Category::onlyTrashed()->get();
        return view('admin.category.trash', compact('category'));
    }

    function category_restore($category_id){
        Category::onlyTrashed()->find($category_id)->restore();
        return back()->with('restore', 'Category restored successfully!');
    }

    function category_parmanent_delete($category_id){
        $category = Category::onlyTrashed()->find($category_id);
        $delete_from = public_path('uploads/categories/'.$category->category_image);
        unlink($delete_from);
        Category::onlyTrashed()->find($category_id)->forceDelete();
        return back()->with('restore', 'Category deleted successfully!');
    }

    function category_update(Request $request,  $category_id){
        $category = Category::find($category_id);
        if($request->category_image != null){
            
            $request->validate([
                'category_name'=> ['required'],
                'category_image'=> ['required', 'mimes:png, jpg, PNG, JPG', 'max:1024'],
            ]);

            $delete_from = public_path('uploads/categories/'.$category->category_image);
            unlink($delete_from);
    
            $cat_img = $request->category_image;
            $extension = $cat_img->extension();
            $file_name = uniqid().'.'.$extension;
            $manager = new ImageManager(new Driver());
            $image = $manager->read($cat_img);
            $image->scale(width: 300);
            $image->save(public_path('uploads/categories/'.$file_name));
        
            Category::find($category_id)->update([
                'category_name'=> $request->category_name,
                'category_image'=> $file_name,
            ]);
            return redirect('/category')->with('success', 'Category updated successfully');
        }
       else{
        Category::find($category_id)->update([
            'category_name'=> $request->category_name,
        ]);
        return redirect('/category')->with('success', 'Category updated successfully');
       }
        
       
    }

    function category_check_delete(Request $request){
        foreach($request->category_id as $cat_id){
            Category::find($cat_id)->delete();
    }
    return back()->with('sel_del', 'Selected category moved to trash successfully!');
    
    }

    function category_restore_trash(Request $request){

        if($request->del_btn == 1){
        foreach($request->category_id as $cat_id){
            Category::onlyTrashed()->find($cat_id)->restore();
    }    
    return back()->with('sel_res', 'Selected category restored successfully!');
    
    }
    else{
    foreach($request->category_id as $cat_id){
        if($request->category_image != null){
        $category= Category::onlyTrashed()->find($cat_id);
        $delete_from = public_path('uploads/categories/'.$category->category_image);
        unlink($delete_from);
    }
    else{
        Category::onlyTrashed()->find($cat_id)->forceDelete();
    }
    }
    return back()->with('trash_del', 'Trashed categories deleted successfully!');
    }

    }

}