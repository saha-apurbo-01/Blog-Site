<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Foundation\Console\StorageUnlinkCommand;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use App\Models\Post;

use function Laravel\Prompts\password;

class UserController extends Controller
{
    function users(){
        $abc = user::all();
        return view('admin.user.users', compact('abc'));
    }
    function edit_user(){
        return view('admin.user.edit');
    }

    function update_user(Request $request){
        User::find(Auth::user()->id)->update([
            'name'=>$request->name,
            'email'=>$request->email,
        ]);
        return back()->with('success', 'Profile Info Updated Successfully!');
    }

    function update_password(Request $request){
        $request->validate([
            'current_password'=> 'required',
            'password'=> ['required', 'confirmed', Password::min(8)
            ->letters()
            ->mixedCase()
            ->numbers()
            ->symbols()],
            'password_confirmation'=> 'required',
        ]);
        if(Hash::check($request->current_password, Auth::user()->password)){
            user::find(Auth::user()->id)->update([
                'password'=> bcrypt($request->password),
            ]);
            return back()->with('pass_update', 'Password Updated Successfully!');
        }
        else{
            return back()->with('err', 'Current Password Issue');
        }
    }

    function update_photo(Request $request){
        $request->validate([
            'photo'=> ['required', 'mimes:png,jpg', 'max:1024'],
        ]);

        if(Auth::user()->photo != null){
            $delete_from = public_path('uploads/users/'.Auth::user()->photo);
            unlink($delete_from);
        }

        $photo = $request->photo;
        $extension = $photo->extension();
        $file_name = uniqid().'.'.$extension;
        $manager = new ImageManager(new Driver());
        $image = $manager->read($photo);
        $image->scale(width: 300);
        $image->save(public_path('uploads/users/'.$file_name));

        User::find(Auth::id())->update([
            'photo'=> $file_name,
        ]);

        return back()->with('picUp', 'Photo Updated Successfully!');
    
        
    }

    function delete($user_id){
        $users= User::find($user_id);
        if($users->photo != null){
        $delete_from= public_path('uploads/users/'.$users->photo);
        unlink($delete_from);

        }
        User::find($user_id)->delete();
        return back()->with('delete', 'User deleted successfully!');
    }

    function add_user(Request $request){
        User::insert([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>bcrypt($request->password),
            'created_at'=>Carbon::now(),
        ]);
        return back()->with('add', 'New user added successfully!');
    }
    function all_post(){
        $posts = Post::all();
        return view('admin.post.all_post',[
            'posts'=>$posts,
        ]);
    }
    function post_status($post_id){
        $posts = Post::find($post_id);

        if($posts->status == 1){
            Post::find($post_id)->update([
                'status'=>0,
            ]);
            return back();
        }
        else{
            Post::find($post_id)->update([
                'status'=>1,
            ]);
            return back();
        }
    }
}
