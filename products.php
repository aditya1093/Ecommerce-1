<?php
    if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
    ini_set('display_errors', 'On');
    require 'functions/functions.php';
?>

<!DOCTYPE html>
<html lang="">
<head>
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap-theme.min.css">
    <link href="css/style.css" rel="stylesheet" type="text/css">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.no-icons.min.css" rel="stylesheet">
    <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">

    <title> Home Page </title>

</head>


<body>

<div class="container wrapper">

    <img src="images/banner.png" class="img-responsive" width="100%" height="250">

    <ul class="nav nav-tabs nav-justified menu">
        <li ><a href="/ecommerce/"> Home <span class="glyphicon glyphicon-home"></span></a></li>
        <li class="active"><a href="products.php"> Products </a></li>

          <li class="social dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                    Categories <span class="caret"></span></a>
               
                <ul class="dropdown-menu" role="menu">
                    <li><a href="./products.php?electronic">Phone</a></li>
                    <li><a href="./products.php?laptops">Laptops</a></li>
                    <li><a href="./products.php?desktops">Desktops</a></li>
                    <li><a href="./products.php?camera">Camera</a></li>
                    <li><a href="./products.php?accessories">Accessories</a></li>
                </ul>
            </li>

        <li><a href="account.php"><i class="fa fa-users"></i> Account </a></li>
        <li><a href="cart.php"> <span class="glyphicon glyphicon-shopping-cart"> </span> Cart </a></li>
        <li><a href="about.php"> About Us </a></li>
        <li><a href="contact.php"> Contact Us </a></li>
        <li><a href="admin_area/"> <span class="glyphicon glyphicon-user"></span> Administrator </a></li>
        
    </ul>

    <div class="jumbotron main">

        <div class="col-sm-3 col-md-3 pull-right" >
            <form class="navbar-form" role="search">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search" name="find" style="height: 30px; width: 180px;">
                    <div class="input-group-btn">
                        <button class="btn btn-default btn-md" type="submit" style="margin-top: 5px;"><i class="glyphicon glyphicon-search"></i></button>
                    </div>
                </div>
            </form>
        </div> 

        
        <div class="row" data-ng-app="" data-ng-controller="Products">

            <header>
                <p class="text-center h1">  </p>
            </header>


                <div data-ng-repeat="product in products" class="col-xs-4 product-box">
                    
                    <div class="col-xs-12"> 
                        <div class="product-image-item">
                            <div class="image">
                                <img data-ng-src='admin_area/functions/product_image/{{ product.image }}' class="img-responsive img-thumbnail product-image">
                                    
                                   <div class="price">
                                      <a class="btn btn-info">Price: {{ product.price | currency}} </a>
                                    </div>

                            </div>
                                
                                <a class="btn btn-sm btn-default" href="#">
                                    <span class="glyphicon glyphicon-shopping-cart"></span>Add to Cart
                                </a> &nbsp;&nbsp;
                                <a class="btn btn-sm btn-default" href="#">
                                    <span class="glyphicon glyphicon-eye-open detail"></span> View Details</a>
                        </div>
                    </div>

                </div>


            </div>
            

        </div>
    <!-- FOOTER STARTS -->
    <div class="row footer">

        <?php include "footer.php"; ?>

    </div>
    <!-- FOOTER ENDS -->

</div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.2.26/angular.min.js"></script>
    <script src="js/script.js"></script>
<script> 

        function Products($scope, $http) {
           
            $http.get("admin_area/functions/files/products.php").success(function(response){
                $scope.products = response;
            });

    }
    
</script>


</body>
</html>



