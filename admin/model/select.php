<?php
require_once "../../classes/database.php";
$table_name=$_GET["table_name"];
$data=array();
switch ($table_name) {
  case "category":
    require_once "model.category.php";
    $objCategory= new ModelCategory();
    $result=$objCategory->selectCategory();
    foreach($result as $row){
            $data["records"][]=array("category_title"=>$row["category_title"],"category_img"=>$row["category_img"]);
    }
  break;
  case "subcategory":
    require_once "model.subcategory.php";
    $objSubcategory= new ModelSubcategory();
    $result=$objSubcategory->selectSubcategory();
    foreach($result as $row){
            $data["records"][]=array("subcategory_title"=>$row["subcategory_title"],"subcategory_img"=>$row["subcategory_img"]);
    }
  break;
  case "products":
    require_once "model.products.php";
    $objProduct= new ModelProducts();
    $result=$objProduct->selectProduct();
    foreach($result as $row){
            $data["records"][]=array("product_id"=>$row["product_id"],"product_name"=>$row["product_name"],"product_description"=>$row["product_description"],
                                      "product_manufacturer"=>$row["product_manufacturer"],"product_price"=>$row["product_price"],"product_img"=>$row["product_img"]
                                      "category_title"=>$row["category_title"],"subcategory_title"=>$row["subcategory_title"]);
    }
  break;
  case "contact_form":
    require_once "model.contact.php";
    $objContact= new ModelContact();
    $result=$objContact->selectContact();
    foreach($result as $row){
            $data["records"][]=array("contact_id"=>$row["contact_id"],"first_name"=>$row["first_name"],"last_name"=>$row["last_name"],
                                      "address"=>$row["address"],"e_mail"=>$row["e_mail"],"age"=>$row["age"],"message"=>$row["message"]);
    }
  break;
}
echo json_encode($data);
?>