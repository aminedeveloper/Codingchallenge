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

        <div class="container-fluid">
            <div class="row">
                <div class="col-md-2 sidebar">

                    <ul class="sidebarul">
                        <li class="sidebaritems"><a href="{{url('/')}}">Dashboard</a></li>
                        <li class="sidebaritems"><a href="{{url('createproductview')}}">Create Product ></a></li>
                        <li class="sidebaritems"><a href="">Create Categorie ></a></li>
                    </ul>

                </div>
                <div class="col-md-10">
                @yield('content')
                </div>
            </div>
        </div>

        
 
     
 

        <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('js/popper.min.js') }}"></script>
        <script src="{{ asset('js/bootstrap.min.js') }}"></script>
        
    </body>
</html>
