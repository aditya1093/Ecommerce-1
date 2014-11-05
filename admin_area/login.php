<?php
if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
ini_set('display_errors', 'On');
require '../functions/functions.php';
    
        if(isset($_POST['admin_email']) && isset($_POST['admin_password'])){
             check_admin($_POST['admin_email'], $_POST['admin_password']); 
        }
?>

<!DOCTYPE html>
<html lang="">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login Page</title>
    <link rel="stylesheet" href="styles/style.css">
    <link href='http://fonts.googleapis.com/css?family=Quattrocento+Sans' rel='stylesheet' type='text/css'>
</head>

<body>

    <div class="main_wrapper">

        <div class="header_warpper">
            <img src="../images/ad_banner.jpg" id="banner">
            <img src="images/administrator-icon.png" class="img-responsive pull-left" style="float: left;" />
        </div>

        <form id="index_form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
            <div class="form">
                <h1 style="text-align: center; margin-bottom: 15px;"> Administrator Login Form:</h1>
                <label>
                      <span class="label">Your Email: </span><input id="admin_email" type="email" name="admin_email" placeholder="email"/>
                </label>

                <label>
                      <span class="label">Your Password: </span><input id="admin_password" type="password" name="admin_password" placeholder="password"/>
                </label>
                <label style="display: block;" class="login">
                      <input type="submit" name="login" value="Login" id="login"/>
                </label>
                <br />
    
            </div>

                <p style="text-align: center; margin-top: 10px;"> <a> Forgot Password? </a></p>
                <p style="text-align: center; margin-top: 8px;"> <a> Create New Account. </a></p>

        </form>


        <!-- FOOTER STARTS HERE -->
        <?php include "../components/footer.php";?>
        <!-- END OF FOOTER -->

    </div>
    <!-- END OF THE PAGE -->
</body>
</html>
