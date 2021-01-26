<?php

namespace App\services;

use Illuminate\Database\Eloquent\Model;
use App\Repositories\ProductRepository;


class DeleteProducts
{
    protected $productrepository;

    public function __construct(ProductRepository $productrepository)
    {
        $this->productrepository = $productrepository;
    }
    
    public function deleteProduct($productId)
    {
        $this->productrepository->deleteProduct($productId);
    }
}