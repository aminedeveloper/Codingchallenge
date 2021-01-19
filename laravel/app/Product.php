<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name','description','price','image','category'];

    public function categories()
    {

        return $this->belongsTo('App\Categorie');
    }
}
