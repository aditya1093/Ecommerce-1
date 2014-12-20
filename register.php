<?php
if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
ini_set('display_errors', 'On');
require 'functions/functions.php';

?>

<!DOCTYPE html>
<html lang="">
<head>

    <?php include "header.php"; ?>
    <title> Login </title>

</head>


<body>

<div class="container wrapper">

    <img src="images/banner.png" class="img-responsive" width="100%" height="250">

    <div class="jumbotron main">
        <div class="row">
            <header>
                <p class="text-center h1"> Customer Registration </p>
            </header>

                <div class="row">

                    <form class="form-horizontal" role="form" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>"
                      id="product-form" enctype="multipart/form-data">

                    <div class="form-group">
                        <label for="fname" class="col-xs-4 control-label"> First Name </label>

                        <div class="col-xs-4">
                            <input type="text" class="form-control" id="fname" placeholder="First Name" name="fname"
                                   data-validation="required">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="lname" class="col-xs-4 control-label"> Last Name </label>

                        <div class="col-xs-4">
                            <input type="text" class="form-control" id="lname" placeholder="Last Name"
                                   name="lname" data-validation="required">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="email" class="col-xs-4 control-label"> Email </label>

                        <div class="col-xs-4">
                            <input type="text" class="form-control" id="email" placeholder="Email" name="email">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="password" class="col-xs-4 control-label"> Password </label>

                          <div class="col-xs-4">
                              <input type="password" class="form-control" name="password" id="password" placeholder="Password" data-validation="length" data-validation-length="min5" data-validation="confirmation">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="photo" class="col-xs-4 control-label"> Photo </label>

                    <div class="col-xs-4">
                            <input type="file" class="filestyle" id="photo" name="photo"
                                   data-input="false" data-buttonName="btn-default" data-validation="required">
                        </div>
                    </div>


                    <div class="form-group">
                       &nbsp;&nbsp; <button type="submit" class="btn btn-md btn-primary col-xs-offset-4" value="submit" name="submit"> &nbsp;
                            <span class="glyphicon glyphicon-floppy-saved"></span> Register Now &nbsp; </button>
                    </div>

                </form>

                </div>
        </div>

        </div>
            <!-- FOOTER STARTS -->
             <div class="row footer">

                 <?php include "footer.php"; ?>

            </div>
    </div>

    <!-- FOOTER ENDS -->

<!-- jQuery Form Validation code -->
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.1.47/jquery.form-validator.min.js"></script>
<script> 
    $.validate(); 


</script>

</body>
</html>
