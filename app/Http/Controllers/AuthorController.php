<?php

namespace App\Http\Controllers;

use App\Mail\AuthorMailVerify;
use Carbon\Carbon;
use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Mail;



class AuthorController extends Controller
{
    function author_register(Request $request){
        Author::insert([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>bcrypt($request->password),
            'created_at'=>Carbon::now(),
        ]);

        Mail::to($request->email)->send(new AuthorMailVerify());

        return back()->with('reg_success', 'Registration Success! We have sent you a verification mail');
    }
    function author_login(Request $request){
        if(Author::where('email', $request->email)->exists()){
            if(Auth::guard('author')->attempt(['email'=> $request->email, 'password'=> $request->password])){
                if(Auth::guard('author')->user()->status != 1){
                    Auth::guard('author')->logout();
                    return back()->with('pending', 'Your account is waiting for approval!');
                }
                else{
                    return redirect('/');
                }
            }
            else{
                return back()->with('correct', 'Login attempt incorrect!');
            }
        }
        else{
            return back()->with('exist', 'Email does not exist');
        }
    }
    function author_logout(){
        Auth::guard('author')->logout();
        return redirect('/');
    }
    function author_dashboard(){
        return view('fontend.author.author');
    }

    function authors(){
        $authors = Author::all();
        return view('fontend.author.authors', compact('authors'));
    }
    function authors_status($author_id){
        $author = Author::find($author_id);
        if($author->status == 1){
            Author::find($author_id)->update([
                'status'=> 0,
            ]);
            return back();
        }
        else{
            Author::find($author_id)->update([
                'status'=> 1,
            ]);
            return back(); 
        }
    }
    function authors_edit(){
        return view('fontend.author.edit');
    }
    function authors_update(Request $request){
        if($request->photo == ''){
            Author::find(Auth::guard('author')->id())->update([
                'name'=>$request->name,
                'email'=>$request->email,
            ]);
            return back();
        }
        else{

            if(Auth::guard('author')->user()->photo != null){
                $delete_from = public_path('uploads/author/' .Auth::guard('author')->user()->photo);
                unlink($delete_from);
            }

            $photo = $request->photo;
            $extension = $photo->extension();
            $file_name = uniqid().'.'.$extension;
            $manager = new ImageManager(new Driver());
            $image = $manager->read($photo);
            $image->scale(width: 300);
            $image->save(public_path('uploads/author/'.$file_name));
            Author::find(Auth::guard('author')->id())->update([
                'name'=>$request->name,
                'email'=>$request->email,
                'photo'=>$file_name,
            ]);
            return back();

        }
    }
    function authors_password_update(Request $request){
        $request->validate([
            'current_password'=> 'required',
            'password'=> ['required', 'confirmed'],
            'password_confirmation'=> 'required',
        ]);
        if(Hash::check($request->current_password, Auth::guard('author')->user()->password)){
            Author::find(Auth::guard('author')->user()->id)->update([
                'password'=> bcrypt($request->password),
            ]);
            return back()->with('pass_update', 'Password Updated Successfully!');
        }
        else{
            return back()->with('err', 'Current Password Issue');
        }
    }
}
