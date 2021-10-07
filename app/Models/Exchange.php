<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Exchange extends Model
{
    public function costumes(){
        return $this->belongsTo(Costumes::class);
    }
    public function shipping(){
        return $this->hasOne(Shipping::class);
    }
}
