var app = angular.module('myApp', ["ngRoute"]);
app.controller('myCtrl', function($scope,$http,$routeParams) {

  //variables
  $scope.firstName = "Emilija";
  $scope.surname="Aceska";
  $scope.getId = 0;
  $scope.checkUrl = $routeParams.id;

  //functions post-insert,update,delete
  function postJSON(dataObject){
    $http(
        {
            method: "post",//od kade
            url: 'model/insert.php',//kade
            data: dataObject,//sto
            headers: { 'Content-Type':
            'application/x-www-form-urlencoded' }
        }
    );
    }
    function postUpdateJSON(dataObject){
    $http(
        {
            method: "post",//od kade
            url: 'model/update.php',//kade
            data: dataObject,//sto
            headers: { 'Content-Type':
            'application/x-www-form-urlencoded' }
        }
    );
    }
    function postJSONDelete(dataObject){
      $http(
          {
              method: "post",//od kade
              url: 'model/delete.php',//kade
              data: dataObject,//sto
              headers: { 'Content-Type':
              'application/x-www-form-urlencoded' }
          }
      );
  }
  
  //select
  //start category
  $scope.category = [];
  //          file_name.php  ? variable = value
  $http.get("model/select.php?table_name=category")
  .then(function (response) {
  $scope.category = response.data.records;
  });//end category
  
  //start subcategory
  $scope.subcategory = [];
  //          file_name.php  ? variable = value
  $http.get("model/select.php?table_name=subcategory")
  .then(function (response) {
  $scope.subcategory = response.data.records;
  });//end subcategory

  //start products
  $scope.products = [];
  //          file_name.php  ? variable = value
  $http.get("model/select.php?table_name=products")
  .then(function (response) {
  $scope.products = response.data.records;
  });//end products

  //start contact_form
  $scope.contact_form = [];
  //          file_name.php  ? variable = value
  $http.get("model/select.php?table_name=contact_form")
  .then(function (response) {
  $scope.contact_form = response.data.records;
  });//end contact_form
  



  
});