<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Document</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" integrity="sha512-F5QTlBqZlvuBEs9LQPqc1iZv2UMxcVXezbHzomzS6Df4MZMClge/8+gXrKw2fl5ysdk4rWjR0vKS7NNkfymaBQ==" crossorigin="anonymous"></script>
    <style>
        body{
            background-color: rgb(46, 45, 45);
            color: white;
            font-size: 19px;
            font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
        }
        h4{border-bottom: 1px solid white;padding: 15px;}
        .webappimg{max-width: 100%;height: 380px;}
        .row{
            padding-top: 39px;
        }
        .explaination{
            padding-top: 28px;
        }
        .h5{
            border-bottom: 1px solid white;
            padding: 15px;  
        }
        .col-md-6{
            padding-bottom: 20px;
        }</style>
</head>
<body>
    <div class="container">
        <center><h4>Coding Challenge Software Engineer application by Mohammed Amine Yassine</h4>
        </center>
        <div class="row">
            <div class="col-md-6">
                <p class="lead">
                    I represent to you a simple Web Application service responsible of manipulating Products and Categories
                </p> 
                <span>
                    This Application is allow you to : 
                </span>
                <ul>
                    <li>create and delete a category from the command line</li>
                    <li>create and delete a product from the command line</li>
                    <li>create and delete a product from the web app </li>
                    <li>create a category from the web app </li>
                    <li> Filter Product : sort by name, by price or filter by a category </li>
                </ul>
            </div>
            <div class="col-md-6">
                <img class="webappimg" src="webapp.png" alt="">
            </div>
       </div><div class="explaination">
         <p class="h5"><i class="fas fa-circle"></i> The web application : </p> <p class="lead">I create a simple laravel web application to creation Product and delete them also , filtering them by price or name or category</p><p class="h5"> <i class="fas fa-circle"></i> Follow this steps so u can use the application : </p> <p >first before all you need to run the command 'php artisan migrate' to setup and database in your server , after that , you need to run the command 'php artisan serve' and click on the link  : </p><div class="row">
                <div class="col-md-6">
                    <img class="webappimg" src="webapp.png" alt="">
                </div>
                <div class="col-md-6">
                    <h5>This is the homepage : </h5>
                    <p class="lead">Here you can browse all the product and filter them either by name , price or category</p>
                </div> <div class="col-md-6">
                    <h5>
                        Clicking on <button class="btn btn-primary">new +</button>  Button  : 
                    </h5>
                    <p class="lead">Here you can Create , Delete both Product and Categories</p>
                </div>
                <div class="col-md-6">
                    <img class="webappimg" src="addproduct.png" alt="">
                </div> </div></div><div class="explaination"><p class="h5"><i class="fas fa-circle"></i> The web application : </p><p class="lead">I create a simple laravel console application to creation and delete both products and categories </p><p class="h5"><i class="fas fa-circle"></i> Follow this steps so u can use the application : </p><p > If you want to manage the categories , you need to run the command <h3>php artisan categories</h3> to display the categories menu  </p> <p > If you want to manage the products , you need to run the command <h3>php artisan products</h3> to display the products menu  </p> </div> <center><h6>Any Questions ? , please do not hesitate to Contact us in : aminemohammedyassine@gmail.com
        </h6></center>
    </div>
</body></html>