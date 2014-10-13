<?php
    if(!isset($_GET['user_query']))
        header('location: index.php');
?>

<!DOCTYPE html>

<?php
ini_set('display_errors', 'On');
require 'functions/functions.php';
?>


<html lang="">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link href='http://fonts.googleapis.com/css?family=Quattrocento+Sans' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="styles/style.css">
</head>

<body>

<div class="main_wrapper">

    <div class="header_warpper">
        <img src="images/ad_banner.jpg" id="banner">

    </div>

    <!-- END OF MAIN WRAPPER -->

    <!-- START OF MENUBAR -->
    <div class="menubar">

        <!--START OF MENU -->
        <ul id="menu">
            <li><a href="index.php">Home</a></li>
            <li><a href="all_products.php">All Products</a></li>
            <li><a href="#">My Account</a></li>
            <li><a href="#">Sign Up</a></li>
            <li><a href="#">Shopping Cart</a></li>
            <li><a href="#">Contact Us</a></li>
        </ul>
        <!-- END OF MENU -->

        <div id="form">
            <form method='get' action='result.php' enctype='multipart/form-data'>
                <input type="text" name="user_query" placeholder="Search a Product">
                <input type="submit" name="search" value="search" />
            </form>
        </div>
    </div>

    <!-- END OF MENU BAR -->

    <!-- CONTENT STARTS HERE -->
    <div class="content_wrapper">

        <!-- SIDEBAR STARTS HERE -->
        <div id="sidebar">

            <div id="sidebar_title">Categories</div>
            <ul class="cats">
                <?php
                getCategories();
                ?>
            </ul>

            <div id="sidebar_title">Brand</div>
            <ul class="cats">
                <?php
                getBrands();
                ?>
            </ul>
        </div>
        <!-- END OF SIDE BAR -->

        <!-- START CONTENT AREA -->
        <div id="content_area">
            <div id="shopping_cart">
                        <span id = 'shopping_text'> Welcome Guest! <b> Shopping Cart - </b> Total Items: Total Price:
                            <a href="cart.php"> Go To Cart </a>&nbsp;&nbsp;</span>


            </div>
            <div id="products_box">
                <?php

                if(isset($_GET['user_query'])) {

                    $con = new mysqli("localhost", "root", "root", "e_commerce2");
                    $search_item = mysqli_real_escape_string($con, $_GET['user_query']);
                    /* check connection */
                    if ($con->connect_errno) {
                        printf("Connect failed: %s\n", $con->connect_error);
                        exit();
                    }

                    $query = "select * from products where product_title like '%$search_item%'";
                    $sql = $con->query($query);

                    while ($row = mysqli_fetch_array($sql)) {
                        $prod_id = $row['product_id'];
                        $prod_title = $row['product_title'];
                        $prod_cat = $row['product_cat'];
                        $prod_brand = $row['product_brand'];
                        $prod_price = $row['product_price'];
                        $prod_desc = $row['product_desc'];
                        $prod_key = $row['product_keywords'];
                        $prod_image = $row['product_image'];

                        echo "<div id='single_product'>
                    <h3> $prod_title </h3>
                    <img src='admin_area/product_image/$prod_image' width='200' height='160'/>
                    <p><b>$ $prod_price </b></p>
                    <a href='details.php?prod_id=$prod_id' style='float:left;'> Details </a>
                    <a href='index.php?prod_id=$prod_id'><button style='float:right;'> Add to Cart </button></a>
                    </div>";
                    }

                    $sql->close();
                    $con->close();
                }

                ?>
            </div>

        </div>
        <!-- END OF CONTENTAREA -->


        <!-- FOOTER STARTS HERE -->
        <div id="footer">

            <p> &copy; 2014 Amadou Barry &nbsp;</p>

        </div>

        <!-- END OF FOOTER -->


    </div>





    <script src=""></script>
</body>
</html>
