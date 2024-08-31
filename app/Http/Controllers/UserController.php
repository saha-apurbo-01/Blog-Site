<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;

use function Laravel\Prompts\password;

class UserController extends Controller
{
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
        $photo = $request->photo;
        $extension = $photo->extension();
        $file_name = uniqid().'.'.$extension;
        echo $file_name;
    
        
    }
}
