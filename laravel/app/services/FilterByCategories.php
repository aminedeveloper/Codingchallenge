<?php

namespace App\services;

use Illuminate\Database\Eloquent\Model;
use App\Product;


class FilterByCategories
{
    public function filterBycategorie($request)
    {
        $filterBy=$request->input('category_filter');
        $products = Product::select("*")
                            ->where('category',$filterBy)
                            ->get();

        return ($products);
    }
}