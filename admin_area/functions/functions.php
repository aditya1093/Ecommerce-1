<?php

/*
$host = "localhost";
$username = "barry";
$password = 'Amadou90';
$database =  "ecommerce"; 
*/

$localhost = 'localhost';
$username = 'root';
$password = 'root';
$database = 'ecommerce';

//Inserting new product in the database
function insert_new_product($product)
{

    $p_title = $product[0];
    $p_category =  $product[1];
    $p_brand =  $product[2];
    $p_image =  $product[3];
    $p_price =  $product[4];
    $p_description = $product[5];
    $p_keyword =  $product[6];

    global $localhost, $username, $password, $database;
    $con = new mysqli($localhost, $username, $password, $database);

    
    /* check connection */
    if ($con->connect_errno) {
        printf("Connect failed: %s\n", $con->connect_error);
        exit();
    }

    $query = "insert into products(product_title, product_brand, product_cat, product_price, product_image, product_keywords, product_desc)
              values('$p_title', '$p_brand', '$p_category', '$p_price', '$p_image', '$p_keyword', '$p_description');";
    $result = $con->query($query);

    $con->close();
    return $result;
}  // END OF FUNCTION

//Adding new category to the database
function insert_new_categories($new_category)
{
    global $localhost, $username, $password, $database;
    $con = new mysqli($localhost, $username, $password, $database);

    /* check connection */
    if ($con->connect_errno) {
        printf("Connect failed: %s\n", $con->connect_error);
        exit();
    }
    $check = "select count(*) count from categories where cat_title like '$new_category'";
    $result = $con->query($check);

    while ($row = mysqli_fetch_array($result))
        $count = $row['count'];
     
     $result = false;
    if($count==0){
        $query = "insert into categories(cat_title) values('$new_category')";
        $result = $con->query($query);
    }

    $con->close();
    return $result;
}  // END OF FUNCTION


function insert_new_brand($new_brand)
{
    global $localhost, $username, $password, $database;
    $con = new mysqli($localhost, $username, $password, $database);

    /* check connection */
    if ($con->connect_errno) {
        printf("Connect failed: %s\n", $con->connect_error);
        exit();
    }
    $check = "select count(*) count from brands where brand_title like '$new_brand'";
    $result = $con->query($check);

    while ($row = mysqli_fetch_array($result))
        $count = $row['count'];
     
     $result = false;
    if($count==0){
        $query = "insert into brands(brand_title) values('$new_brand')";
        $result = $con->query($query);
    }

    $con->close();
    return $result;
}  // END OF FUNCTION


function get_products_for_admin(){
     global $localhost, $username, $password, $database;
        $con = new mysqli($localhost, $username, $password, $database);

        /* check connection */
        if ($con->connect_errno) {
            printf("Connect failed: %s\n", $con->connect_error);
            exit();
        }

        $query = "select product_id, product_title, product_brand, product_cat, product_price, product_image, product_desc from products 
        order by product_id asc";
        $result = $con->query($query);

        $display = '';

        while ($row = mysqli_fetch_array($result)) {
            $prod_id = $row['product_id'];
            $prod_title = $row['product_title'];
            $prod_price = $row['product_price'];
            $prod_image = $row['product_image'];
            $prod_desc = $row['product_desc'];
            $prod_brand = $row['product_brand'];
            $prod_cat = $row['product_cat'];

            $display .= "     <tr>
                                <td style='padding: 0px;'>
                                    <dl class='dl-horizontal' style='padding: 0px; margin-left: -60px; padding-right: 10px;'>
                                        <dt> Title: </dt>
                                            <dd> $prod_title </dd>
                                        <dt> Category: </dt>
                                            <dd> $prod_cat </dd>
                                        <dt> Brand: </dt>
                                            <dd> $prod_brand </dd>
                                        <dt> Price: </dt>
                                             <dd> $prod_price </dd>
                                    </dl>
                                </td>
                                <td class='description'>$prod_desc</td>
                                <td class='text-center'> <img src='product_image/$prod_image' width='100' height='80'/> </td>
                              </tr>";
        }

        echo $display;
}

function get_categories_for_admin(){

global $localhost, $username, $password, $database;
        $con = new mysqli($localhost, $username, $password, $database);

        /* check connection */
        if ($con->connect_errno) {
            printf("Connect failed: %s\n", $con->connect_error);
            exit();
        }

        $query = "select cat_id, cat_title from categories";
        $result = $con->query($query);

        $display = "";

        while ($row = mysqli_fetch_array($result)) {
            $cat_title = $row['cat_title'];
            $display .= '     <tr>
                                <td>'.$cat_title.'</td>
                                <td class="action"> <span id="edit" class="text-center"> Edit </span>
                                     <span id="remove" class="text-center"> Remove </span> </td>
                              </tr>';
        }
        echo $display;
        $con->close();
}

function get_brands_for_admin(){

global $localhost, $username, $password, $database;
        $con = new mysqli($localhost, $username, $password, $database);

        /* check connection */
        if ($con->connect_errno) {
            printf("Connect failed: %s\n", $con->connect_error);
            exit();
        }

        $query = "select brand_id, brand_title from brands";
        $result = $con->query($query);

        $display = "";

        while ($row = mysqli_fetch_array($result)) {
            $brand_title = $row['brand_title'];
            $display .= '     <tr>
                                <td>'.$brand_title.'</td>
                                  <td class="action"> <span id="edit" class="text-center"> Edit </span>
                                     <span id="remove" class="text-center"> Remove </span> </td>
                              </tr>';
        }
        echo $display;

        $con->close();
}

function check_admin($admin_email, $admin_password){

    global $localhost, $username, $password, $database;
        $con = new mysqli($localhost, $username, $password, $database);

        /* check connection */
        if ($con->connect_errno) {
            printf("Connect failed: %s\n", $con->connect_error);
            exit();
        }

        $query = "select admin_id, admin_email, admin_name from admin where 
                    admin_password='$admin_password' and admin_email='$admin_email'";
        $result = $con->query($query);

        if($result->num_rows==0){
            echo "<script> alert('Your email and password do not match.');</script>;";
        }

        else{
            
            while ($n = mysqli_fetch_array($result)) {
                $name = $n['admin_name'];
                $id  = $n['admin_id'];
                $email  = $n['admin_email'];
            }

            $_SESSION['admin_name'] = $name;
            $_SESSION['admin_email'] = $email;
            $_SESSION['admin_id'] = $id;

             echo "<script> window.location ='./index.php';</script>";
        }

        $con->close();
}




?>