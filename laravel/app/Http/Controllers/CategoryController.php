<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categorie;
class CategoryController extends Controller
{
    // This function below responsable to get all the categories 
    public function allCategories(){
        $categories = Categorie::all();
        return View('home',['categories'=>$categories]);
    }

    // This function below responsable to create a  category

    public function createCategories(Request $request){
            $categorie = new Categorie(); 

            $categorie->name = $request->input('categoryname');
            $categorie->parentid  = $request->input('category_parent');

            $categorie->save();

            return View('/');
        
    }
    
    // This function below responsable to delete a category

    public function deleteCategory(){
        //
    }
}
  