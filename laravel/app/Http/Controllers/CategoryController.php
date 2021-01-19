<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categorie;
use App\Repositories\CategorieRepository; 

class CategoryController extends Controller
{
    protected $CategorieRepository;

    public function __construct(CategorieRepository $CategorieRepository)
    {
        $this->CategorieRepository = $CategorieRepository;
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
        $this->CategorieRepository->storeCategorie($request);

        return redirect('/');
    }
    
    // delete a category 

    public function deletecategorie($categorieid)
    {
        $this->CategorieRepository->deleteCategorie($categorieid);
        
        return redirect('/');
    }
  
}
  