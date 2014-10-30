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
                

        global $localhost, $username, $password, $database;
        $con = new mysqli($localhost, $username, $password, $database);

        /* check connection */
        if ($con->connect_errno) {
            printf("Connect failed: %s\n", $con->connect_error);
            exit();
        }

        $email = $_POST['email'];
        $password = $_POST['password'];

        $query = "select customer_id, customer_name from customers where customer_password='$password' and customer_email='$email'";
        $result = $con->query($query);

        if($result->num_rows==0){
            echo "<script> alert('Password or email incorrect');</script>;";
        }

        else{
            
            while ($n = mysqli_fetch_array($result)) {
                $name = $n['customer_name'];
                $id  = $n['customer_id'];
            }

            $_SESSION['customer_name'] = $name;
            $_SESSION['customer_email'] = $email;
             $_SESSION['customer_id'] = $id;

             echo "<script> window.location ='http://localhost:8888/e-commerce2/customer/my_account.php';</script>";
            

             /*
            $select_cart = "select p_id from cart where ip_add='$ip'";
            $result1 = $con->query($select_cart);
 
            if($result1->num_rows==0)
                echo "<script> window.location ='http://localhost:8888/e-commerce2/my_account.php';</script>";
             else
                echo "<script> window.location = 'http://localhost:8888/e-commerce2/payement.php';</script>";
                */
        }

        $con->close();
        
            }
        ?>
        <!-- FOOTER STARTS HERE -->
        <?php include "../components/footer.php";?>
        <!-- END OF FOOTER -->

    </div>


    <script src=""></script>
</body>
</html>
