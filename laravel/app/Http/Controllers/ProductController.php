<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Product;
use App\Categorie;
use App\Http\Requests\CreateProductsRequest;
use App\services\CreateProducts;
use App\services\DeleteProducts;
use App\services\FilterProducts;
use App\services\FilterByCategories;
use App\services\GetProducts;
use App\services\GetCategories;

class ProductController extends Controller
{
    protected $createProducts;
    protected $deleteProducts;
    protected $filterProducts;
    protected $filterBycategories;
    protected $getProducts;
    protected $getCategories;
    

    public function __construct(
        CreateProducts $createProducts , 
        DeleteProducts $deleteProducts , 
        FilterProducts $filterProducts , 
        FilterByCategories $filterBycategories , 
        GetProducts $getProducts , 
        GetCategories $getCategories
    ) {

        $this->createProducts = $createProducts;
        $this->deleteProducts = $deleteProducts;
        $this->filterProducts = $filterProducts;
        $this->filterBycategories = $filterBycategories;
        $this->getProducts = $getProducts;
        $this->getCategories = $getCategories;
    }

    
    
    public function allData() // get all the product and categories for the creation
    {

        $categories = $this->getCategories->getCategories();
        $products = $this->getProducts->getProducts();

        return view('createproduct', compact('categories', 'products'));
    }

    
    public function getAllproducts() // get all the product and categories for the homepage
    {
        $categories = $this->getCategories->getCategories();
        $products = $this->getProducts->getProducts();

        return view('home', compact('categories', 'products'));
    }

 
    public function createProduct(CreateProductsRequest $request) // create a product
    {
        $this->createProducts->storeProduct($request);

        return redirect('/');
    }

    
    public function deleteProduct($productId) // delete a product
    {
        $this->deleteProducts->deleteProduct($productId);
        
        return redirect('/');
    }

    
    public function filterProduct(Request $request) // filtering the products by name or price
    {
            $products = $this->filterProducts->filterProduct($request);
            $categories = $this->getCategories->getCategories();

            return view('home', compact('categories', 'products'));   
    }

    // filtering the product by name or price 
    public function filterProductcategory(Request $request)
    {
        $products=$this->filterBycategories->filterBycategorie($request);
        $categories = Categorie::all();

        return view('home', compact('categories', 'products')); 
    }
}
 