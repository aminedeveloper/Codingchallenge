<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model; 
use App\Categorie;

class CategorieRepository extends BaseRepository
{
    public function storeCategorie($request)
    {
        $categorie = Categorie::create([
            'name'       =>$request->input('categoryname'),
            'parentid'=>$request->input('category_parent')
        ]);

        return $categorie;
    }

    public function deleteCategorie($categorieId)
    {
        $category = Categorie::find($categorieId);
        $category->delete();
    }
}
