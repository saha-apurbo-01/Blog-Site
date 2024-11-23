<?php

namespace App\Http\Controllers;
use App\Models\Author;
use App\Models\PassReset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use App\Notifications\InvoicePaid;

class PassResController extends Controller
{
    function pass_res_req(){
        return view('fontend.author.pass_res_req');
    }
    function pass_res_req_post(Request $request){
        $author_info = Author::where('email', $request->email)->first();
        if(Author::where('email', $request->email)->exists()){
           if(PassReset::where('author_id', $author_info->id)->exists()){
            PassReset::where('author_id', $author_info->id)->delete();   
           }
           $author = PassReset::create([
            'author_id'=> $author_info->id,
            'token'=> uniqid(),
        ]);
            Notification::send($author_info, new InvoicePaid($author));
            return back();
        }
        
        else{
            return back()->with('exist', 'Email does not exist');
        }

    }
    function pass_res_form($token){
        if(PassReset::where('token', $token)->exists()){
            return view('fontend.author.pass_reset_form', [
                'token'=>$token,
            ]);
            
        }
        else{
            return back();
        }
    }
    function pass_res_update(Request $request, $token){
        $author = PassReset::where('token', $token)->first();
        if(PassReset::where('token', $token)->exists()){
            Author::find($author->author_id)->update([
                'password'=>bcrypt($request->password),
            ]);
            PassReset::where('token', $token)->delete();
            return back();
        }
        else{
            return back();
        }
    }
}
 