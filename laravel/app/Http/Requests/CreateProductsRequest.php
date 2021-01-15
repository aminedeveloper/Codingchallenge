<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateProductsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return 
        [
            'productname'=>'required|min:5',
            'productdescription'=>'required|min:10|max:222',
            'productprice'=>'required|numeric',
            'productimage'=>'required',
            'category_parent_product'=>'required'
        ];
    }

    public function messages()
    {
        return
        [
                'productname.required'=>'You need to set the name of the product',
                'productdescription.required'=>'You need to set the description of the product',
                'productprice.required'=>'You need to set the price of the product',
                'productprice.numeric'=>'The price must be a number',
                'productimage.required'=>'The product image in important',
                'category_parent_product'=>'You need to choose a category to assign it with the product'
        ];
    }
}
