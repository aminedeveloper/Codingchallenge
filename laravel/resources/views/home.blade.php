@extends('layouts.master')

@section('content')
<div  class="container">
                    <div class="row">

                        <div class="col-md-4">

                            <h4>Filter The results By  : </h4>

                            <form action="{{url('products')}}" method="post">
                                {{ csrf_field() }}

                              <!-- filter by price from low to high -->
                                <div class="form-check form-check-inline">

                                    <input class="form-check-input" type="radio" name="filterby" id="exampleRadios1" value="priceup" checked>

                                    <label class="form-check-label" for="exampleRadios1">

                                        Price <i class="fas fa-angle-up"></i>
                                        
                                    </label>

                                </div>

                                <!-- filter by price from hight to low -->

                                <div class="form-check form-check-inline">

                                    <input class="form-check-input" type="radio" name="filterby" id="exampleRadios1" value="pricedown">

                                    <label class="form-check-label" for="exampleRadios1">

                                        Price <i class="fas fa-angle-down"></i>


                                    </label>

                                </div>      

                                <!-- filter by price by name -->

                                <div class="form-check form-check-inline">

                                    <input class="form-check-input" type="radio" name="filterby" id="exampleRadios1" value="name">

                                    <label class="form-check-label" for="exampleRadios1">
                                        Name
                                    </label>

                                </div>

                                
                                <div class="form-check form-check-inline">

                                <button type="submit" class="btn btn-info">Filter</button>

                                    
                                </div>

                            </form>


                        </div>
                        <div class="col-md-4 offset-3">

                            <h4>Filter The results By  Category </h4>

                            <!-- this form is responsable to filter all products by category -->
                            
                            <form action="{{url('productscategory')}}" method="post">

                                {{ csrf_field() }}
                                <select class="filterselect" name="category_filter" id="">

                                    <option value=""></option>

                                    @foreach($categories as $categorie)

                                        <option value="{{ $categorie->id }}">{{ $categorie->name }}</option>
                                        
                                    @endforeach
                                </select>
                        

                                <button type="submit" class="btn btn-info">Filter</button>

                            </form>

                        </div>
                        
                    </div>

                </div>


            <div  class="container mainbody">

                 
                <!-- start the products lists  -->
                <div class="row productsrow">
                @foreach($products as $product)

                    <!-- begin div that responsable of showing all products  -->

                    <div class="col-md-4">

                        <div class="card" style="width: 18rem;">

                            <!-- product image -->
                            <img class="card-img-top" src="<?php echo asset('productsimages/'.$product->image.''); ?>">

                            <div class="card-body">

                            <!-- product Title -->

                                <h5 class="card-title">{{ $product->name }}</h5>

                            <!-- product description -->

                                <p class="card-text">{{ $product->description }}</p>

                            <!-- product price -->

                            
                                <label class="btn btn-primary">
                                {{ $product->price }} $
                                </label>
                                
                                <!-- button that allow u to delete a product -->
                                    <form class="deleteclass"  action="{{url('deleteproduct/'.$product->id)}}" method="get">
                                        {{ csrf_field() }}
                                        {{method_field('DELETE')}}

                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                              
                               
                            </div>
                        </div>
                    </div>
                @endforeach
 
                </div>
 
     
 

 @stop