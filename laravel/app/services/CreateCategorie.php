<?php

namespace App\services;

use Illuminate\Database\Eloquent\Model;
use App\Categorie;

 
class CreateCategorie
{
    public function storeCategorie($request)
    {
        $categorie = Categorie::create([
            'name'       =>$request->input('categoryname'),
            'parentid'=>$request->input('category_parent')
        ]);

        return $categorie;
    }
}