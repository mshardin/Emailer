var app = angular.module('Emailer', []);

app.controller('MainCtrl', function($scope, $http) {

  $scope.orderss = [
    {"name": "tester", "email": "trinisoljah@yahoo.com"},
    {"name": "tester2", "email": "trini@yahoo.com"},
    {"name": "tester3", "email": "aloha@gmail.com"},
    {"name": "tester4", "email": "12345@gmail.com"},
    {"name": "tester5", "email": "testing@yahoo.com"},
    {"name": "tester6", "email": "iphonefreak@hotmail.com"}
  ];
   
  $scope.orders = [];

  $scope.getOrders = function() {

    $http.get('orders.json')

      .then(function(response) {

        $scope.orders = response.data;
        console.log(response.data);

      });

  }
  
  $scope.sendEmail = function() {

  	$scope.orders.push({ name: $scope.name, email: $scope.email });

  	var request = $http({

  		method: "post",
  		url: window.location.href + "createOrders.php",
  		data: {
  			name: $scope.name,
  			email: $scope.email
  		},
  		header: { 
        'Content-Type': 'application/x-www-form-urlencoded', 
        'Access-Control-Allow-Origin': '*', 
        'Access-Control-Allow-Methods': 'GET, POST, OPTIONS',
        'Access-Control-Allow-Headers': 'X-Requested-With'
      }

  	}).then(function(response) {

      // Add your success message code here
      alert('You have successfully registered for pre order');
      console.log(response);

    }, function(response) {

      // Add your error message code here
      alert('There was an error with your pre order');

    });
  		
  };
  
});