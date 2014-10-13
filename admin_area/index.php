<!DOCTYPE html>
<html lang="">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Product</title>
    <link rel="stylesheet" href="style.css">
    <link href='http://fonts.googleapis.com/css?family=Quattrocento+Sans' rel='stylesheet' type='text/css'>
</head>
<?php  require '../functions/functions.php'; ?>
<body>

    <div class="main_wrapper">

        <div class="header_warpper">
            <img src="../images/ad_banner.jpg" id="banner">
            
        </div>
    <form action='index.php' method="post" enctype="multipart/form-data" id="prod_form">
        <fieldset>
            <legend>Insert New Products Here</legend>
            
               <label for="prod_title">Product Title: </label>
            <input type="text" id="prod_title" name="prod_title" required="required" size="25"/>

            <!--  DISPLAYING THE CATEGORIES FROM THE DATABASE -->

            <label for="prod_cat">Product Category: </label>
            <select name="prod_cat" id="prod_cat">
                <option value="select a Category"><-- Select a Category --></option>
                <?php getCatergories_admin_area(); ?>
            </select>

                 <!--  DISPLAYING THE BRANDS FROM THE DATABASE -->
               <label for="prod_brand">Product Brand: </label>
            <select name="prod_brand" id="prod_brand">
                <option value="Select a brand"><-- Select a Brand --></option>
                <?php getBran(); ?>
            </select>

               <label for="prod_image">Product Image: </label>
            <input  id="prod_image" name="prod_image" type="file" size="25"/>
               <label for="prod_price">Product Price: </label>
            <input  id="prod_price" name="prod_price" type="text" required="required" size="25"/>

            <label for="prod_key">Product Keywords: </label>
            <input  type="text" id="prod_key" name="prod_key" required="required" size="25"/>

            <span style="display: block;" id="desc" ><p style="text-align: left;"> Product Description: </p></span>
            <textarea  id="prod_desc" name="prod_desc" cols="20" rows="15"> </textarea>

            <input type="submit" name="submit" value="Insert Product Now" id="insert"/>
        </fieldset>
    
    </form>
        
        <!-- FOOTER STARTS HERE -->
        <div id="footer">
            <p> &copy; 2014 Amadou Barry &nbsp;</p>
        </div>
        <!-- END OF FOOTER -->

    </div>
    <!-- END OF THE PAGE -->

    <script src="//tinymce.cachefly.net/4.1/tinymce.min.js"></script>
    <script>
        tinymce.init({selector:'textarea'});
    </script>
</body>
</html>
<?php
        if(isset($_POST['submit'])){


            $con = new mysqli("localhost", "root", "root", "e_commerce2");
            /* check connection */
            if ($con->connect_errno) {
                printf("Connect failed: %s\n", $con->connect_error);
                exit();
            }
            //GETTING TEXT DATA FROM THE FIELD
            $prod_title     =  mysqli_real_escape_string($con, $_POST['prod_title']);
            $prod_cat       =  mysqli_real_escape_string($con, $_POST['prod_cat']);
            $prod_brand     =  mysqli_real_escape_string($con, $_POST['prod_brand']);
            $prod_price     =  mysqli_real_escape_string($con, $_POST['prod_price']);
            $prod_desc      =  mysqli_real_escape_string($con, $_POST['prod_desc']);
            $prod_key       =  mysqli_real_escape_string($con, $_POST['prod_key']);

            //GETTING IMAGE FORM THE FIELD
            $prod_image = $_FILES[mysqli_real_escape_string($con,'prod_image')]['name'];
            $prod_image_tmp = $_FILES['prod_image']['tmp_name'];

            move_uploaded_file($prod_image_tmp, "product_image/$prod_image");

            $query = "insert into products(product_cat,product_brand, product_title, product_price, product_desc, product_image, product_keywords)
                                values('$prod_cat', '$prod_brand', '$prod_title', '$prod_price', '$prod_desc', '$prod_image', '$prod_key')";

            $sql =  mysqli_query($con, $query);
            if($sql){
                echo "<script>alert('The Product successfully added to the data base');</script>";
            }else
                echo $sql;

            $con->close();
        }

?>



