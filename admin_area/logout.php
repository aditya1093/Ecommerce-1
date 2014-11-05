<?php
	if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
	session_destroy();

	echo "<script> window.location='http://localhost:8888/e-commerce2/index.php' </script>;";
?>