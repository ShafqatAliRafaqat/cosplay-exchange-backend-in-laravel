<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public function post(){
        return $this->belongsTo(Post::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}
