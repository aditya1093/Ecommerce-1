<?php
if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
ini_set('display_errors', 'On');
require '../functions/functions.php';
$ip = getIpAddress(); 

    if(isset($_POST['register'])){

            $c_name = $_POST['name'];
            $c_email= $_POST['email'];
            $c_password = $_POST['password'];
           // $c_image = $_FILES['photo']['name'];
            //$c_image_tmp = $_FILES['photo']['tmp_name'];
            $c_country = $_POST['country'];
            $c_city = $_POST['city'];
            $c_contact = $_POST['contact'];
            $c_address = $_POST['address'];
            
            //move_uploaded_file($c_image_tmp, "customer/customers_images/$c_image");


            $add_customer = "insert into customers(
                                customer_ip, customer_name, customer_email, customer_password,
                                customer_country, customer_city, customer_contact, customer_address) 
                                values('$ip', '$c_name', '$c_email', '$c_password',
                                '$c_country', '$c_city', '$c_contact', '$c_address')";


            register_new_customer($add_customer);

            $select_cart = "select * from cart where ip_add='$ip'";

            check_cart($select_cart, $c_email, $c_name);
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

                   

                    <form method="post" id="form_registration"action="customer_register.php" class="form-inline" role="form" enctype="multipart/form-data">
                         <p style="text-align: center; font-size: 30px; margin-botton:">Create A New Account</p>
                        <div class="form-group">
                            <label for="name">Customer Name: </label>
                            <input type="text" id="name" name="name" placeholder="enter name" required="required"/>
                        </div>

                        <div class="form-group">
                            <label for="email">Customer email: </label>
                            <input type="email" id="email" name="email" placeholder="enter email" required="required"/>
                        </div>

                        <div class="form-group">
                            <label for="password">Customer Password: </label>
                            <input type="password" id="password" name="password" placeholder="enter password" required="required"/>
                        </div>
                        <!--
                        <div class="form-group photo">
                            <label for="photo">Photo: </label>
                            <input type="file" id="photo" name="photo" required="required" />
                        </div>
                        -->

                        <div class="form-group">
                            <label for="country">Customer Country: </label>
                            <input type="text" id="country" name="country" placeholder="enter country" required="required"/>
                        </div>

                        <div class="form-group">
                            <label for="city">Customer City: </label>
                            <input type="text" id="city" name="city" placeholder="enter city" required="required"/>
                        </div>

                        <div class="form-group">
                            <label for="contact">Customer Contact: </label>
                            <input type="text" id="contact" name="contact" placeholder="enter contact" required="required"/>
                        </div>

                        <div class="form-group">
                            <label for="address">Customer Address: </label>
                            <input type="text" id="country" name="address" placeholder="enter address" required="required"/>
                        </div>
                        <input type="hidden" name='register' value='register'/>
                        <button type="submit" class="btn btn-default"> Register </button>

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