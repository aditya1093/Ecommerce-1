<?php

     header('Content-Type: application/json'); 
     include "../functions.php";

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

        $products = array();
        $product = array();

        while ($row = mysqli_fetch_array($result)) {
            $product['id'] = $row['product_id'];
            $product['title'] = $row['product_title'];
            $product['price'] = $row['product_price'];
            $product['image'] = $row['product_image'];
            $product['description'] = $row['product_desc'];
            $product['brand']= $row['product_brand'];
            $product['category'] = $row['product_cat'];

            array_push($products, $product);

        }

        $con->close();
        echo json_encode($products);

?>