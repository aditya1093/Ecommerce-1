    myApp = angular.module("myApp", ["ngRoute", 'ngCookies']);

    myApp.config(function($routeProvider){

    	$routeProvider

    	.when("/", {
    		templateUrl: "views/home.html",
        	controller: "Home"
    	})
   	    .when("/product/:id", {
    		
    		templateUrl: "views/product.html",
        	controller: "Product"
    	})
    	.when("/products/:category", {
    		
    		templateUrl: "views/products.html",
        	controller: "Products"
    	})
   
        .when("/login", {

            templateUrl: "views/login.html",
            controller: 'Login'
        })
        .when("/register", {

            templateUrl: "views/register.html",
            controller: 'Register'
        })

         .when("/account", {
            
            templateUrl: "views/account.html",
            controller: "Account",

        })
        .when("/cart", {
            
            templateUrl: "views/cart.html",
            controller: "Cart"
        })

        .when("/about", {
            
            templateUrl: "views/about.html",
            controller: "About"
        })
        .when("/contact", {
            
            templateUrl: "views/contact.html",
            controller: "Contact"
        })

         .otherwise({
             redirectTo: "/"
       });
    });







