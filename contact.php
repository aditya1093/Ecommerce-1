<?php
if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
ini_set('display_errors', 'On');
require 'functions/functions.php';

?>

<!DOCTYPE html>
<html>
<head>
        <meta charset='UTF-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0' />
        <title>Contact Page</title>
        <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css'>
        <link href='http://fonts.googleapis.com/css?family=Quattrocento+Sans' rel='stylesheet' type='text/css'>
        <link rel='stylesheet' href='styles/style.css'>
        <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-theme.min.css">
        <script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
</head> 

<body>

<div class="main_wrapper">

    <div class="header_warpper">
        <img src="images/ad_banner.jpg" id="banner">
    </div>
    <!-- END OF MAIN WRAPPER -->

    <!-- START OF MENUBAR -->
    <?php include "components/menubar.php";?>
    <!-- END OF MENU BAR -->


    <!-- CONTENT STARTS HERE -->
    <div class="content_wrapper">

        <!-- START CONTENT AREA -->
        <div id="content_area_contact">

            <div style="margin-top:55px">
            <div class="container">
                <div class="panel panel-default" style="margin:auto;width:700px">
                    <div class="panel-heading">
                        <h2 class="panel-title">Contact Form</h2>
                    </div>
                    <div class="panel-body">

                    
                         <form class="form-horizontal tpad" role="form">

                            <div class="form-group">
                                <label for="inputName" class="col-lg-2 control-label">Name</label>
                                <div class="col-lg-10">
                                    <input type="text" class="form-control" id="inputName" name="inputName" placeholder="Your Name">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail1" class="col-lg-2 control-label">Email</label>
                                <div class="col-lg-10">
                                    <input type="text" class="form-control" id="inputEmail" name="inputEmail" placeholder="Your Email">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputSubject" class="col-lg-2 control-label">Subject</label>
                                <div class="col-lg-10">
                                    <input type="text" class="form-control" id="inputSubject" name="inputSubject" placeholder="Subject Message">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputPassword1" class="col-lg-2 control-label">Message</label>
                                <div class="col-lg-10">
                                    <textarea class="form-control" rows="4" id="inputMessage" name="inputMessage" placeholder="Your message..."></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-lg-offset-2 col-lg-10">
                                    <button class="btn btn-default" type="submit">
                                        Send Message
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        </div>
        <!-- END OF CONTENT AREA -->


        <!-- FOOTER STARTS HERE -->
        <?php include "components/footer.php";?>
        <!-- END OF FOOTER -->
    </div>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
</body>
</html>
