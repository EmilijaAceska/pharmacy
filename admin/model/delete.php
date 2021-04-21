<?php
$data= json_decode(file_get_contents("php://input"));
require_once "../../classes/database.php";
$table_name=$data[0]->table_name;
$pk_value=$data[0]->pk_value;
switch ($table_name){
  case "category":
    require_once "model.category.php";
    $objCategory= new ModelCategory();
    $objCategory->setCategoryTitle($pk_value);
    $objCategory->deleteCategory();
  break;
  case "subcategory":
    require_once "model.subcategory.php";
    $objSubcategory= new ModelSubcategory();
    $objSubcategory->setSubcategory_title($pk_value);
    $objSubcategory->delteSubcategory();
  break;
  case "products":
    require_once "model.products.php";
    $objProduct= new ModelProducts();
    $objProduct->setProductId($pk_value);
    $objProduct->deleteProduct();
  break;
  case "contact_form":
    require_once "model.contact.php";
    $objContact= new ModelContact();
    $objContact->setContactId($pk_value);
    $objContact->deleteContact();
  break;
}
?>