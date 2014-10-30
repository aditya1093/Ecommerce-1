<!DOCTYPE html>
<html lang="">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Product</title>
    <link rel="stylesheet" href="styles/style.css">
    <link href='http://fonts.googleapis.com/css?family=Quattrocento+Sans' rel='stylesheet' type='text/css'>
</head>
<?php  require '../functions/functions.php'; ?>
<body>

    <div class="main_wrapper" style="min-height: 300px;">
            <img src="../images/ad_banner.jpg" class="img-responsive" width="100%" height="250">
            <img src="images/administrator-icon.png" class="img-responsive"  style="float: left;" />
    
        <div class="content">
            <p style="font-size: 55px; margin-top: 85px; font-family:sans-serif; line-height: 1.8em" align="center"> Welcome to the Admin Area </p>
        </div>

        <div class="sidebar"> 
        <h1> Manage Content </h1>
            <ul>
                <li><a href="insert_product.php">Insert New Product</a></li>
                <li><a href="view_product.php">View All Products</a></li>
                <li><a href="insert_category.php">Insert new Category</a></li>
                <li><a href="insert_brand.php">Insert New Brands</a></li>
                <li><a href="view_customers.php">View Customers</a></li>
                <li><a href="view_orders.php">View Orders</a></li>
                <li><a href="insert_payment.php">View Payment</a></li>
                <li><a href="logout.php">Admin Logout</a></li>
             </ul>
        </div>




        <!-- FOOTER STARTS HERE -->
        <?php include "../components/footer.php";?>
        <!-- END OF FOOTER -->

    </div>
    <!-- END OF THE PAGE -->
</body>
</html>
