<?php
if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
ini_set('display_errors', 'On');
require '../functions/functions.php';
$ip = getIpAddress(); 

    if(isset($_POST['edit'])){

            $c_name = $_POST['name'];
            $c_email= $_POST['email'];
           // $c_password = $_POST['password'];
           // $c_image = $_FILES['photo']['name'];
            //$c_image_tmp = $_FILES['photo']['tmp_name'];
            $c_country = $_POST['country'];
            $c_city = $_POST['city'];
            $c_contact = $_POST['contact'];
            $c_address = $_POST['address'];
            $c_id =  $_SESSION['customer_id'];

            //move_uploaded_file($c_image_tmp, "customer/customers_images/$c_image");
            $edit_customer = "update customers set 
                                customer_name= '$c_name', 
                                customer_email= '$c_email',
                                customer_password= '$c_password',
                                customer_country= '$c_country', 
                                customer_city='$c_city', 
                                customer_contact='$c_contact', 
                                customer_address='$c_address' where customer_id = $c_id";
            edit_customer($edit_customer);
            echo "<script> window.location ='http://localhost:8888/e-commerce2/customer/my_account.php?account_edited';</script>";
    }

    else  {

            $c_id =  $_SESSION['customer_id'];

            $customer = getCustomer($c_id);

            $c_name = $customer['name'];
            $c_email= $customer['email'];
            $c_password = $customer['password'];
            $c_country = $customer['country'];
            $c_city = $customer['city'];
            $c_contact = $customer['contact'];
            $c_address = $customer['address'];
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

                    <p style="text-align: center; font-size: 30px">Edit Your Account</p>

                    <form method="post" action="edit_account.php" class="form-inline" role="form" enctype="multipart/form-data">

                        <div class="form-group">
                            <label for="name">Customer Name: </label>
                            <input type="text" id="name" name="name" value='<?php echo $c_name ?>' required="required"/>
                        </div>

                        <div class="form-group">
                            <label for="email">Customer email: </label>
                            <input type="email" id="email" name="email" value='<?php echo $c_email ?>' required="required"/>
                        </div>
                        <!--
                        <div class="form-group">
                            <label for="password">Customer Password: </label>
                            <input type="password" id="password" name="password" placeholder="enter password" required="required"/>
                        </div>
                        <div class="form-group photo">
                            <label for="photo">Photo: </label>
                            <input type="file" id="photo" name="photo" required="required" />
                        </div>
                        -->

                        <div class="form-group">
                            <label for="country">Customer Country: </label>
                            <input type="text" id="country" name="country" value='<?php echo $c_country ?>' required="required"/>
                        </div>

                        <div class="form-group">
                            <label for="city">Customer City: </label>
                            <input type="text" id="city" name="city" value='<?php echo $c_city ?>' required="required"/>
                        </div>

                        <div class="form-group">
                            <label for="contact">Customer Contact: </label>
                            <input type="text" id="contact" name="contact" value='<?php echo $c_contact ?>' required="required"/>
                        </div>

                        <div class="form-group">
                            <label for="address">Customer Address: </label>
                            <input type="text" id="country" name="address" value='<?php echo $c_address ?>' required="required"/>
                        </div>
                        <input type="hidden" name='edit' value='edit'/>
                        <button type="submit" class="btn btn-default"> Edit Account </button>

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