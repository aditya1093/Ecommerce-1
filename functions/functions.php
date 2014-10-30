<?php

$localhost = 'localhost';
$username = 'root';
$password = 'root';
$database = 'e_commerce2';

///GETTING THE USER'S IP NUMBER
function getIpAddress(){
    $ip = $_SERVER['REMOTE_ADDR'];

    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {

        $ip = $_SERVER['HTTP_CLIENT_IP'];

    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];

    }
    return $ip;

}//END FUNCTION

//ADDING TO THE SHOPPING CART
function cart()
{
    global $localhost, $username, $password, $database;

    $quantity_prod = 0;

    //CHEKING IF THE USER CHOSE TO ADD THE PRODUCT CART
    if (isset($_GET['add_cart'])) {

        $ip = getIpAddress();
        $prod_id = $_GET['add_cart'];
        $con = new mysqli($localhost, $username, $password, $database);

        /* check connection */
        if ($con->connect_errno) {
            printf("Connect failed: %s\n", $con->connect_error);
            exit();
        }

        //CHECKING IF THE PRODUCT IS ON THE CART
        $check_prod = "select qty from cart where p_id='$prod_id' and ip_add='$ip'";
        $result = $con->query($check_prod);

        //MAKING SURE THAT THE PRODUCT DOES NOT EXIST ON THE CART

        if ($result->num_rows > 0) {

            $quantity = mysqli_fetch_array($result);
            $quantity_prod = intval($quantity['qty']) + 1;
            $get_quantity = "update cart set qty='$quantity_prod' where p_id='$prod_id'";
            $con->query($get_quantity);

        } //IF THE PRODUCT IS NOT ON THE CART INSERT IT AND GIVE IT A VALUE OF 1
        else {
            $insert_prod = "insert into cart(p_id, ip_add, qty) values('$prod_id', '$ip', '1')";
            $result = $con->query($insert_prod);
        }

        //REFRESHING THE PAGE
        echo "<script> window.open('index.php', '_self');</script>";
        $con->close();
    }
}//END OF FUNCTION

// USED TO DISPLAY TO TOTAL NUMBER OF ITEM ON THE PAGE
function total_items()
{

    global $localhost, $username, $password, $database;
    $con = new mysqli($localhost, $username, $password, $database);

    /* check connection */
    if ($con->connect_errno) {
        printf("Connect failed: %s\n", $con->connect_error);
        exit();
    }
    //ACCUMULATOR
    $total_item = 0;

    if (isset($_GET['add_cart'])) {
        $ip = getIpAddress();
        $query = "select qty from cart where ip_add='$ip'";
        $result = $con->query($query);

        while ($prod = mysqli_fetch_array($result)) {
            $total_item += intval($prod[0]);
        }

    } else {
        $ip = getIpAddress();
        $query = "select qty from cart where ip_add='$ip'";
        $result = $con->query($query);

        while ($prod = mysqli_fetch_array($result)) {
            $total_item += intval($prod[0]);
        }
        $result->close();
    }
    //echo ' <span>' . $total_item . '</span> ';

    $con->close();
    return $total_item;

}//END OF FUNCTION

//GETTING THE TOTAL PRICE OF THE ITEMS ON THE CART
function total_price()
{

    global $localhost, $username, $password, $database;
    $con = new mysqli($localhost, $username, $password, $database);

    /* check connection */
    if ($con->connect_errno) {
        printf("Connect failed: %s\n", $con->connect_error);
        exit();
    }

    $ip = getIpAddress();
    $query = "select p_id from cart where ip_add='$ip'";
    $result = $con->query($query);

    $total_price = 0;

    while ($p_price = mysqli_fetch_array($result)) {
        $product_id = $p_price['p_id'];

        $query1 = "select product_price from products where product_id = '$product_id'";
        $result1 = $con->query($query1);

        while ($product_price = mysqli_fetch_array($result1)) {
            $total_price += $product_price['product_price'];
        }

    }
   // echo ' $' . $total_price . ' ';

    $con->close();
    $result->close();

    return $total_price;
}//END OF FUNCTION


