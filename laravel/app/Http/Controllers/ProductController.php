<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Product;
use App\Categorie;
use App\Http\Requests\CreateProductsRequest;
use App\Repositories\ProductRepository;

class ProductController extends Controller
{
    protected $ProductRepository;

    public function __construct(ProductRepository $ProductRepository)
    {
        $this->ProductRepository = $ProductRepository;
    }

    // get all the product and categories for the creation

    public function allData()
    {
        $categories = Categorie::all();
        $products = Product::all();

        return view('createproduct', compact('categories', 'products'));
    }

    // get all the product and categories for the homepage

    public function getAllproducts()
    {
        $categories = Categorie::all();
        $products = Product::all();

        return view('home', compact('categories', 'products'));
    }


    // create a product

    public function createProduct(CreateProductsRequest $request)
    {
        $this->ProductRepository->storeProduct($request);

        return redirect('/');
    }

    // delete a product 

    public function deleteProduct($productId)
    {
        $this->ProductRepository->deleteProduct($productId);
        
        return redirect('/');
    }


    // filtering the products by name or price 

    public function filterProduct(Request $request)
    {
        $products = $this->ProductRepository->filterProduct($request);
        $categories = Categorie::all();

        return view('home', compact('categories', 'products'));   
    }

    // filtering the product by name or price 

    public function filterProductcategory(Request $request)
    {
        $products=$this->ProductRepository->filterBycategorie($request);
        $categories = Categorie::all();

        return view('home', compact('categories', 'products')); 
    }
}
 