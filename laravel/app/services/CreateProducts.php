<?php

namespace App\services;

use App\Repositories\ProductRepository;


class CreateProducts
{
    protected $productrepository;

    public function __construct(ProductRepository $productrepository)
    {
        $this->productrepository = $productrepository;
    }

    public function storeProduct($request)
    {
         
        if (!is_array($request)) {
            $file = $request->file('productimage');
            $input['productimage'] = time() .'.'.$file->getClientOriginalExtension();
            $destinationPath = public_path('/productsimages');
            $file->move($destinationPath , $input['productimage']);
            $productImage = $input['productimage'];
            $productName = $request['productname'];
            $productDescription = $request['productdescription'];
            $productPrice = $request['productprice'];
            $productParent = $request['category_parent_product'];
        } else {
            $productImage = $request['productimage'];
            $productName = $request['productname'];
            $productDescription = $request['productdescription'];
            $productPrice = $request['productprice'];
            $productParent = $request['category_parent_product'];
        }

         

        $this->productrepository->storeProduct(
                               $productName, 
                               $productDescription, 
                               $productPrice, 
                               $productImage, 
                               $productParent
        );
        
    }
}