//Display information for the product in the cart page
function total_price_cart()
{

    global $localhost, $username, $password, $database;
    $con = new mysqli($localhost, $username, $password, $database);

    $ip = getIpAddress();

    $display = "<tbody>";

    /* check connection */
    if ($con->connect_errno) {
        printf("Connect failed: %s\n", $con->connect_error);
        exit();
    }

    if(isset($_POST['remove'])){

        foreach($_POST['remove'] as $remove_id){

            $query = "delete from cart where p_id='$remove_id' and ip_add='$ip'";
            $result = $con->query($query);

            if($result){
                echo "<script>window.open('cart.php', '_self');</script>";
            }
        }
    }

    $query = "select * from cart where ip_add='$ip'";
    $result = $con->query($query);

    $total_price = 0;

    $rows = $result->num_rows;

    if($rows == 0){
        $display = '<p class=lead style="font-size: 22px">Your cart is empty</p>';
    }

    while ($cart_info = mysqli_fetch_array($result)) {

        $product_quantity = $cart_info['qty'];
        $product_id = $cart_info['p_id'];

        $query1 = "select product_title, product_image, product_price, product_id from products where product_id = '$product_id'";
        $result1 = $con->query($query1);

        while ($product_info = mysqli_fetch_array($result1)) {

            $product_title = $product_info['product_title'];
            $product_image = $product_info['product_image'];
            $product_price = $product_info['product_price'];
            $total_price += $product_info['product_price'];
            $product_id = $product_info['product_id'];



            $display .= "</tbody>
                            <tr>
                                <td>
                                    <br/><input type='checkbox' name='remove[]' value='$product_id'/>
                                </td>
                                <td>
                                    <a href='details.php?prod_id=$product_id'>$product_title </a>
                                    <br/><img src='admin_area/product_image/$product_image' width='100' height='70'/>
                                </td>
                                <td>
                                    <br/>$product_quantity
                                </td>
                                <td>
                                    <br/>$$product_price
                                </td>
                            </tr>
                      ";
        }
        $result1->close();
    }
    $result->close();

    $display .= "<tr><td colspan='3' style='text-align:right'> Sub-Total: </td>
                    <td>$$total_price</td></tr></tbody>";

    $display .= "<tfoot>
                     <tr>
                    <td>
                        <input type='submit' name='update_cart' value='Update Cart' class='btn btn-md btn-primary cart_btn'/>
                    </td>
                    <td colspan='2'>
                        <a href='index.php' class='cart_btn'><p class='btn btn-md btn-primary'>Continue</p></a>
                    </td>
                    <td>
                        <a href='http://localhost:8888/e-commerce2/payement.php'class='cart_btn'><p class='btn btn-md btn-primary'>Checkout</p></a>
                    </td>
                    </tr>
                </tfoot>
                </form>";

    echo $display;

    $con->close();

}//END OF FUNCTION

function getCategories()
{
    global $localhost, $username, $password, $database;
    $con = new mysqli($localhost, $username, $password, $database);

    /* check connection */
    if ($con->connect_errno) {
        printf("Connect failed: %s\n", $con->connect_error);
        exit();
    }

    $query = "select cat_id, cat_title from categories";
    $result = $con->query($query);

    while ($row = mysqli_fetch_array($result)) {
        $cat_id = $row['cat_id'];
        $cat_title = $row['cat_title'];

        echo "<li><a href='index.php?cat_id=$cat_id'>$cat_title</a></li>";
    }
    $result->close();
    $con->close();
}  // END OF FUNCTION

function getBrands()
{

    global $localhost, $username, $password, $database;
    $con = new mysqli($localhost, $username, $password, $database);

    /* check connection */
    if ($con->connect_errno) {
        printf("Connect failed: %s\n", $con->connect_error);
        exit();
    }

    $query = "select brand_id, brand_title from brands";
    $result = $con->query($query);

    while ($row = mysqli_fetch_array($result)) {
        $brand_id = $row['brand_id'];
        $brand_title = $row['brand_title'];

        echo "<li><a href='index.php?brand_id=$brand_id'>$brand_title</a></li>";
    }

    $result->close();
    $con->close();

}  // END OF FUNCTION

