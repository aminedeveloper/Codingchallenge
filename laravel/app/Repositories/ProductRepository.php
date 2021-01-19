<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use App\Product;
use App\Categorie;


class ProductRepository extends BaseRepository
{

    public function storeProduct($request)
    {
        // move product image to the folder mentioned
        if ($request->hasFile('image')) 
        {
            $file = $request->file('productimage');
            $input['productimage'] = time() .'.'.$file->getClientOriginalExtension();
            $destinationPath=public_path('/productsimages');
            $file->move($destinationPath , $input['productimage']);
        }
        else
        {
            $input['productimage']=$request->input('productimage');
        }
        
        $product = Product::create([
            'name'       =>$request->input('productname'),
            'description'=>$request->input('productdescription'),
            'price'      =>floatval($request->input('productprice')),
            'image'      =>$input['productimage'],
            'category'   =>$request->input('category_parent_product')
        ]);

        return $product;
    }

    public function deleteProduct($productId)
    {
        $product = Product::find($productId);
        $product->delete();
    }

    public function filterProduct($request)
    {
        $filterBy=$request->input('filterby');

        switch ($filterBy) 
        {

            case 'priceup':
                    $products = Product::select("*")
                    ->orderBy('price', 'asc')
                    ->get();

                return ($products);
            break;
            
            case 'pricedown':
                    $products = Product::select("*")
                    ->orderBy('price', 'desc')
                    ->get();

                 return ($products);
            break;

            case 'name':
                    $products = Product::select("*")
                    ->orderBy('name')
                    ->get();

                 return ($products);
            break;
        }
    }

    public function filterBycategorie($request)
    {
        
        $filterBy=$request->input('category_filter');
        $products = Product::select("*")
                            ->where('category',$filterBy)
                            ->get();

        return ($products);
    }
}
