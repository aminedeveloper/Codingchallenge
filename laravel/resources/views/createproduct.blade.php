@extends('layouts.master')

@section('content')
<div class="col-md-6">


<h4 class="create_cate">Create a product</h4>

<!-- Begin Form that responsable of creating the products  -->

<form action="{{url('addproduct')}}" method="post" enctype="multipart/form-data">

    {{ csrf_field() }}


    <div class="mb-3">

        <label class="form-label">Product Name : </label>

        <input type="text" name="productname" class="form-control">
        @if ($errors->has('productdescription'))
                            <div class="invalid-feedback">
                                <strong>{{ $errors->first('productname') }}</strong>
                            </div>
         @endif

    </div>


    <div class="mb-3">

        <label class="form-label">Product Description : </label>

        <textarea class="form-control" name="productdescription" id="" cols="5" rows="5"></textarea>
        <small>Min : 10 Characters</small>
    </div>

    <div class="mb-3">

        <label class="form-label">Product Price : </label>

        <input type="text" name="productprice" class="form-control"> 

    </div>

    <div class="mb-3">

        <label class="form-label">Product Image : </label>
        <input type="file" name="productimage" class="form-control">

    </div>

    <div class="mb-3">

        <label class="form-label">Select Ctagory of the product </label>

        <select name="category_parent_product" id="">

            <option value=""></option>

            @foreach($categories as $categorie)

            <option value="{{ $categorie->id }}">{{ $categorie->name }}</option>

            @endforeach

        </select>

    </div>

    <button value="addproduct" type="submit" class="btn btn-primary">Add Product</button>

</form>

</div>
@stop