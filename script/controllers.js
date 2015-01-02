  
  myApp.factory("Data", ['$http', function ($http) { 
        // This service connects to our REST API
        var root = {};
    
        root.get = function (path) {
            return $http.get(path).then(function (results) {
                return results;
            });
        };
        root.post = function (path, data) {
            return $http.post(path, data).then(function (results) {
                return results;
            });
        };

        return root;
}]);

  // CUSTOMER SERVICE FOR SETTING UP USER INFOMATION
  myApp.factory('Session', function($http, $cookieStore) {

     user = {email: '', firstname: '', lastname: ''};

      $http.get("api/files/session.php").success(function(data){
          if(data.email){
            $cookieStore.put('email' , data.email);
            $cookieStore.put('firstname' , data.firstname);
            $cookieStore.put('lastname' , data.lastname);
          }
      });
          return { user : user}
  });

  // CUSTOMER SERVICE FOR ADDING PRODUCTS TO CART
  myApp.factory('CartFunction', function($http) {
          root = {};

          root.addToCart = function(product){
             return $http.get('api/files/cart.php?id='+product, { cache: true });
          }

          return {root: root};
  });


  // HOME PAGE CONTROLLER
  myApp.controller("Home",['$scope', function($scope){

          angular.element("li[id$='-menu']").removeClass("active");
          angular.element("#home-menu").addClass("active");
  }]);
     
  // PRODUCTS PAGE CONTROLLER
  myApp.controller("Products",['$scope', '$http', '$routeParams','CartFunction' ,function($scope, $http, $routeParams, CartFunction){

           $scope.category = $routeParams.category;
           $scope.Cart = CartFunction.root;
    

           //GETTING PRODUCT FROM THE DATABASE BY CATEGORY
           $http.post("admin_area/functions/files/products.php", {category : $scope.category})
             .success(function(data){
                  $scope.products = data;
              });

           //GETING PRODUCTS FROM THE DATABASE BASE ON THE INPUT OF THE SEARCH INPUT FIELD
           $scope.find = function(){

             $http.post("api/files/find.php", { search : $scope.findValue })
               .success(function(response){
                  $scope.products = response;
              });

           };

           //UPDATING THE SHOPPING CART
           $scope.addToCart = function(product){
               $scope.Cart.addToCart(product).then(function(response){
                 console.log(response.data);
                 }); 
             }


           //ACTIVATING THE TAB ON THE MENUBAR
           angular.element("li[id$='-menu']").removeClass("active");
           angular.element("#products-menu").addClass("active");
  }]);


  //SINGLE PRODUCT PAGE CONTROLLER
  myApp.controller("Product",['$scope', '$http', '$routeParams','CartFunction' ,function($scope, $http, $routeParams, CartFunction){
   
      $scope.Cart = CartFunction.root;
     	$scope.id = $routeParams.id || 1;

      //GETTING SINGLE PRODUCT FROM THE DATABASE
      $http.post("api/files/product.php", {id : $scope.id}).success(function(response){
            $scope.product = response;
            
            });

     //UPDATING THE SHOPPING CART
     $scope.addToCart = function(product){
         $scope.Cart.addToCart(product).then(function(response){
               console.log(response.data);

           }); 
       }

  }]);

  // USER ACCCOUNT PAGE CONTROLLER
myApp.controller("Account",['$scope', '$http','Session', 'Data', '$location', '$cookieStore', 
                                  function($scope, $http, Session, Data, $location, $cookieStore){
        
        $scope.user = Session.user;

        if(!$cookieStore.get("user"))
            $location.path('/login');

        $scope.doLogout = function(){
            $cookieStore.remove("user");
            Data.get('api/files/logout.php').then(function (results) {
                 $location.path('/login');
            });
        }

        angular.element("li[id$='-menu']").removeClass("active");
        angular.element("#account-menu").addClass("active");
  }]);

  // LOGIN PAGE CONTROLLER
  myApp.controller("Login", ['$scope', '$http', 'Session',"$location", 'Data', '$cookieStore', 
                    function($scope, $http, Session, $location, Data, $cookieStore){

      $scope.user = Session.user;
      $scope.login = {};

        $scope.doLogin = function (user) {
              Data.post('api/files/login.php', user).then(function (results) {
                 var user = results.data;

                  if (user.email == $scope.user.email) {
                      $cookieStore.put('user' , {email: user.email, firstname:user.firstname, lastname:user.lastname});
                      $location.path('/account');
                      }
                  });
        };

       angular.element("li[id$='-menu']").removeClass("active");
       angular.element("#account-menu").addClass("active");
}]);

  //Registration CONTROLLER
  myApp.controller("Register",['$scope', '$http', '$location', function($scope, $http, $location){

      $scope.newUser = {firstname:"", lastname:"", email:"", captcha:"", password:""};
      $scope.reload = function(){
          $("#captcha-image").replaceWith('<img id="captcha-image" src="/ecommerce/api/captcha.php"/>');
        }

      $scope.register = function(user){  
                var response = $http.post("/ecommerce/api/files/register.php", user);
                response.success(function(data, status, headers, config) {
                      console.log(data);
                       if(data.status === 'success')
                          $location.path("/login");
                });
        }

      angular.element("li[id$='-menu']").removeClass("active");
      angular.element("#cart-account").addClass("active");
   }]);

  //SHOPPING CART CONTROLLER
  myApp.controller("Cart",['$scope', function($scope){

          angular.element("li[id$='-menu']").removeClass("active");
         angular.element("#cart-menu").addClass("active");
   
   }]);

  //CONTACT PAGE CONTROLLER
  myApp.controller("Contact",['$scope', function($scope){

         angular.element("li[id$='-menu']").removeClass("active");
         angular.element("#contact-menu").addClass("active");
   
   }]);

  //ABOUT US PAGE CONTROLLER
  myApp.controller("About",['$scope', "Session", '$cookieStore', function($scope, Session, $cookieStore){
      $scope.user = {};
      $scope.user = $cookieStore.get('user');
        
       angular.element("li[id$='-menu']").removeClass("active");
       angular.element("#about-menu").addClass("active");

   }]);










/*

  app.controller('authCtrl', function ($scope, $rootScope, $routeParams, $location, $http, Data) {
    //initially set those objects to null to avoid undefined error
    $scope.login = {};
    $scope.signup = {};
    $scope.doLogin = function (customer) {

        Data.post('login', {
            customer: customer
        }).then(function (results) {
            Data.toast(results);
            if (results.status == "success") {
                $location.path('dashboard');
            }
        });

    };
    $scope.signup = {email:'',password:'',name:'',phone:'',address:''};
    $scope.signUp = function (customer) {
        Data.post('signUp', {
            customer: customer
        }).then(function (results) {
            Data.toast(results);
            if (results.status == "success") {
                $location.path('dashboard');
            }
        });
    };
    $scope.logout = function () {
        Data.get('logout').then(function (results) {
            Data.toast(results);
            $location.path('login');
        });
    }
});
*/