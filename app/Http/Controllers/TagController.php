<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tag;
use Carbon\Carbon;

class TagController extends Controller
{
    function tag(){
        $tags = Tag::all();
        return view('admin.tag.tag', compact('tags'));
    }
    function tag_store(Request $request){
        Tag::insert([
            'tag_name'=> $request->tag_name,
            'created_at'=> Carbon::now(),
        ]);
        return back()->with('tag', 'Tag added successfully!');
    }
    function tag_delete($tag_id){
        Tag::find($tag_id)->delete();
        return back()->with('tag_del', 'Tag deleted successfully!');
    }
}
