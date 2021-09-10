<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Pet;

class Owner extends Model
{
    use HasFactory;

    public function getPet() //bookAuthor
    {
        return $this->hasMany(Pet::class, 'owner_id', 'id');
        // return $this->belongsTo('App\Models\Author', 'author_id', 'id');
    }

    // Autoriuje
    // public function authorBooks()
    // {
    //     return $this->hasMany('App\Models\Book', 'author_id', 'id');
    // }
 

    // public function getPet2()
    // {
    //     // dd($this->belongsTo('App\Models\Pet', 'id', 'owner_id'));
    //     return $this->belongsTo('App\Models\Pet', 'id', 'owner_id') ?? '';
    // }

    // public function getDoctor()
    // {
    //     // dd($this->belongsTo('App\Models\Doctor', 'doctor_id', 'id'));
    //     return $this->belongsTo('App\Models\Doctor', 'doctor_id', 'id') ?? '';
    // }
}
