<?php

namespace App\Console\Commands;

use App\Categorie;
use App\Product;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

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

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
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

        $optionnumber = $this->ask('Please Choose an option ?');
        
        switch ($optionnumber) {   
            case '1':

                // Get Lists Of Products

                $this->table(
                    ['id', 'Name','Description','Price','Image','Category'],
                    Product::all(['id', 'name','description','price','image','category'])->toArray()
                        
                );
            break;
            
            case '2':
                // Add a product
                $productname = $this->ask('Enter product name');
                $productdescription = $this->ask('Enter product description');
                $productprice = $this->ask('Enter product price');
                $productnameimage = $this->ask('Enter product image path');

                $this->table(
                    ['Id', 'Name'],
                    Categorie::all(['id', 'name'])->toArray()
                );

                $productcategoryid=$this->ask('Enter product category id');

                $productprice2 = floatval($productprice); // Cast The Answer As an Integer

                $product = new Product();
                $product->name = $productname;
                $product->description = $productdescription;
                $product->price = $productprice2;
                $product->image=$productnameimage;
                $product->category  =$productcategoryid;
                $product->save();
                
            break;

            case '3' :
                $this->table(
                    ['id', 'Name','Description','Price','Image','Category'],
                    Product::all(['id', 'name','description','price','image','category'])->toArray()
                        
                );

                $productid = $this->ask('Enter product id want to delete');
                $productid2 = intval($productid); // Cast The Answer As an Integer

                $product = Product::find($productid2);
                $product->delete();




            break;
        }


    }
}
