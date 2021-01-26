<?php

namespace App\services;

use App\Repositories\ProductRepository;


class GetProducts
{
    protected $productrepository;

    public function __construct(ProductRepository $productrepository)
    {
        $this->productrepository = $productrepository;
    }
    
    public function getProducts()
    {
        $products = $this->productrepository->getProducts();

        return($products);
    }
}