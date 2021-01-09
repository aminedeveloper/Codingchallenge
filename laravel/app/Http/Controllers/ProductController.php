<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Product;
use App\Categorie;
class ProductController extends Controller
{
    // This function below responsable to get all the categories 
    public function allData(){
        $categories = Categorie::all();
        $products = Product::all();
        return view('home', compact('categories', 'products'));
         
    }


    // This function below responsable to create a product

    public function createProduct(Request $request){
        $product = new Product();

        $product->name = $request->input('productname');
        $product->description = $request->input('productdescription');
        $product->price = floatval($request->input('productprice'));
        $file = $request->file('productimage')->getClientOriginalName();
         
 
        

        Storage::disk('local')->put($file, 'Contents');
         

        $product->image=$file;

        $product->category  = $request->input('category_parent_product');

        $product->save();

        return View('/');



    }

    // This function below responsable to delete a product 

    public function deleteProduct(){

    }
}
 