function getCategory_admin_area()
{
    global $localhost, $username, $password, $database;
    $con = new mysqli($localhost, $username, $password, $database);

    /* check connection */
    if ($con->connect_errno) {
        printf("Connect failed: %s\n", $con->connect_error);
        exit();
    }

    $query = "select cat_id, cat_title from categories";
    $result = $con->query($query);

    while ($row = mysqli_fetch_array($result)) {
        $cat_id = $row['cat_id'];
        $cat_title = $row['cat_title'];

        echo "<option value='$cat_id' > $cat_title </option>";
    }

    $result->close();
    $con->close();
}  // END OF FUNCTION

// BRAND TO DISPLAY IN THE ADMIN PAGE
function getBrand_admin_page()
{
    global $localhost, $username, $password, $database;
    $con = new mysqli($localhost, $username, $password, $database);

    /* check connection */
    if ($con->connect_errno) {
        printf("Connect failed: %s\n", $con->connect_error);
        exit();
    }

    $query = "select brand_id, brand_title from brands";
    $result = $con->query($query);

    while ($row = mysqli_fetch_array($result)) {
        $brand_id = $row['brand_id'];
        $brand_title = $row['brand_title'];

        echo "<option value='$brand_id'>$brand_title</option>";
    }

    $result->close();
    $con->close();
}  // END OF FUNCTION

