<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Popular extends Model
{
    use HasFactory;


    function rel_to_post(){
        return $this->belongsTo(Post::class, 'post_id');
    }
}
