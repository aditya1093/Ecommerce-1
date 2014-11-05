<?php
if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
ini_set('display_errors', 'On');
require '../functions/functions.php';
$ip = getIpAddress();

?>


<!DOCTYPE html>
<html>
<head>
        <meta charset='UTF-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0' />
        <title>Customer Login Page</title>
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
        <div id="content_area">
               
            <div class="customer_login" align='center' style='margin-top: 40px;'>


                <form method="post" action="customer_login.php" class="form-inline" role="form" id="form_login">
                    
                    <div class="form-group" style="display: block; padding-top: 30px">

                    <label for="email" style="width: 100px; font-size: 20px">Email: </label>
                    <input type="email" id="email" name="email" placeholder="enter email" required="required"/>

                    </div>
                    <div class="form-group" style="display: block; padding-top: 30px;">

                        <label for="password" style="width: 100px; font-size: 20px;">Password: </label>
                        <input type="password" id="password" name="password" placeholder="password" required="required"/>

                    </div>
                <button type="submit" class="btn btn-default" style="margin-top: 25px; width: 260px; margin-top: 20px;"> Submit </button>
                <p class="help-block"><a href="checkout.php?forgot_pass"> Forgot Password? </a></p>
                <p><a href="customer_register.php"> New? Register Here </a></p>
        </form>
        
    </div>

        </div>
        <!-- END OF CONTENTAREA -->

        <?php

            if(isset($_POST['email']) && isset($_POST['password'])){
                 check_user($_POST['email'], $_POST['password']); 
            }
        ?>
        <!-- FOOTER STARTS HERE -->
        <?php include "../components/footer.php";?>
        <!-- END OF FOOTER -->

    </div>


    <script src=""></script>
</body>
</html>
