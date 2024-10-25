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
            $author = PassReset::create([
                'author_id'=> $author_info->id,
                'token'=> uniqid(),
            ]);
            Notification::send($author_info, new InvoicePaid($author));
        }
        else{
            return back()->with('exist', 'Email does not exist');
        }

    }
}
