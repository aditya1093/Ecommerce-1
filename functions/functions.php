<?php

    function getIp() {

        $ip = $_SERVER['REMOTE_ADDR'];

        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {

            $ip = $_SERVER['HTTP_CLIENT_IP'];

        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {

            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];

        }
        return $ip;
    }

    function cart(){

        if(isset($_GET['add_cart'])) {

            $ip = getIp();
            $prod_id = $_GET['add_cart'];

            $con = new mysqli("localhost", "root", "root", "e_commerce2");
            /* check connection */
            if ($con->connect_errno) {
                printf("Connect failed: %s\n", $con->connect_error);
                exit();
            }

            $chech_prod = "select * from cart where p_id='$prod_id' and ip_add='$ip'";
            $sql = $con->query($chech_prod);

            if($sql->num_rows > 0){
                echo "";
            }
            else{
                $insert_prod = "insert into cart(p_id, ip_add) values('$prod_id', '$ip')";
                $query = $insert_prod;
                $sql = $con->query($query);

                echo "<script> window.open('index.php', self);</script>";

            }


            $con->close();
        }
    }//END OF FUNCTION




    function getCategories(){

         $con = new mysqli("localhost", "root", "root", "e_commerce2");
        /* check connection */
        if ($con->connect_errno) {
        printf("Connect failed: %s\n", $con->connect_error);
        exit();
        }

        $query = "select cat_id, cat_title from categories";
        $sql =  $con->query($query);
        
        while($row = mysqli_fetch_array($sql)){
            $cat_id = $row['cat_id'];
            $cat_title = $row['cat_title'];
            
            echo "<li><a href='index.php?cat_id=$cat_id'>$cat_title</a></li>";
        }
        $sql->close();
        $con->close();

    }  // END OF FUNCTION


    function getBrands(){
         $con = new mysqli("localhost", "root", "root", "e_commerce2");
        /* check connection */
        if ($con->connect_errno) {
        printf("Connect failed: %s\n", $con->connect_error);
        exit();
        }

        $query = "select brand_id, brand_title from brands";
        $sql =  $con->query($query);
        
        while($row = mysqli_fetch_array($sql)){
            $brand_id = $row['brand_id'];
            $brand_title = $row['brand_title'];
            
            echo "<li><a href='index.php?brand_id=$brand_id'>$brand_title</a></li>";
        }
        $sql->close();
        $con->close();
    }  // END OF FUNCTION

    function getCatergories_admin_area(){
         $con = new mysqli("localhost", "root", "root", "e_commerce2");
        /* check connection */
        if ($con->connect_errno) {
        printf("Connect failed: %s\n", $con->connect_error);
        exit();
        }

        $query = "select cat_id, cat_title from categories";
        $sql =  $con->query($query);
        
        while($row = mysqli_fetch_array($sql)){
            $cat_id = $row['cat_id'];
            $cat_title = $row['cat_title'];
            
            echo "<option value='$cat_id' > $cat_title </option>";
        }
        $sql->close();
        $con->close();
    }  // END OF FUNCTION

        // BRAND TO DISPLAY IN THE ADMIN PAGE
        function getBran(){
         $con = new mysqli("localhost", "root", "root", "e_commerce2");
        /* check connection */
        if ($con->connect_errno) {
        printf("Connect failed: %s\n", $con->connect_error);
        exit();
        }

        $query = "select brand_id, brand_title from brands";
        $sql =  $con->query($query);
        
        while($row = mysqli_fetch_array($sql)){
            $brand_id = $row['brand_id'];
            $brand_title = $row['brand_title'];
            
            echo "<option value='$brand_id'>$brand_title</option>";
        }
        $sql->close();
        $con->close();
    }  // END OF FUNCTION

    // BRAND TO DISPLAY IN THE ADMIN PAGE
    function getProducts(){

        if(!isset($_GET['brand_id']) && !isset($_GET['cat_id'])) {

            $con = new mysqli("localhost", "root", "root", "e_commerce2");
            /* check connection */
            if ($con->connect_errno) {
                printf("Connect failed: %s\n", $con->connect_error);
                exit();
            }

            $query = "select * from products order by product_title";
            $sql = $con->query($query);

            while ($row = mysqli_fetch_array($sql)) {
                $prod_id = $row['product_id'];
                $prod_title = $row['product_title'];
                $prod_cat = $row['product_cat'];
                $prod_brand = $row['product_brand'];
                $prod_price = $row['product_price'];
                $prod_desc = $row['product_desc'];
                $prod_key = $row['product_keywords'];
                $prod_image = $row['product_image'];

                echo "<div id='single_product'>
                    <h3> $prod_title </h3>
                    <img src='admin_area/product_image/$prod_image' width='200' height='160'/>
                    <p><b>$ $prod_price </b></p>
                    <a href='details.php?prod_id=$prod_id' style='float:left;'> Details </a>
                    <a href='index.php?add_cart=$prod_id'><button style='float:right;'> Add to Cart </button></a>
                    </div>
            ";
            }

            $sql->close();
            $con->close();
        }

           else if(isset($_GET['brand_id'])) {

                $brand_id = $_GET['brand_id'];
                $con = new mysqli("localhost", "root", "root", "e_commerce2");
                /* check connection */
                if ($con->connect_errno) {
                    printf("Connect failed: %s\n", $con->connect_error);
                    exit();
                }

                $query = "select * from products where product_brand='$brand_id'";
                $sql = $con->query($query);

                while ($row = mysqli_fetch_array($sql)) {
                    $prod_id = $row['product_id'];
                    $prod_title = $row['product_title'];
                    $prod_cat = $row['product_cat'];
                    $prod_brand = $row['product_brand'];
                    $prod_price = $row['product_price'];
                    $prod_desc = $row['product_desc'];
                    $prod_key = $row['product_keywords'];
                    $prod_image = $row['product_image'];

                    echo "<div id='single_product'>
                        <h3> $prod_title </h3>
                        <img src='admin_area/product_image/$prod_image' width='200' height='160'/>
                        <p><b>$ $prod_price </b></p>
                        <a href='details.php?prod_id=$prod_id' style='float:left;'> Details </a>
                        <a href='index.php?prod_id=$prod_id'><button style='float:right;'> Add to Cart </button></a>
                        </div>
            ";
                }
                $sql->close();
                $con->close();
            }

           else if(isset($_GET['cat_id'])) {

               $cat_id = $_GET['cat_id'];
               $con = new mysqli("localhost", "root", "root", "e_commerce2");
               /* check connection */
               if ($con->connect_errno) {
                   printf("Connect failed: %s\n", $con->connect_error);
                   exit();
               }

               $query = "select * from products where product_brand='$cat_id'";
               $sql = $con->query($query);

               while ($row = mysqli_fetch_array($sql)) {
                   $prod_id = $row['product_id'];
                   $prod_title = $row['product_title'];
                   $prod_cat = $row['product_cat'];
                   $prod_brand = $row['product_brand'];
                   $prod_price = $row['product_price'];
                   $prod_desc = $row['product_desc'];
                   $prod_key = $row['product_keywords'];
                   $prod_image = $row['product_image'];

                   echo "<div id='single_product'>
                        <h3> $prod_title </h3>
                        <img src='admin_area/product_image/$prod_image' width='200' height='160'/>
                        <p><b>Price: $$prod_price </b></p>
                        <a href='details.php?prod_id=$prod_id' style='float:left;'> Details </a>
                        <a href='index.php?prod_id=$prod_id'><button style='float:right;'> Add to Cart </button></a>
                        </div>
            ";
               }
               $sql->close();
               $con->close();
           }





}  // END OF FUNCTION
function getDetail($id){

    if(isset($id)) {
        $con = new mysqli("localhost", "root", "root", "e_commerce2");
        /* check connection */
        if ($con->connect_errno) {
            printf("Connect failed: %s\n", $con->connect_error);
            exit();
        }

        $query = "select * from products where product_id = $id";
        $sql = $con->query($query);

        while ($row = mysqli_fetch_array($sql)) {
            $prod_id = $row['product_id'];
            $prod_title = $row['product_title'];
            $prod_cat = $row['product_cat'];
            $prod_brand = $row['product_brand'];
            $prod_price = $row['product_price'];
            $prod_desc = $row['product_desc'];
            $prod_key = $row['product_keywords'];
            $prod_image = $row['product_image'];

            echo "<div id='single_product' style='margin-left: 150px; margin-top:80px'>
                    <h3> $prod_title </h3>
                    <img src='admin_area/product_image/$prod_image' width='350' height='250'/>
                    <p><b>$ $prod_price </b></p>
                    <span style='display: inline-block;'><a href='index.php' style='font-size: 20px; color:yellowgreen; text-align: left;'> Home Page </a></span>
                    <span><a href='index.php?prod_id=$prod_id'><button style='float:right;'> Add to Cart </button></a><span>
                </div>
            ";
        }

        $sql->close();
        $con->close();
    }
}  // END OF FUNCTION

?>



       