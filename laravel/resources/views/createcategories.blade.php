@extends('layouts.master')

@section('content')
<div class="col-md-6">


    <h4 class="create_cate">Create a product</h4>

    <!-- Begin Form that responsable of creating the products  -->

        <form action="{{url('addcategory')}}" method="post">
                {{ csrf_field() }}

                <div class="mb-3">
                    <label class="form-label">Category Name : </label>
                    <input name="categoryname" type="text" class="form-control">
                </div>

            <div class="mb-3">
                <label class="form-label">Select the parent of this category (not neccessary) </label>
                
                <select name="category_parent" id="">
                    <option value=""></option>

                    @foreach($categories as $categorie)

                        <option value="{{ $categorie->id }}">{{ $categorie->name }}</option>
                        
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Add Category</button>

        </form>

</div>
@stop