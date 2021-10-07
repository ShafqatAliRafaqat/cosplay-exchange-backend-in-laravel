<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Picture extends Model
{
    protected $guarded=[];
    public function costumes(){
        return $this->belongsTo(Costumes::class);
    }

}
