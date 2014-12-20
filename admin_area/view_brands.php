<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}
ini_set('display_errors', 'On');
require 'functions/functions.php';

if (empty($_SESSION['admin_email']))
    echo "<script> window.location ='./login.php';</script>";
?>

<!DOCTYPE html>
<html lang="">
<head>
    <?php include "header.php"; ?>
     <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.2.26/angular.min.js"></script>
    <title> Categories </title>

</head>


<body>

<div class="container wrapper">

    <img src="images/banner.png" class="img-responsive" width="100%" height="200">

    <ul class="nav nav-tabs">
        <li ><a href="index.php"> Home <span class="glyphicon glyphicon-home"></span></a></li>
        <li><a href="view_products.php"> Products </a></li>
        <li ><a href="insert_product.php"> New Product </a></li>
        <li ><a href="view_categories.php"> Categories </a></li>
        <li><a href="insert_category.php"> New Category</a></li>
        <li class="active"><a href="view_brands.php"> Brands </a></li>
        <li><a href="insert_brand.php"> New Brand </a></li>
        <li><a href="customers.php"> Customers </a></li>
        <li><a href="view_orders.php"> Orders </a></li>
        <li><a href="view_payment.php"> Payments </a></li>
        <li><a  id="logout" > Logout </a></li>
    </ul>

    <div class="jumbotron main">
        <div class="row">
            <header>
                <p class="text-center h1"> Brands </p>
            </header>

           <table id="product_table" class="table table-hover table-striped" ng-table="tableParams">
            <thead>
                <tr>
                    <th> Brand ID </th>
                    <th> Brand Title </th>
                    <th> Action </th>
                </tr>
            </thead>
                     
            <tbody data-ng-app="" data-ng-controller="Brands">

                <tr data-ng-repeat="brand in brands">
                    <td> {{ brand.id }} </td>
                    <td> {{ brand.title}} </td>
                    <td class="action"> <span id="edit" class="text-center" data-ng-click="edit.doClick()"> Edit </span>
                        <span id="remove" class="text-center" data-ng-click="remove.doClick()"> Remove </span> 
                    </td>
                </tr>
            </tbody>

        </table>


        </div>
    </div>
    <!-- FOOTER STARTS -->
    <div class="row footer">

        <?php include "footer.php"; ?>

    </div>
    <!-- FOOTER ENDS -->
</div>
<!-- jQuery Form Validation code -->
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.1.47/jquery.form-validator.min.js"></script>
<script src="js/script.js"></script>
<script> 

    function Brands($scope, $http) {
           
        $http.get("functions/files/brands.php").success(function(response){
            $scope.brands = response;
        });
        
        $scope.edit  = {};
        $scope.remove  = {};

        $scope.edit.doClick = function(){
           alert('hsdfjdsflkjsdfl');
        }
          $scope.remove.doClick = function(){
           alert('hsdfjdsflkjsdfl');
        }
    }


    $('#brand_table').dataTable();



</script>

</body>
</html>
