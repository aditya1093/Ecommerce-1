<?php
if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
ini_set('display_errors', 'On');
require '../functions/functions.php';
$ip = getIpAddress(); 


    if(isset($_POST['remove_account'])){
        $c_id = $_SESSION['customer_id'];
        remove_customer($c_id);
        session_destroy();
        echo "<script> window.location ='http://localhost:8888/e-commerce2/index.php?account_deleted';</script>";
}
?>

<!DOCTYPE html>
<html>
<head>
        <meta charset='UTF-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0' />
        <title>Home Page</title>
        <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css'>
        <link href='http://fonts.googleapis.com/css?family=Quattrocento+Sans' rel='stylesheet' type='text/css'>
        <link rel='stylesheet' href='styles/style.css'>
</head> 

<body>

<div class="main_wrapper">


    <div class="header_warpper">
        <img src="../images/ad_banner.jpg" id="banner">
    </div>
    <!-- END OF MAIN WRAPPER -->

    <!-- START OF MENUBAR -->
    <?php include "../components/menubar.php";?>
    <!-- END OF MENU BAR -->


    <!-- CONTENT STARTS HERE -->
    <div class="content_wrapper">

        <!-- START CONTENT AREA -->
        <div id="content_area_registration">

                <div id="register_page">

                    <p style="text-align: center; font-size: 30px">Remove Your Account</p>

                    <form method="post" action="delete_account.php" class="form-inline" role="form" enctype="multipart/form-data">
                        <p style="text-align: center; font-size: 16px"> We are sorry to see you go.</p>
               
                        <input type="hidden" name='remove_account' value='change'/>
                        <button type="submit" class="btn btn-default"> Remove Account </button>

                    </form>
            </div>

        </div>
        <!-- END OF CONTENT AREA -->


        <!-- FOOTER STARTS HERE -->
        <?php include "../components/footer.php";?>
        <!-- END OF FOOTER -->
    </div>

    <script src=""></script>
</body>
</html>