<?php

    $display = " <div class='menubar'>
        <!--START OF MENU -->
        <ul id='menu'>
            <li><a href='http://localhost:8888/e-commerce2/index.php'>Home</a></li>
            <li><a href='http://localhost:8888/e-commerce2/all_products.php'>All Products</a></li>
            <li><a href='http://localhost:8888/e-commerce2/customer/my_account.php'>My Account</a></li>
            <li><a href='http://localhost:8888/e-commerce2/customer/customer_register.php'>Sign Up</a></li>
            <li><a href='http://localhost:8888/e-commerce2/cart.php'>Shopping Cart</a></li>
            <li><a href='http://localhost:8888/e-commerce2/contact.php'>Contact Us</a></li>
        </ul>
        <!-- END OF MENU -->

            <form method='get' action='results.php'>
                <input type='text' name='user_query' placeholder='Find Product' style='color: black;' />
                <input value='Find' type='submit' style='color: white; background-color: cornflowerblue; height: 25px'/>
            </form>

    </div>";

    echo $display;
