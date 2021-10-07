<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function costumes(){
        return $this->hasMany(Costumes::class);
    }
}
