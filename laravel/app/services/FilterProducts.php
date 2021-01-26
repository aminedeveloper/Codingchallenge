<?php

namespace App\services;

use Illuminate\Database\Eloquent\Model;
use App\Product;
use App\Repositories\ProductRepository;



class FilterProducts
{
    protected $productrepository;

    public function __construct(ProductRepository $productrepository)
    {
        $this->productrepository = $productrepository;
    }

    public function filterProduct($request)
    {
        $filterBy = $request->input('filterby');

        switch ($filterBy) {

            case 'priceup':
                $products = $this->productrepository->productsPriceup();

                return ($products);
            break;
            
            case 'pricedown':
                $products = $this->productrepository->productsPricedown();

                 return ($products);
            break;

            case 'name':
                $products = $this->productrepository->productsName();
                    
                 return ($products);
            break;
        }
    }
}