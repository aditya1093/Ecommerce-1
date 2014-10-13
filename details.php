<?php
    if(!isset($_GET['prod_id']))
        header("location: index.php");

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
    <title></title>
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
            <li><a href="#">Home</a></li>
            <li><a href="#">All Products</a></li>
            <li><a href="#">My Account</a></li>
            <li><a href="#">Sign Up</a></li>
            <li><a href="#">Shopping Cart</a></li>
            <li><a href="#">Contact Us</a></li>
        </ul>
        <!-- END OF MENU -->

        <div id="form">
            <form method='get' action='results.php' enctype='multipart/form-data'>
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
                <?php getDetail($_GET['prod_id']);?>
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
