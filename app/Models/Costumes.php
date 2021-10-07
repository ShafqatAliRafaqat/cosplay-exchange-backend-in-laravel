<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Costumes extends Model
{
    protected $guarded=[];
    public function pictures(){
        return $this->hasMany(Picture::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function categories(){
        return $this->belongsToMany(Category::class);
    }
    public function questions(){
        return $this->hasMany(Question::class);
    }
    public function wishlist(){
        return $this->belongsTo(Wishlist::class);
    }
    public function exchanges(){
        return $this->hasMany(Exchange::class);
    }
    public function status(){
        return $this->belongsTo(Status::class);
    }
}
