var app = angular.module('Application', ['ngRoute']);

app.config(['$routeProvider', function($routeProvider) {
  $routeProvider.
      when('/', {templateUrl: 'pages/list.html', controller: 'PessoaListControler'}).
      when('/Novo', {templateUrl: 'pages/new.html', controller: 'PessoaAddControler'}).
      when('/Atualizar/:id', {templateUrl: 'pages/edit.html', controller: 'CustomerEditControler'}).
      otherwise({redirectTo: '/'});
}]);
app.controller ('PessoaListControler',[
  '$scope','$http',
  function ($scope, $http) {
      $http.get('http://localhost/lojavirtual/pessoas/pessoa').success(function(data) {
        $scope.pessoas = data;  
      });
  }    
]),
app.controller ('PessoaAddControler',[
  '$scope','$http','$location',
  function ($scope, $http, $location) {
      $scope.master = {};
      $scope.activePath = null;

      $scope.Nova_Pessoa = function(pessoa, AddNewForm) {
          console.log(pessoa);
          $http.post('http://localhost/lojavirtual/pessoas/pessoa', pessoa).success(function(){
              $scope.reset();
              $scope.activePath = $location.path('/');
          });
          $scope.reset = function() {
              $scope.pessoa = angular.copy($scope.master);
          };
          $scope.reset();
      };
  }
]),
app.controller('CustomerEditControler',[
  '$scope','$http','$location','$routeParams',
  function ($scope, $http, $location, $routeParams) {
      var id = $routeParams.id;
      $scope.activePath = null;

      $http.get('http://localhost/lojavirtual/pessoas/pessoa/3').success(function(data) {
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