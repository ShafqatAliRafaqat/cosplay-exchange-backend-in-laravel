<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    protected $guarded=[];
    public function costumes(){
        return $this->hasMany(Costumes::class);
    }
}
