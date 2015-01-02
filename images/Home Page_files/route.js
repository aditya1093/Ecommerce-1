    
    
    myApp = angular.module("myApp", ["ngRoute"]);

    myApp.config(function($routeProvider){

    	$routeProvider

    	.when("/", {

    		templateUrl: "home.php",
        	controller: "Home"
    	})
   	    .when("/product/:id", {
    		
    		templateUrl: "product.php",
        	controller: "Product"
    	})
    	.when("/products/:category", {
    		
    		templateUrl: "products.php",
        	controller: "Products"
    	})
        .when("/about", {
            
            templateUrl: "about.php",
            controller: "About"
        })
        .when("/login", {

            templateUrl: "customer/login.php",
            controller: 'Login'
        })

         .when("/account", {
            
            templateUrl: "customer/account.php",
            controller: "Account",
            redirectTo: function(routeParams, path, search){
              console.log(routeParams, path, search);
        
                return "/login";
            }
        })
        .otherwise("/error-page", {
            redirectTo: "error-page.php"
        })
    });

