<?php

namespace App\services;

use Illuminate\Database\Eloquent\Model;
use App\Categorie;


class DeleteCategorie
{
    

    public function deleteCategorie($categorieId)
    {
        $category = Categorie::find($categorieId);
        $category->delete();
    }
}