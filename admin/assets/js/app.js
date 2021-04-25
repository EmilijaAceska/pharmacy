var app = angular.module('myApp', ["ngRoute"]);
app.controller('myCtrl', function ($scope, $http, $routeParams) {

	//variables
	$scope.firstName = "Emilija";
	$scope.surname = "Aceska";
	$scope.successAlert = false;
	$scope.dangerAlert = false;
	$scope.infoAlert = false;
	$scope.deleteAlert = false;
	$scope.updateAlert = false;
	$scope.getId = 0;
	$scope.checkUrl = $routeParams.id;

	//functions post-insert,update,delete
	function postJSON(dataObject) {
		$http(
			{
				method: "post",
				url: 'model/insert.php',
				data: dataObject,
				headers: {
					'Content-Type':
						'application/x-www-form-urlencoded'
				}
			}
		);
	}
	function postUpdateJSON(dataObject) {
		$http(
			{
				method: "post",
				url: 'model/update.php',
				data: dataObject,
				headers: {
					'Content-Type':
						'application/x-www-form-urlencoded'
				}
			}
		);
	}
	function postJSONDelete(dataObject) {
		$http(
			{
				method: "post",
				url: 'model/delete.php',
				data: dataObject,
				headers: {
					'Content-Type':
						'application/x-www-form-urlencoded'
				}
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
    
	//INSERT
	    
	//insert category
	$scope.function_category_details = function (category_title, category_img, pk_value, action) {
		var find = 0;
		angular.forEach($scope.category, function (value, keys) {
			// console.log($scope.category[keys].category_title+" ");
			if ($scope.category[keys].category_title == category_title) {
				find = 1;
				// console.log($scope.category[keys].category_title + " ");
				$scope.infoAlert = true;
			}
		});
		if (find == 0) {
			var categoryJson = [{ "category_title": category_title, "category_img": category_img, "table_name": "category", "action": action }];
			// console.log(categoryJson);
			postJSON(categoryJson);
			$scope.dangerAlert = false;
			$scope.infoAlert = false;
			$scope.successAlert = true;
		} else {
			var categoryJson = [{ "category_title": category_title, "category_img": category_img, "pk_value": pk_value, "table_name": "category", "action": action }];
			// console.log(categoryJson);
			postUpdateJSON(categoryJson);
			$scope.infoAlert = false;
			$scope.updateAlert = true;
		}
	}//end category

	//insert subcategory
	$scope.function_subcategory_details = function (subcategory_title, subcategory_img, pk_value, action) {
		var find = 0;
		angular.forEach($scope.subcategory, function (value, keys) {
			if ($scope.subcategory[keys].subcategory_title == subcategory_title) {
				find = 1;
				// console.log($scope.subcategory[keys].subcategory_title + " ");
				$scope.infoAlert = true;
			}
		});
		if (find == 0) {
			var subcategoryJson = [{ "subcategory_title": subcategory_title, "subcategory_img": subcategory_img, "table_name": "subcategory", "action": action }];
			postJSON(subcategoryJson);
			// console.log(subcategoryJson);
			$scope.dangerAlert = false;
			$scope.infoAlert = false;
			$scope.successAlert = true;
		} else {
			var subcategoryJson = [{ "subcategory_title": subcategory_title, "subcategory_img": subcategory_img,"pk_value":pk_value, "table_name": "subcategory", "action": action }];
			postUpdateJSON(subcategoryJson);
			// console.log(subcategoryJson);
			$scope.infoAlert = false;
			$scope.updateAlert = true;
		}
	}

	//insert products
	$scope.function_products_details = function (product_name, product_description, product_manufacturer, product_price, product_img, category_title, subcategory_title, pk_value,action) {
		var productsJson = [{
			"product_name": product_name, "product_description": product_description, "product_manufacturer": product_manufacturer, "product_price": product_price,
			"product_img": product_img, "category_title": category_title, "subcategory_title": subcategory_title,"pk_value":pk_value, "table_name": "products", "action": action
		}];
		if (action == 'insert') {
			postJSON(productsJson);
			// console.log(productsJson);
			$scope.dangerAlert = false;
			$scope.infoAlert = false;
			$scope.successAlert = true;
		} else {
			postUpdateJSON(productsJson);
			// console.log(productsJson);
			$scope.infoAlert = false;
			$scope.updateAlert = true;
		}
	}

	//insert contact_form
	$scope.function_contact_details = function (first_name, last_name, address, e_mail, age, message, pk_value) {
		var contactJson = [{
			"first_name": first_name, "last_name": last_name, "address": address, "e_mail": e_mail, "age": age,
			"message":message, "pk_value":pk_value, "table_name":"contact_form"
		}];
		postJSON(contactJson);
		// console.log(contactJson);
		$scope.dangerAlert = false;
		$scope.successAlert = true;
	}
	
	//DELETE
	$scope.function_deleteRow = function (table_name, pk_value) {
		var deleteJson = [{ "table_name": table_name, "pk_value": pk_value }];
		postJSONDelete(deleteJson);
	}//end delete

	//delete category
	$scope.function_deleteRowCategory = function (pk_value) {
		var find = 0;
		angular.forEach($scope.products, function(value, keys){
			if($scope.products[keys].category_title == pk_value){
			find = 1;
		}
	});		
	}

	//delete subcategory
	$scope.function_deleteRowSubcategory = function (pk_value) {
		var find = 0;
		angular.forEach($scope.products, function(value, keys){
			if($scope.products[keys].subcategory_title == pk_value){
			find = 1;
		}
	});		
	}

	//function Error
	$scope.function_error = function() {
		console.log(error);
	}

	$scope.function_getId = function (pk_value) {
		$scope.getId = pk_value;
		console.log("GET ID " + pk_value);
	}

  


  
});