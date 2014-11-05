 <?php
if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
ini_set('display_errors', 'On');
require '../functions/functions.php';
    
    if(empty($_SESSION['admin_email']))
        echo "<script> window.location ='http://localhost:8888/e-commerce2/admin_area/login.php';</script>";
    ?>

<!DOCTYPE html>
<html lang="">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Product</title>
    <link rel="stylesheet" href="styles/style.css">
    <link href='http://fonts.googleapis.com/css?family=Quattrocento+Sans' rel='stylesheet' type='text/css'>
</head>

<body>

    <div class="main_wrapper" style="min-height: 300px;">
            <img src="../images/ad_banner.jpg" class="img-responsive" width="100%" height="250" style="margin-bottom:0;">
            <img src="images/administrator-icon.png" class="img-responsive"  style="float: left; margin-top: 0;" />
    
        <div class="content">
            <p style="font-size: 55px; margin-top: 85px; font-family:sans-serif; line-height: 1.8em" align="center"> Welcome to the Admin Area </p>
            <?php
                if(isset($_GET['category_inserted'])){
                    echo '<p style="color: green; font-size: 15px"> Category Successfully Added. </p>';
                }
                else if(isset($_GET['brand_inserted'])){
                    echo '<p style="color: green; font-size: 15px"> Brand Successfully Added. </p>';
                }

            ?>
        </div>

        <?php include"menu.php" ?>   


        <!-- FOOTER STARTS HERE -->
        <?php include "../components/footer.php";?>
        <!-- END OF FOOTER -->

    </div>
    <!-- END OF THE PAGE -->
</body>
</html>
