<?php
    if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
    ini_set('display_errors', 'On');
    require 'functions/functions.php';
?>

<!DOCTYPE html>
<html lang="">
<head>
     <title> Home Page </title>

   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap-theme.min.css">
     <link href="css/style.css" rel="stylesheet" type="text/css">
     <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
   
</head>


<body>

<div class="container wrapper">

    <img src="images/banner.png" class="img-responsive" width="100%" height="250">

    <ul class="nav nav-tabs nav-justified menu">
        <li class="active"><a href="/ecommerce/"> Home <span class="glyphicon glyphicon-home"></span></a></li>
        <li><a href="products.php"> Products </a></li>

          <li class="social dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                    Categories <span class="caret"></span></a>
               
                <ul class="dropdown-menu" role="menu">
                    <li><a href="./products.php?electronic">Phone</a></li>
                    <li><a href="./products.php?laptops">Laptops</a></li>
                    <li><a href="./products.php?desktops">Desktops</a></li>
                    <li><a href="./products.php?cameras">Camera</a></li>
                    <li><a href="./products.php?accessories">Accessories</a></li>
                </ul>
            </li>

        <li><a href="account.php"> <i class="fa fa-users"></i> </span> Account </a></li>
        <li><a href="cart.php"> <span class="glyphicon glyphicon-shopping-cart"></span> Cart </a></li>
        <li><a href="about.php"> About Us </a></li>
        <li><a href="contact.php"> Contact Us </a></li>
        <li><a href="admin_area/"><span class="glyphicon glyphicon-user"> Administrator </a></li>
        
    </ul>

    <div class="jumbotron main">
        <div class="row">

            <header>
                <p class="text-center h1"> Your Ecommerce Solution </p>
            </header>

                <div id="carousel-example-generic" class="carousel slide" data-ride="carousel" data-interval="3500">

                      <!-- Indicators -->
                      <ol class="carousel-indicators">
                        <li data-target="#image" data-slide-to="0" class="active"></li>
                        <li data-target="#image" data-slide-to="1"></li>
                        <li data-target="#image" data-slide-to="2"></li>
                      </ol>
                     
                      <!-- Wrapper for slides -->
                      <div class="carousel-inner">
                        <div class="item active">
                          <img src="images/carousel1.png" alt="...">
                          <div class="carousel-caption">
                              <h3>    </h3>
                          </div>
                        </div>
                        <div class="item">
                          <img src="images/carousel1.png" alt="...">
                          <div class="carousel-caption">
                              <h3>   </h3>
                          </div>
                        </div>
                        <div class="item">
                          <img src="images/carousel1.png" alt="...">
                          <div class="carousel-caption">
                              <h3>  </h3>
                          </div>
                        </div>
                      </div>
                     
                      <!-- Controls -->
                      <a class="left carousel-control" href="#image" role="button" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left"></span>
                      </a>
                      <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right"></span>
                      </a>
                    </div> <!-- Carousel -->


            </div>
            

        </div>
    <!-- FOOTER STARTS -->
    <div class="row footer">

        <?php include "footer.php"; ?>

    </div>
    <!-- FOOTER ENDS -->

</div>



<script src="js/script.js"></script>
<script> 
            $('.carousel').carousel({
                   interval: 3000
             });

    
</script>


</body>
</html>



