app.config(function ($routeProvider) {
  $routeProvider
    .when("/index", {
      templateUrl: "view/index.html",
      controller: "myCtrl"
    })
    .when("/category", {
      templateUrl: "view/category.html",
      controller: "myCtrl"
    })
    .when("/category_details", {
      templateUrl: "view/category_details.html",
      controller: "myCtrl"
    })
    .when("/category_details/:id", {
      templateUrl: "view/category_details.html",
      controller: "myCtrl"
    })
    .when("/subcategory", {
      templateUrl: "view/subcategory.html",
      controller: "myCtrl"
    })
    .when("/subcategory_details", {
      templateUrl: "view/subcategory_details.html",
      controller: "myCtrl"
    })
    .when("/subcategory_details/:id", {
      templateUrl: "view/subcategory_details.html",
      controller: "myCtrl"
    })
    .when("/products", {
      templateUrl: "view/products.html",
      controller: "myCtrl"
    })
    .when("/products_details", {
      templateUrl: "view/products_details.html",
      controller: "myCtrl"
    })
    .when("/products_details/:id", {
      templateUrl: "view/products_details.html",
      controller: "myCtrl"
    })
    .when("/contact", {
      templateUrl: "view/contact.html",
      controller: "myCtrl"
    })
    .when("/contact_details", {
      templateUrl: "view/contact_details.html",
      controller: "myCtrl"
    })
    .when("/contact_details/:id", {
      templateUrl: "view/contact_details.html",
      controller: "myCtrl"
    })
    .otherwise("/category", {
      templateUrl: "view/category.html",
      controller: "myCtrl"
    });
})