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

                    <p style="text-align: center; font-size: 30px">Change Your Password</p>

                    <form method="post" action="change_password.php" class="form-inline" role="form" enctype="multipart/form-data">
                            <?php

                                if(isset($_POST['change_password'])){

                                    if($_POST['new_password1'] == $_POST['new_password2']){
    
                                        $c_id = $_SESSION['customer_id'];
                                        $c_current_password = $_POST['current_password'];
                                        $c_new_password = $_POST['new_password1'];
    
                                        $result = checkPassword($c_id, $c_current_password, $c_new_password);
                                        if($result == 'success'){
                                             echo "<script> window.location ='http://localhost:8888/e-commerce2/customer/my_account.php?password_changed';</script>";
                                        }
                                        elseif ($result == 'failure') {
                                            echo "<p style='color: red;text-align:center; margin-top: 10px; font-size: 18px;'> Your old password does not match.</p>";
                                        }
                                    }

                                    else{
                                        echo "<p style='color: red;text-align:center; margin-top: 10px; font-size: 18px;'> The password you entered does not match. </p>";
                                    }
            
                               }
                                ?>
                        
                        <div class="form-group">
                            <label for="password">Current Password: </label>
                            <input type="password" id="password" name="current_password" placeholder="enter password" required="required"/>
                        </div>
                        <div class="form-group">
                            <label for="password">New Password: </label>
                            <input type="password" id="password" name="new_password1" placeholder="enter password" required="required"/>
                        </div>
                        <div class="form-group">
                            <label for="password">New Password Again: </label>
                            <input type="password" id="password" name="new_password2" placeholder="enter password" required="required"/>
                        </div>
                    
 
                        <input type="hidden" name='change_password' value='change'/>
                        <button type="submit" class="btn btn-default"> Change Password </button>

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