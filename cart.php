<?php
if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
ini_set('display_errors', 'On');
require 'functions/functions.php';
$ip = getIpAddress();
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset='UTF-8'>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
            <title>Shopping Cart</title>
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

        <!-- START CONTENT AREA -->
        <div id="content_area_contact">

            <!-- START OF THE PRODUCT BOX -->
            <div id="products_box">

                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
                    <table style="margin-left: 160px;">
                        
                        <caption style="font-size: 26px; color: green">Checkout Your Order</caption>
                        
                        <colgroup>
                            <col class="remove"/>
                            <col class="product"/>
                            <col class="info_qty" />
                            <col class="info_price" />
                        </colgroup>

                        <thead>
                            <tr\>
                                <th>Remove</th>
                                <th>Product(s)</th>
                                <th>Quantity</th>
                                <th>Total Price</th>
                            </tr>
                        </thead>
                        
                        <?php total_price_cart(); ?>

                    </table>

                </form>
                <!-- END OF FORM -->
            </div>
            <!-- END OF PRODUCT BOX -->
        </div>
        <!-- END OF CONTENTAREA -->

        <!-- FOOTER STARTS HERE -->
        <?php include "components/footer.php";?>
        <!-- END OF FOOTER -->
    </div>

    <script src=""></script>
</body>
</html>
