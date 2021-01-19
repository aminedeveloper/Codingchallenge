<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    protected $fillable = ['name','parentid'];

    public function products(){
        return $this->hasMany('App\Product'); // set that the category has many products 
    }
}
