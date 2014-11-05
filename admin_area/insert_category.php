<?php
if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
ini_set('display_errors', 'On');
require '../functions/functions.php';

    if(empty($_SESSION['admin_email']))
        echo "<script> window.location ='http://localhost:8888/e-commerce2/admin_area/login.php';</script>";

    if(isset($_POST['submit'])){

        $new_category = $_POST['category'];
        $result = insert_new_categories($new_category);
        if($result)
            echo "<script>window.location='http://localhost:8888/e-commerce2/admin_area/index.php?category_inserted';</script>";
        else
            echo "<script> alert('The category already exit in the database.'); </script>";
    } 
?>

<!DOCTYPE html>
<html lang="">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Category</title>
    <link rel="stylesheet" href="styles/style.css">
     <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css'>
    <link href='http://fonts.googleapis.com/css?family=Quattrocento+Sans' rel='stylesheet' type='text/css'>
</head>
<body>

    <div class="main_wrapper" style="min-height: 300px;">
            <img src="../images/ad_banner.jpg" class="img-responsive" width="100%" height="250">


            <?php include"menu.php" ?>    
                    
            <div class="content_view_product">

                <p style="text-align: center; font-size: 30px; margin-botton:20px; font-family: sans-serif; margin-botton: 20px;margin-top: 10px;">Insert New Category</p>
                <form method="post" id="form_category_insert" action="<?php echo $_SERVER['PHP_SELF']; ?>" class="form-inline" role="form" enctype="multipart/form-data">
                         
                        <div class="form-group">
                            <label for="name">Enter New Category: </label>
                            <input type="text" id="category" name="category" required="required"/>
                        </div>
      
                        <input type="hidden" name='submit' value='submit'/>
                        <button type="submit" class="btn btn-xs btn-primary" > Add Category </button>

                    </form>
            <div>
    

        


        <!-- FOOTER STARTS HERE -->
        <?php include "../components/footer.php";?>
        <!-- END OF FOOTER -->

    </div>
    <!-- END OF THE PAGE -->
</body>
</html>
