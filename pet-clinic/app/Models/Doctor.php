<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;

    public function getPet()
    {
        // dd($this->belongsTo('App\Models\Pet', 'id', 'owner_id'));
        return $this->hasMany('App\Models\Pet', 'doctor_id', 'id');
        // return $this->belongsTo('App\Models\Pet', 'id', 'doctor_id');
        // return $this->belongsTo('App\Models\Pet', 'doctor_id', 'id');
    }

    // Autoriuje
    // public function authorBooks()
    // {
    //     return $this->hasMany('App\Models\Book', 'author_id', 'id');
    // }
 

    // public function getDoctor()
    // {
    //     return $this->belongsTo('App\Models\Doctor', 'doctor_id', 'id') ?? '';
    // }
}
