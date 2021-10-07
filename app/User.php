<?php

namespace App;

use App\Models\Answer;
use App\Models\Coin;
use App\Models\Comment;
use App\Models\Costumes;
use App\Models\Post;
use App\Models\Profile;
use App\Models\Question;
use App\Models\Role;
use App\Models\Wishlist;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Cache;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Cashier\Billable;


class User extends Authenticatable
{
    use Notifiable,Billable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email', 'password','ship_receiver_name',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function costumes(){
        return $this->hasMany(Costumes::class);
    }
    public function questions(){
        return $this->hasMany(Question::class);
    }
    public function answers(){
        return $this->hasMany(Answer::class);
    }
    public function role(){
        return $this->belongsTo(Role::class);
    }
    public function profile(){
        return $this->hasOne(Profile::class);
    }
    public function coin(){
        return $this->hasOne(Coin::class);
    }
    public function wishlist(){
        return $this->hasOne(Wishlist::class);
    }
    public function posts(){
        return $this->hasMany(Post::class);
    }
    public function comments(){
        return $this->hasMany(Comment::class);
    }
    public function isOnline(){
        return Cache::has('user-is-online-' . $this->id);
    }
}