// BRAND TO DISPLAY IN THE ADMIN PAGE
function getProducts()
{

    if (!isset($_GET['brand_id']) && !isset($_GET['cat_id'])) {

        global $localhost, $username, $password, $database;
        $con = new mysqli($localhost, $username, $password, $database);

        /* check connection */
        if ($con->connect_errno) {
            printf("Connect failed: %s\n", $con->connect_error);
            exit();
        }

        $query = "select product_id, product_title, product_price, product_image from products order by rand()";
        $result = $con->query($query);

        while ($row = mysqli_fetch_array($result)) {
            $prod_id = $row['product_id'];
            $prod_title = $row['product_title'];
            $prod_price = $row['product_price'];
            $prod_image = $row['product_image'];

            echo "<div id='single_product'>
                    <h3> $prod_title </h3>
                    <img src='admin_area/product_image/$prod_image' width='180' height='155'/>
                    <p><b>$ $prod_price </b></p>
                    <a href='details.php?prod_id=$prod_id' style='float:left;' class='pull-left'> Details </a>
                    <a href='index.php?add_cart=$prod_id'><button style='float:right;' class='pull-right'> Add to Cart </button></a>
                    </div>
            ";
        }

        $result->close();
        $con->close();
    } else if (isset($_GET['brand_id'])) {

        global $localhost, $username, $password, $database;

        $brand_id = $_GET['brand_id'];
        $con = new mysqli($localhost, $username, $password, $database);

        /* check connection */
        if ($con->connect_errno) {
            printf("Connect failed: %s\n", $con->connect_error);
            exit();
        }

        $query = "select product_id, product_title, product_price, product_image from products where product_brand='$brand_id'";
        $result = $con->query($query);

        while ($row = mysqli_fetch_array($result)) {
            $prod_id = $row['product_id'];
            $prod_title = $row['product_title'];
            $prod_price = $row['product_price'];
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
        $result->close();
        $con->close();

    } else if (isset($_GET['cat_id'])) {
        global $localhost, $username, $password, $database;

        $cat_id = $_GET['cat_id'];
        $con = new mysqli($localhost, $username, $password, $database);

        /* check connection */
        if ($con->connect_errno) {
            printf("Connect failed: %s\n", $con->connect_error);
            exit();
        }

        $query = "select * from products where product_brand='$cat_id'";
        $result = $con->query($query);

        while ($row = mysqli_fetch_array($result)) {
            $prod_id = $row['product_id'];
            $prod_title = $row['product_title'];
            // $prod_cat = $row['product_cat'];
            // $prod_brand = $row['product_brand'];
            $prod_price = $row['product_price'];
            // $prod_desc = $row['product_desc'];
            // $prod_key = $row['product_keywords'];
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
        $result->close();
        $con->close();
    }


}  // END OF FUNCTION

function getDetail($id)
{

    if (isset($id)) {

        global $localhost, $username, $password, $database;
        $con = new mysqli($localhost, $username, $password, $database);

        /* check connection */
        if ($con->connect_errno) {
            printf("Connect failed: %s\n", $con->connect_error);
            exit();
        }

        $query = "select * from products where product_id = $id";
        $result = $con->query($query);

        while ($row = mysqli_fetch_array($result)) {
            $prod_id = $row['product_id'];
            $prod_title = $row['product_title'];
            //   $prod_cat = $row['product_cat'];
            //   $prod_brand = $row['product_brand'];
            $prod_price = $row['product_price'];
            $prod_desc = $row['product_desc'];
            //    $prod_key = $row['product_keywords'];
            $prod_image = $row['product_image'];

            echo "<div id='single_product' style='margin-left: 150px; margin-top:80px'>
                    <h3> $prod_title </h3>
                    <p class='lead' style='font-size: 18px'>$prod_desc</p>
                    <img src='admin_area/product_image/$prod_image' width='350' height='270'/>
                    <p style='font-size: 18px'><b>$ $prod_price </b></p>
                    <span style='display: inline-block;' class='pull-left'><a href='index.php' style='font-size: 20px; text-decoration: underline'> Home Page </a></span>
                    <span class='pull-right'><a href='index.php?prod_id=$prod_id'><button> Add to Cart </button></a><span>
                </div>
            ";
        }

        $result->close();
        $con->close();
    }
}  // END OF FUNCTION

//FUNCTION USED TO ADD NEW PRODUCT TO THE DATABASE FROM THE ADMIN AREA
function submit_info_admin_page($submit)
{
    if (isset($submit)) {

        global $localhost, $username, $password, $database;
        $con = new mysqli($localhost, $username, $password, $database);

        /* check connection */
        if ($con->connect_errno) {
            printf("Connect failed: %s\n", $con->connect_error);
            exit();
        }
        //GETTING TEXT DATA FROM THE FIELD
        $prod_title = mysqli_real_escape_string($con, $_POST['prod_title']);
        $prod_cat = mysqli_real_escape_string($con, $_POST['prod_cat']);
        $prod_brand = mysqli_real_escape_string($con, $_POST['prod_brand']);
        $prod_price = mysqli_real_escape_string($con, $_POST['prod_price']);
        $prod_desc = mysqli_real_escape_string($con, $_POST['prod_desc']);
        $prod_key = mysqli_real_escape_string($con, $_POST['prod_key']);

        //GETTING IMAGE FORM THE FIELD
        $prod_image = $_FILES[mysqli_real_escape_string($con, 'prod_image')]['name'];
        $prod_image_tmp = $_FILES['prod_image']['tmp_name'];

        move_uploaded_file($prod_image_tmp, "product_image/$prod_image");

        $query = "insert into products(product_cat,product_brand, product_title, product_price, product_desc, product_image, product_keywords)
                                values('$prod_cat', '$prod_brand', '$prod_title', '$prod_price', '$prod_desc', '$prod_image', '$prod_key')";

        $sql = mysqli_query($con, $query);
        if ($sql) {
            echo "<script>alert('The Product successfully added to the data base');</script>";
        } else
            echo $sql;

        $con->close();
    }

}//END FUNCTION


//FUNCTION ADDS A NEW CUTOMER TO THE DATABASE
function register_new_customer($new_customer)
{
    
        global $localhost, $username, $password, $database;
        $con = new mysqli($localhost, $username, $password, $database);

        /* check connection */
        if ($con->connect_errno) {
            printf("Connect failed: %s\n", $con->connect_error);
            exit();
        }
        
        //GETTING TEXT DATA FROM THE FIELD

        $result = $con->query($new_customer);
                                
        if ($result) {

            echo "<script>alert('Account has been created successfully')</script>";
        } 

        $con->close();
}//END FUNCTION


//FUNCTION CHECKS IF THE CART HAS SOME ITEMS TO REDIRECT THE USER TO THE THEIR ACCOUNT OR TO THE 
//CHECK OUT PAGE
function check_cart($check, $customer_email, $customer_name)
{
        $_SESSION['customer_email'] = $customer_email;
        $_SESSION['customer_name'] = $customer_name;
    

        global $localhost, $username, $password, $database;
        $con = new mysqli($localhost, $username, $password, $database);

        /* check connection */
        if ($con->connect_errno) {
            printf("Connect failed: %s\n", $con->connect_error);
            exit();
        }
        //GETTING TEXT DATA FROM THE FIELD

        $result = $con->query($check);
        if($result->num_rows == 0){
            
            echo "<script>window.location = http://localhost:8888/e-commerce2/customer/my_account.php';</script>";
        }
        else{

            echo "<script>window.location = 'http://localhost:8888/e-commerce2/cart.php';</script>";
        }
                                
        $con->close();

}//END FUNCTION

//GET THE INFORMATION OF THE CUSTOMER
function getCustomer($id){
        global $localhost, $username, $password, $database;
        $con = new mysqli($localhost, $username, $password, $database);

        /* check connection */
        if ($con->connect_errno) {
            printf("Connect failed: %s\n", $con->connect_error);
            exit();
        }
        $query = "select * from customers where customer_id = $id";
        $result = $con->query($query);

        $customer_result = mysqli_fetch_array($result);
        $customer = array('name' => $customer_result['customer_name'], 'email' => $customer_result['customer_email'],
                            'password' => $customer_result['customer_password'],
                            'country' => $customer_result['customer_country'],
                            'city' => $customer_result['customer_city'],
                            'contact' => $customer_result['customer_contact'],
                            'address' => $customer_result['customer_address'] );

        $result->close();
        $con->close();
        return $customer;
}//END OF CUSTOMER


function edit_customer($edit_customer){

 global $localhost, $username, $password, $database;
        $con = new mysqli($localhost, $username, $password, $database);

        /* check connection */
        if ($con->connect_errno) {
            printf("Connect failed: %s\n", $con->connect_error);
            exit();
        }
        //GETTING TEXT DATA FROM THE FIELD

        $result = $con->query($edit_customer);

        $con->close();
}//END FUNCTION

//CHECK AND CHANGE THE CUSTOMER'S PASSWORD
function checkPassword($id, $c_password, $new_password){

        global $localhost, $username, $password, $database;
        $con = new mysqli($localhost, $username, $password, $database);

        /* check connection */
        if ($con->connect_errno) {
            printf("Connect failed: %s\n", $con->connect_error);
            exit();
        }
        $query = "select customer_password from customers where customer_id = $id";
        $result1 = $con->query($query);

        $pass = mysqli_fetch_array($result1);
        $customer_password = $pass['customer_password'];

        if($c_password==$customer_password){
            $con = new mysqli($localhost, $username, $password, $database);

            /* check connection */
            if ($con->connect_errno) {
               printf("Connect failed: %s\n", $con->connect_error);
               exit();
            }
            $query = "update customers set customer_password='$new_password' where customer_id = $id";
            $result2 = $con->query($query);
            $response = 'success';
        }else
            $response = 'failure';


        $result1->close();
        $con->close();
        return $response;
}//END OF CUSTOMER
function remove_customer($c_id){
       global $localhost, $username, $password, $database;
        $con = new mysqli($localhost, $username, $password, $database);

        /* check connection */
        if ($con->connect_errno) {
            printf("Connect failed: %s\n", $con->connect_error);
            exit();
        }
        $query = "delete from customers where customer_id = $c_id";
        $result1 = $con->query($query);

        $con->close();

}
