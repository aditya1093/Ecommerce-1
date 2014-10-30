<?php
	if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
	$id = getIpAddress();

	$guest = "Guest";
	$login = "<a href='http://localhost:8888/e-commerce2/customer/customer_login.php'>Login!</a>";
	$total_price = total_price();
	$total_items = total_items();

	if(isset($_SESSION['customer_name'])){

		$guest = $_SESSION['customer_email'];
		$name = $_SESSION['customer_name'];

		$login = "<a href='http://localhost:8888/e-commerce2/customer/customer_logout.php'>Logout!</a>";
	}
?>     
        <span id='shopping_text'> <?php echo 'Welcome '.$guest;?> - <?php echo $login;?> -
        <span style="color: yellowgreen;">
         <a href="cart.php">Shopping Cart</a> </span> - </b>
        Total Items: <?php echo $total_items ?> - Total Price: <?php echo '$'.$total_price ?> -
        <a href="index.php"> Back to Shop </a>&nbsp;&nbsp;</span>