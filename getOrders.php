<!DOCTYPE html>
<html lang="en" ng-app="Emailer">
  
  <body ng-controller="MainCtrl">

  	<div ng-init="getOrders()">

  		Search for emails: <input type="text" name="searchEmail" ng-model="searchEmail">

  		<br>
  		<br>
  		
  		<ul>
	  		<li ng-repeat="order in orders | filter: searchEmail">

				{{ order.name }}
				{{ order.email }}

	  		</li>
  		</ul>

  	</div>
  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.3.14/angular.js"></script>
  <script src="app.js"></script>
  </body>
  
<html>