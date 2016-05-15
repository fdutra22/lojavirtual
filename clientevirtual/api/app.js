var app = angular.module('Application', ['ngRoute']);

app.config(['$routeProvider', function($routeProvider) {
  $routeProvider.
      when('/', {templateUrl: 'pages/lists.html', controller: 'CustomerListControler'}).
      when('/NewCustomer', {templateUrl: 'pages/new.html', controller: 'CustomerAddControler'}).
      when('/UpdateCustomer/:id', {templateUrl: 'pages/edit.html', controller: 'CustomerEditControler'}).
      otherwise({redirectTo: '/'});
}]);

app.controller('CustomerEditControler',[
  '$scope','$http','$location','$routeParams',
  function ($scope, $http, $location, $routeParams) {
      var id = $routeParams.id;
      $scope.activePath = null;

      $http.get('http://localhost/pessoas/pessoa/3').success(function(data) {
        $scope.CustomerDetail = data;
      });

      $scope.Update_Customer = function(customer) {
          $http.put('api/Customers/'+id, customer).success(function(data) {
          $scope.CustomerDetail = data;
          $scope.activePath = $location.path('/');
        });
      };
      
      $scope.Delete_Customer = function(customer) {
          console.log(customer);
          var deleteCustomer = confirm('Are you absolutely sure you want to delete?');
          if (deleteCustomer) {
              $http.delete('api/Customers/'+customer.id);
              $scope.activePath = $location.path('/');
          }        
      };
  }
]);