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
      

        </style>
    </head>
    <body>
    
        <nav class="navbar navbar-light ">
            <a class="navbar-brand" href="#">
                Product Management
            </a>
        </nav>



        
            <div  class="container mainbody">

                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-success addbtn">New +</button>
                <!-- start the products lists  -->
                <div class="row">
               
                    <div class="col-md-4">
                        <div class="card" style="width: 18rem;">
                            <img class="card-img-top" src="">
                            <div class="card-body">
                                <h5 class="card-title">Product Title</h5>
                                <p class="card-text">Product Description</p>
                                <a href="#" class="btn btn-primary">200 $</a>
                            </div>
                        </div>
                    </div>
                
 
                </div>

     
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">

    <div class="modal-content">

        <div class="container">

            <div class="row">

                <div class="col-md-6 categorydiv">

                    <h4 class="create_cate">Create a category</h4>

                    <form action="{{url('addcategory')}}" method="post">

                            <div class="mb-3">
                                <label class="form-label">Category Name : </label>
                                <input name="categoryname" type="text" class="form-control">
                            </div>

                        <div class="mb-3">
                        <label class="form-label">Select the parent of this category (not neccessary) </label>

                            <select name="category_parent" id="">
                                <option value="1">samsung</option>
                                <option value="2">apple</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary">Add Category</button>

                    </form>

                </div>

                <div class="col-md-6">

                    <h4 class="create_cate">Create a product</h4>

                    <form action="" method="post">

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
                            <option value="1">samsung</option>
                            <option value="2">apple</option>
                        </select>

                        </div>

                        <button type="submit" class="btn btn-primary">Add Product</button>

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
