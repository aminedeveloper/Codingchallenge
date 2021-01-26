<?php

namespace App\Console\Commands;

use App\Categorie;
use App\Product;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use App\services\CreateProducts;
use App\services\DeleteProducts;
use App\services\FilterProducts;
use App\services\FilterByCategories;
use Illuminate\Http\Request;

class products extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'products';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This Command is responsable to manipulating products';

    protected $createProducts;
    protected $deleteProducts;
    protected $filterProducts;
    protected $filterBycategories;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(CreateProducts $createProducts , DeleteProducts $deleteProducts , FilterProducts $filterProducts , FilterByCategories $filterBycategories)
    {
        parent::__construct();
        $this->createProducts = $createProducts;
        $this->deleteProducts = $deleteProducts;
        $this->filterProducts = $filterProducts;
        $this->filterBycategories = $filterBycategories;

    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    { 
        $row = ['1', 'Show lists of all products'];
        $row2 = ['2','Add a product'];
        $row3 = ['3','Delete a product'];
        $this->table(
            ['Number', 'Option'],
            [$row,$row2,$row3]
        );
        $optionNumber = $this->ask('Please Choose an option ?'); 
        switch ($optionNumber) {   
            case '1':
                // Get Lists Of Products
                $this->table(
                    ['id', 'Name','Description','Price','Image','Category'],
                    Product::all(['id', 'name','description','price','image','category'])->toArray()
                        
                );
            break;
            
            case '2':
                // Add a product
                $productName = $this->ask('Enter product name');
                $productDescription = $this->ask('Enter product description');
                $productPrice = floatval($this->ask('Enter product price'));
                $productImage = $this->ask('Enter product image');
                
                $this->table(
                    ['Id', 'Name'],
                    Categorie::all(['id', 'name'])->toArray()
                );
                $productParent = $this->ask('Enter product category id');
                $request = array("productname"=>$productName, "productdescription"=>$productDescription, "productprice"=>$productPrice, "productimage"=>$productImage, "category_parent_product"=>$productParent);

                $this->createProducts->storeProduct($request);
            break;

            case '3' :
                $this->table(
                    ['id', 'Name','Description','Price','Image','Category'],
                    Product::all(['id', 'name','description','price','image','category'])->toArray()
                        
                );
                $productId = intval($this->ask('Enter product id want to delete'));
                $this->deleteProducts->deleteProduct($productId);
            break;
        }
    }
} 
