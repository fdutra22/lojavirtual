var app = angular.module('Application', ['ngRoute']);

app.config(['$routeProvider', function($routeProvider) {
  $routeProvider.
      when('/', {templateUrl: 'pages/lists.html', controller: 'CustomerListControler'}).
      when('/NewCustomer', {templateUrl: 'pages/new.html', controller: 'CustomerAddControler'}).
      when('/UpdateCustomer/:id', {templateUrl: 'pages/edit.html', controller: 'CustomerEditControler'}).
      otherwise({redirectTo: '/'});
}]);

app.controller ('CustomerListControler',[
  '$scope','$http',
  function ($scope, $http) {
      $http.get('http://localhost/pessoas/pessoa/3').success(function(data) {
        $scope.customers = data;  
      });
  }    
]),