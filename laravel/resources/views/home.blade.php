<?php use Illuminate\Support\Facades\Storage; ?>
<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Software Engineer - Coding challenge</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link href="{{ asset('css/bootstrap.min.css')}}" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        <script src="{{ asset('js/jquery-3.5.1.min.js') }}"></script>
        <script src="{{ asset('js/app.js') }}"></script>
        <script src="{{ asset('css/all.js') }}"></script>
        <script src="{{ asset('css/all.css') }}"></script>
      

        </style>
    </head>
    <body>
    
        <nav class="navbar navbar-light ">
            <a class="navbar-brand" href="#">
                Product Management
            </a>
        </nav>



                <div  class="container">
                    <div class="row">

                        <div class="col-md-3">

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

                                <button type="submit" class="btn btn-info">Filter</button>
                            </form>


                        </div>
                        <div class="col-md-4">

                            <h4>Filter The results By  Category </h4>

                            <!-- this form is responsable to filter all products by category -->
                            
                            <form action="{{url('productscategory')}}" method="post">

                                {{ csrf_field() }}
                                <select name="category_filter" id="">

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

                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-success addbtn">New +</button>
                <!-- start the products lists  -->
                <div class="row">
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

     
<!-- Popup Div that allow u to choose what to create  -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">

        <div class="modal-content">

            <div class="container">

                <div class="row">

                    <div class="col-md-6 categorydiv">

                        <h4 class="create_cate">Create a category</h4>

                        <!-- Begin Form that responsable of creating the categories  -->

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

                    <div class="col-md-6">

                        <h4 class="create_cate">Create a product</h4>

                        <!-- Begin Form that responsable of creating the products  -->

                        <form action="{{url('addproduct')}}" method="post" enctype="multipart/form-data">

                            {{ csrf_field() }}


                            <div class="mb-3">

                                <label class="form-label">Product Name : </label>

                                <input type="text" name="productname" class="form-control">

                            </div>


                            <div class="mb-3">

                                <label class="form-label">Product Description : </label>

                                <textarea class="form-control" name="productdescription" id="" cols="5" rows="5"></textarea>

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

                </div>

            </div>


        
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                
            </div>

        </div>

    </div>

</div>
     
 

        <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('js/popper.min.js') }}"></script>
        <script src="{{ asset('js/bootstrap.min.js') }}"></script>
        
    </body>
</html>
