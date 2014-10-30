<?php
if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
ini_set('display_errors', 'On');
require '../functions/functions.php';
?>

<!DOCTYPE html>
<html>
<head>
        <meta charset='UTF-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0' />
        <title>Account</title>
        <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css'>
        <link href='http://fonts.googleapis.com/css?family=Quattrocento+Sans' rel='stylesheet' type='text/css'>
        <link rel='stylesheet' href='style.css'>
</head> 

<?php
    
    if(empty($_SESSION['customer_email']))
        echo "<script> window.location ='http://localhost:8888/e-commerce2/customer/customer_login.php';</script>";
?>

<body>

<div class="main_wrapper">

    <div class="header_warpper">
        <img src="../images/ad_banner.jpg" id="banner">
    </div>
    <!-- END OF MAIN WRAPPER -->

    <!-- START OF MENUBAR -->
   <div class='menubar'>
        <!--START OF MENU -->
        <ul id='menu'>
            <li><a href='http://localhost:8888/e-commerce2/index.php'>Home</a></li>
            <li><a href='http://localhost:8888/e-commerce2/all_products.php'>All Products</a></li>
            <li><a href='http://localhost:8888/e-commerce2/customer/my_account.php'>My Account</a></li>
            <li><a href='http://localhost:8888/e-commerce2/customer/customer_register.php'>Sign Up</a></li>
            <li><a href='http://localhost:8888/e-commerce2/cart.php'>Shopping Cart</a></li>
            <li><a href='http://localhost:8888/e-commerce2/contact.php'>Contact Us</a></li>
        </ul>
        <!-- END OF MENU -->

            <form method='get' action='http://localhost:8888/e-commerce2/results.php'>
                <input type='text' name='user_query' placeholder='Find Product' style='color: black;' />
                <input value='Find' type='submit' style='color: white; background-color: cornflowerblue; height: 25px'/>
            </form>

    </div>
    <!-- END OF MENU BAR -->


    <!-- CONTENT STARTS HERE -->
    <div class="content_wrapper">
 

        <!-- START CONTENT AREA -->
        <div class="content_area">
               <?php cart(); ?>


                <div id="shopping_cart">
                    <?php

                         $id = getIpAddress();
                        $guest = "Guest";
                        $login = "<a href='http://localhost:8888/e-commerce2/customer/customer_login.php'>Login!</a>";
                        if(isset($_SESSION['customer_name'])){

                            $guest = $_SESSION['customer_email'];
                            $name = $_SESSION['customer_name'];

                            $login = "<a href='http://localhost:8888/e-commerce2/customer/customer_logout.php'>Logout!</a>";
                        }
                    ?>     

                    <span id='shopping_text'> <?php echo 'Hello '.$guest.'  ';?> - <?php echo $login;?>
                    <span style="color: yellowgreen;"
                    <a href="http://localhost:8888/e-commerce2/cart.php">Shopping Cart</a> </span> - </b>
                    Total Items:<?php total_items(); ?> - Total Price:<?php total_price(); ?> - 
                    <a href="http://localhost:8888/e-commerce2/index.php"> Back to Shop </a>&nbsp;&nbsp;</span>

                </div>
                <?php 
                      //  $edit_account = $_GET['edit_account'];
                      //  $change_password = $_GET['change_password'];
                      //  $delete_account = $_GET['delete_account'];

                        if(isset($_GET['edit_account'])){

                             echo "<script> window.location ='http://localhost:8888/e-commerce2/customer/edit_account.php';</script>";

                        }elseif (isset($_GET['change_password'])) {
                             echo "<script> window.location ='http://localhost:8888/e-commerce2/customer/change_password.php';</script>";

                        
                        }elseif (isset($_GET['delete_account'])) {
                             echo "<script> window.location ='http://localhost:8888/e-commerce2/customer/delete_account.php';</script>";

                        }else{

                            $display = "  <div class='page_content'>
                                         <h2> Welcome <?php echo $name ?> </h2>
                                        <p> You can see your orders' progress by clicking <a href='http://localhost:8888/e-commerce2/cart.php'>here!</a> </p>
                                    </div>";
                            if(isset($_GET['account_edited'])){
                                $display .= '<div class="confirmation">
                                                <p> Your account was successfully edited. </p>
                                             </div>
                                ';
                            }elseif(isset($_GET['password_changed'])){
                                 $display .= '<div class="confirmation">
                                                <p> Your Password was successfully edited. </p>
                                             </div>
                                ';
                            }
                            echo $display;

                        }
                ?>
        
        </div>
        <!-- END OF CONTENTAREA -->

        <!-- START OF THE CUSTOMER MENUE -->
        <div class="customer_menu">
            <div id="sidebar_title">My Account </div>
            <ul>
                <li><a href="http://localhost:8888/e-commerce2/cart.php"> My Orders </a></li>
                <li><a href="http://localhost:8888/e-commerce2/customer/my_account.php?edit_account"> Edit Account </a></li>
                <li><a href="http://localhost:8888/e-commerce2/customer/my_account.php?change_password"> Change Password </a></li>
                <li><a href="http://localhost:8888/e-commerce2/customer/my_account.php?delete_account"> Delete Account </a></li>
            </ul>
        </div>
        <!-- END OF THE CUSTOMER MENUE -->
        
        <!-- FOOTER STARTS HERE -->
            <?php include "../components/footer.php";?>
        <!-- END OF FOOTER -->
    </div>
</div>
    <script src=""></script>
</body>
</html>
