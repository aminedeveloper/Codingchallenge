<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class ProductRepository extends BaseRepository
{
    public function storeProduct (
                    $productName,
                    $productDescription, 
                    $productPrice,
                    $productImage, 
                    $productParent
    ) {

        DB::table('products')->insert(
            ['name' => $productName,
             'description' => $productDescription,
             'price' => $productPrice,
             'image' => $productImage,
             'category' => $productParent
            ]
        );
    }

    public function deleteProduct($productId)
    {
        DB::table('products')->where('id', '=', $productId)->delete();
    }

    public function getProducts()
    {
        $products = DB::table('products')
            ->select('id',
                     'name',
                     'description',
                     'price',
                     'image',
                     'category'
                     )
            ->get();

        return($products);
    }
   
    public function productsPriceup()
    {
        $products = DB::table('products')
            ->select('id',
                     'name',
                     'description',
                     'price',
                     'image',
                     'category'
                     )
            ->orderBy('price', 'asc')         
            ->get();

        return($products);
    }

    public function productsPricedown()
    {
        $products = DB::table('products')
            ->select('id',
                     'name',
                     'description',
                     'price',
                     'image',
                     'category'
                     )
            ->orderBy('price', 'desc')         
            ->get();

        return($products);
    }

    public function productsName()
    {
        $products = DB::table('products')
            ->select('id',
                     'name',
                     'description',
                     'price',
                     'image',
                     'category'
                     )
            ->orderBy('name')        
            ->get();

        return($products);
    }
}
