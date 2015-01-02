
     myApp.controller("Products",['$scope', '$http', '$routeParams', function($scope, $http, $routeParams){

           $scope.category = $routeParams.category;

           $http.get("admin_area/api/files/products.php?category="+$scope.category).success(function(response){
                $scope.products = response;
            });

           $scope.find = function(){

             $http.get("api/files/find.php?search="+$scope.findValue).success(function(response){
                $scope.products = response;
            });

           };


          $(".products-menu").addClass("active");
           $(".home-menu").removeClass("active");
           $(".about-menu").removeClass("active");

     }]);



     myApp.controller("Product",['$scope', '$http', '$routeParams', function($scope, $http, $routeParams){


     	$scope.id = $routeParams.id || 1;

        $http.post("api/files/product.php?id="+$scope.id).success(function(response){
            $scope.product = response;
            
            });

     	  
     	  $(".products-menu").addClass("active");
          $(".home-menu").removeClass("active");
          $(".about-menu").removeClass("active");

     }]);

     myApp.controller("Home",['$scope', function($scope){
 	      
 	      $(".home-menu").addClass("active");
 	      $(".products-menu").removeClass("active");
          $(".about-menu").removeClass("active");


     }]);
    
    myApp.controller("About",['$scope', function($scope){
          
          $(".home-menu").removeClass("active");
          $(".products-menu").removeClass("active");
          $(".about-menu").addClass("active");


     }]);

    myApp.controller("Account",['$scope', function($scope){
          
          $(".home-menu").removeClass("active");
          $(".products-menu").removeClass("active");
          $(".about-menu").addClass("active");


     }]);

    myApp.controller("Login", ['$scope', function($scope){

      
    }])
