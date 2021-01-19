<?php

namespace App\Console\Commands;

use App\Categorie;
use App\Product;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use App\Repositories\ProductRepository;
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

    protected $ProductRepository;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(ProductRepository $ProductRepository)
    {
        parent::__construct();
        $this->ProductRepository = $ProductRepository;

    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $request = new Request();
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
                $request['productname'] = $this->ask('Enter product name');
                $request['productdescription'] = $this->ask('Enter product description');
                $request['productprice'] = floatval($this->ask('Enter product price'));
                $request['productimage'] = $this->ask('Enter product image path');

                $this->table(
                    ['Id', 'Name'],
                    Categorie::all(['id', 'name'])->toArray()
                );

                $request['category_parent_product'] =$this->ask('Enter product category id');

                $this->ProductRepository->storeProduct($request);
            break;

            case '3' :
                $this->table(
                    ['id', 'Name','Description','Price','Image','Category'],
                    Product::all(['id', 'name','description','price','image','category'])->toArray()
                        
                );
                $productId = intval($this->ask('Enter product id want to delete'));
                $this->ProductRepository->deleteProduct($productId);
            break;
        }
    }
}
