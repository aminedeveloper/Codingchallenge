<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categorie;
use App\services\CreateCategorie;
use App\services\DeleteCategorie;
  
class CategoryController extends Controller
{
    protected $createCategorie;
    protected $deleteCategorie;

    public function __construct(CreateCategorie $createCategorie , DeleteCategorie $deleteCategorie)
    {
        $this->createCategorie = $createCategorie;
        $this->deleteCategorie = $deleteCategorie;
    }

    // get all the categories 

    public function allCategories()
    {
        $categories = Categorie::all();

        return View('createcategories',['categories'=>$categories]);
    }

    // create a  category

    public function createCategories(Request $request)
    {
        $this->createCategorie->storeCategorie($request);

        return redirect('/');
    }
    
    // delete a category 

    public function deletecategorie($categorieid)
    {
        $this->deleteCategorie->deleteCategorie($categorieid);
        
        return redirect('/');
    }
  
}
  