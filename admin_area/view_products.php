<?php
if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
ini_set('display_errors', 'On');
require '../functions/functions.php';

?>


<!DOCTYPE html>
<html lang="">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Products</title>
    <link rel="stylesheet" href="styles/style.css">
    <link href='http://fonts.googleapis.com/css?family=Quattrocento+Sans' rel='stylesheet' type='text/css'>
</head>
<body>

    <div class="main_wrapper" style="min-height: 300px;">
            <img src="../images/ad_banner.jpg" class="img-responsive" width="100%" height="250">
      
    

            <div class="content_view_product">
                    <?php  get_products_for_admin(); ?>

            </div>


        <!-- FOOTER STARTS HERE -->
        <?php include "../components/footer.php";?>
        <!-- END OF FOOTER -->

    </div>
    <!-- END OF THE PAGE -->
</body>
</html>
