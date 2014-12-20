 <?php
    if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
    ini_set('display_errors', 'On');
    require 'functions/functions.php';
    
    if( !isset($_SESSION['admin_email']) ){
        echo "<script> window.location ='./login.php';</script>";
    }

?>

<!DOCTYPE html>
<html lang="">
<head>

    <?php include "header.php"; ?>
    <title> Home Page </title>

</head>


<body>

<div class="container wrapper">

    <img src="images/banner.png" class="img-responsive" width="100%" height="250">

    <ul class="nav nav-tabs">
        <li class="active"><a href="index.php"> Home <span class="glyphicon glyphicon-home"></span></a></li>
        <li><a href="view_products.php"> Products </a></li>
        <li><a href="insert_product.php"> New Product </a></li>
        <li><a href="view_categories.php"> Categories </a></li>
        <li><a href="insert_category.php"> New Category</a></li>
        <li><a href="view_brands.php"> Brands </a></li>
        <li><a href="insert_brand.php"> New Brand </a></li>
        <li><a href="customers.php"> Customers </a></li>
        <li><a href="view_orders.php"> Orders </a></li>
        <li><a href="view_payment.php"> Payments </a></li>
        <li><a  id="logout" > Logout </a></li>
    </ul>

    <div class="jumbotron main">
        <div class="row">
            <header>
                <p class="text-center h1"> Welcome to the Admin Page </p>
            </header>

            <div>

                <?php
                    if(isset($_GET['category_inserted'])){
                        echo '<p class="text-center success"> Category Successfully Added. </p>';
                    }
                    else if(isset($_GET['brand_inserted'])){
                        echo '<p class="text-center"> Brand Successfully Added. </p>';
                    }
                    else if(isset($_GET['product_inserted'])){
                        echo '<p class="text-center success"> Product Successfully Added. </p>';
                    }

                ?>

            </div>
            

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


</body>
</html>
