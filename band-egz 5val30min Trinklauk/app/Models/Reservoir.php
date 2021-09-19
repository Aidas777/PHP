<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservoir extends Model
{
    use HasFactory;

    public function getMember()
    {
        // return $this->belongsTo('App\Models\Member', 'id','reservoir_id' );
        return $this->hasMany('App\Models\Member', 'reservoir_id', 'id' );
    }
 
}
