<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Categorie;
class ProductController extends Controller
{
    // This function below responsable to get all the categories 
    public function allCategories(){
        $categories = Categorie::all();
        return View('home',['categories'=>$categories]);
    }

    // This function below responsable to create a product

    public function createProduct(){
        //
    }
}
 