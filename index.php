
<?php
if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
ini_set('display_errors', 'On');
require 'functions/functions.php';

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset='UTF-8'>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
            <title>Home Page</title>
            <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css'>
            <link href='http://fonts.googleapis.com/css?family=Quattrocento+Sans' rel='stylesheet' type='text/css'>
            <link rel='stylesheet' href='styles/style.css'>
    </head>

    <body>
        <div class="main_wrapper">


            <div class="header_warpper">
                <img src="images/ad_banner.jpg" id="banner">
            </div>
            <!-- END OF MAIN WRAPPER -->

            <!-- START OF MENUBAR -->
           <?php include "components/menubar.php";?>
            <!-- END OF MENU BAR -->


            <!-- CONTENT STARTS HERE -->
            <div class="content_wrapper">

                <!-- SIDEBAR STARTS HERE -->
                <div id="sidebar">

                    <div id="sidebar_title">Categories</div>
                    <ul class="cats">
                        <?php getCategories();?>
                    </ul>

                    <div id="sidebar_title">Brand</div>
                    <ul class="cats">
                        <?php getBrands(); ?>
                    </ul>
                </div>
                <!-- END OF SIDE BAR -->

                <!-- START CONTENT AREA -->
                <div id="content_area">

                    <?php cart(); ?>
                    <div id="shopping_cart">
                        <?php include "components/shopping_cart.php"; ?>
                    </div>
                    <div id="products_box">
                        <?php
                            if(isset($_GET['account_deleted'])){ 
                                        echo '<div class="confirmation">
                                                        <p> Your Account was successfully deleted. </p>
                                                     </div>';
                                    }
                        ?>
                        <?php getProducts(); ?>
                    </div>

                </div>
                <!-- END OF CONTENTAREA -->


                <!-- FOOTER STARTS HERE -->
                    <?php include "components/footer.php";?>
                <!-- END OF FOOTER -->

            </div>

            <script src=""></script>
</body>
</html>
