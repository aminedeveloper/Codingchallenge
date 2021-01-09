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
        return view('Home', compact('categories', 'products'));
         
    }


    // This function below responsable to create a product

    public function createProduct(Request $request){
        $product = new Product();

        $product->name = $request->input('productname');
        $product->description = $request->input('productdescription');
        $product->price = floatval($request->input('productprice'));
        $file = $request->file('productimage');

        $input['productimage'] = time() .'.'.$file->getClientOriginalExtension();

        $destinationpath=public_path('/productsimages');

        $file->move($destinationpath , $input['productimage']);
         
 
        
         

        $product->image=$input['productimage'];

        $product->category  = $request->input('category_parent_product');

        $product->save();

        return redirect('/');




    }

    // This function below responsable to delete a product 

    public function deleteProduct(Request $request , $productid){

            $product = Product::find($productid);

            $product->delete();

            return redirect('/');

    }


    // this function below responsable to filtering the products by name or price 

    public function filterProduct(Request $request){

        $filterby=$request->input('filterby');

        switch ($filterby) {
            case 'priceup':
                $products = Product::select("*")
                ->orderBy('price', 'asc')
                ->get();
                $categories = Categorie::all();

                return view('Home', compact('categories', 'products'));
                break;
            
            case 'pricedown':
                $products = Product::select("*")
                ->orderBy('price', 'desc')
                ->get();
                $categories = Categorie::all();

                return view('Home', compact('categories', 'products'));
                
                break;

            case 'name':
                $products = Product::select("*")
                ->orderBy('name')
                ->get();
                $categories = Categorie::all();

                return view('Home', compact('categories', 'products'));
                break;
        }
    }

    // this function below responsable to filtering the product by name or price 

    public function filterProductcategory(Request $request){
        
        $filterby=$request->input('category_filter');
        $categories = Categorie::all();

        $products = Product::select("*")
                            ->where('category',$filterby)
                            ->get();
        
        return view('Home', compact('categories', 'products'));


    }
}
 