<?php
$data = json_decode(file_get_contents("php://input"));
var_dump($data);
require_once "../../classes/database.php";
$table_name=$data[0]->table_name;
$pk_value=$data[0]->pk_value;
switch($table_name){
  case "category":
    require_once "model.category.php";
    $objCategory= new ModelCategory();
    $category_title=$data[0]->category_title;
    $category_img=$data[0]->category_img;
    $objCategory->setCategoryTitle($category_title);
    $objCategory->setCategoryImg($category_img);
    $objCategory->updateCategory();
  break;
  case "subcategory":
    require_once "model.subcategory.php";
    $objSubcategory= new ModelSubcategory();
    $subcategory_title=$data[0]->subcategory_title;
    $subcategory_img=$data[0]->subcategory_img;
    $objSubcategory->setSubcategoryTitle($subcategory_title);
    $objSubcategory->setSubcategoryImg($subcategory_img);
    $objSubcategory->updateSubcategory();
  break;
  case "products":
    require_once "model.products.php";
    $objProduct= new ModelProducts();
    $product_name=$data[0]->product_name;
    $product_description=$data[0]->product_description;
    $product_manufacturer=$data[0]->product_manufacturer;
    $product_price=$data[0]->product_price;
    $product_img=$data[0]->product_img;
    $category_title=$data[0]->category_title;
    $subcategory_title=$data[0]->subcategory_title;
    $objProduct->setProductName($product_name);
    $objProduct->setProductDescription($product_description);
    $objProduct->setProductManufacturer($product_manufacturer);
    $objProduct->setProductPrice($product_price);
    $objProduct->setProductImg($product_img);
    $objProduct->setCategoryTitle($category_title);
    $objProduct->setSubcategoryTitle($subcategory_title);
    $objProduct->setProductId($pk_value);
    $objProduct->updateProduct();
  break;
  case "contact_form":
    require_once "model.contact.php";
    $objContact= new ModelContact();
    $first_name=$data[0]->first_name;
    $last_name=$data[0]->last_name;
    $address=$data[0]->address;
    $e_mail=$data[0]->e_mail;
    $age=$data[0]->age;
    $message=$data[0]->message;
    $objContact->setFirstName($first_name);
    $objContact->setLastName($last_name);
    $objContact->setAddress($address);
    $objContact->setEmail($e_mail);
    $objContact->setAge($age);
    $objContact->setMessage($message);
    $objContact->setContactId($pk_value);
    $objContact->updateContact();
  break;
}
?>