<!DOCTYPE html>
<html lang="en">

<head>
     <title> Ecommerce </title>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Ecommerce Site">
    <meta name="author" content="Amadou Barry">

    <script src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.11.1.min.js"> </script>
    <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.3.8/angular.min.js"> </script>
    <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.3.8/angular-route.min.js"> </script>
    <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.3.8/angular-cookies.js"> </script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"> </script>
    <script src="/ecommerce/script/bootstrap-filestyle.min.js"> </script>
    <link href="/ecommerce/css/style.css" rel="stylesheet" type="text/css">

</head>

<body data-ng-app="myApp">

<div class="container-fluid" ng-cloak="">

    <div class="container wrapper">

        <img src="images/banner.png" class="img-responsive" width="100%" height="250">

        <!-- Start Menubar -->
        <ul class="nav nav-tabs nav-justified menu">
          <li id="home-menu"><a ng-href="/ecommerce/#/"> Home <span class="glyphicon glyphicon-home"></span></a></li>
          <li id="products-menu"><a ng-href="#/products/{{'all'}}"> Products </a></li>

            <li id="social dropdown categories-menu">
                  <a ng-href="#/products/{{'all'}}" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"> Categories <span class="caret"></span></a>      
                  <ul class="dropdown-menu" role="menu">
                      <li><a ng-href="/ecommerce/#/products/{{'mobile'}}">       Mobile        </a></li>
                      <li><a ng-href="/ecommerce/#/products/{{'laptops'}}">     Laptops      </a></li>
                        <li><a ng-href="/ecommerce/#/products/{{'accessories'}}"> Tablet  </a></li>
                      <li><a ng-href="/ecommerce/#/products/{{'desktop'}}">     Desktops     </a></li>
                      <li><a ng-href="/ecommerce/#/products/{{'camera'}}">      Camera       </a></li>
                      <li><a ng-href="/ecommerce/#/products/{{'accessories'}}"> Accessories  </a></li>
                  </ul>
              </li>

            <li id="account-menu"><a ng-href="/ecommerce/#/account"><span> <i class="fa fa-users"></i> </span> Account </a></li>
            <li id="cart-menu"><a ng-href="#/cart"> <span class="glyphicon glyphicon-shopping-cart"></span> Cart </a></li>
            <li id="about-menu"><a ng-href="#/about"> About Us </a></li>
            <li id="contact-menu"><a ng-href="#/contact"> Contact Us </a></li>
            <li id="admin-menu"><a ng-href="/ecommerce/admin/"><span class="glyphicon glyphicon-user"> Administrator </a></li>
       </ul>
         <!-- End Menubar -->

        <div class="jumbotron main">

          <!-- VIEWS -->
          <div data-ng-cloak data-ng-view > </div>

        </div>
        <!-- FOOTER STARTS -->
        <div class="row footer">

              <p class="left"> &nbsp; &nbsp; &copy; 2014 Amadou Barry — All rights reserved. 

                  <span class="fa-stack fa-lg pull-right">
                    <i class="fa fa-square-o fa-stack-2x"></i>
                    <i class="fa fa-twitter fa-stack-1x"></i>
                  </span>

                  <span class="fa-stack fa-lg pull-right">
                    <i class="fa fa-square-o fa-stack-2x"></i>
                    <i class="fa fa-facebook fa-stack-1x"></i>
                  </span>

                  <span class="fa-stack fa-lg pull-right">
                    <i class="fa fa-square-o fa-stack-2x"></i>
                    <i class="fa fa-linkedin fa-stack-1x"></i>
                  </span>

                  <span class="fa-stack fa-lg pull-right">
                    <i class="fa fa-square-o fa-stack-2x"></i>
                    <i class="fa fa-youtube fa-stack-1x"></i>
                  </span>

                  <span class="fa-stack fa-lg pull-right">
                    <i class="fa fa-square-o fa-stack-2x"></i>
                    <i class="fa fa-google-plus fa-stack-1x"></i>
                  </span>
              </p>

        </div>
        <!-- FOOTER ENDS -->
    </div>
</div>

<script src="/ecommerce/script/routes.js"> </script>
<script src="/ecommerce/script/controllers.js"> </script>

<script> 

</script>


</body>
</html>



