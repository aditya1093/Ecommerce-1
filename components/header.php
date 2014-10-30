<?php
if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
?>

<?php

    $display = "<html>
    			<head>
                     <meta charset='UTF-8'>
                    <meta name='viewport' content='width=device-width, initial-scale=1.0''>
                     <title>Home Page</title>
                     <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css'>
                     <link href='http://fonts.googleapis.com/css?family=Quattrocento+Sans' rel='stylesheet' type='text/css'>
                     <link rel='stylesheet' href='styles/style.css'>
              </head>"; 

    echo $display;