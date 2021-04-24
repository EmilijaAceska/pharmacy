<?php
class ModelProducts extends DB{
  private $product_id=-1;
  private $product_name="";
  private $product_description="";
  private $product_manufacturer="";
  private $product_price=-1;
  private $product_img="";
  private $category_title="";
  private $subcategory_title="";
  private $table_name="products";
  private $columns_name="product_name,product_description,product_manufacturer,
                        product_price,product_img,category_title,subcategory_title";
  
  //set-get
  public function setProductId($product_id){
    $this->product_id=$product_id;
  }
  public function getProductId(){
    return $this->product_id;
  }
  public function setProductName($product_name){
    $this->product_name=$product_name;
  }
  public function getProductName(){
    return $this->product_name;
  }
  public function setProductDescription($product_description){
    $this->product_description=$product_description;
  }
  public function getProductDescription(){
    return $this->product_description;
  }
  public function setProductManufacturer($product_manufacturer){
    $this->product_manufacturer=$product_manufacturer;
  }
  public function getProductManufacturer(){
    return $this->product_manufacturer;
  }
  public function setProductPrice($product_price){
    $this->product_price=$product_price;
  }
  public function getProductPrice(){
    return $this->product_price;
  }
  public function setProductImg($product_img){
    $this->product_img=$product_img;
  }
  public function getProductImg(){
    return $this->product_img;
  }
  public function setCategoryTitle($category_title){
    $this->category_title=$category_title;
  }
  public function getCategoryTitle(){
    return $this->category_title;
  }
  public function setSubcategoryTitle($subcategory_title){
    $this->subcategory_title=$subcategory_title;
  }
  public function getSubcategoryTitle(){
    return $this->subcategory_title;
  }

  //insert
  public function insertProduct(){
    $columns_value="'$this->product_name','$this->product_description',
                    '$this->product_manufacturer','$this->product_price',
                    '$this->product_img','$this->category_title',
                    '$this->subcategory_title'";
    parent::insertRow($this->table_name,$this->columns_name,$columns_value);
  }

  //select
  public function selectProduct(){
    return parent::selectRow($this->table_name);
  }

  //delete
  public function deleteProduct(){
    parent::deleteRowStr($this->table_name,"product_id",$this->product_id);
  }

  //update
  public function updateProduct(){
    $columns="product_name='$this->product_name',product_description='$this->product_description',
              product_manufacturer='$this->product_manufacturer',product_price='$this->product_price',
              product_img='$this->product_img',category_title='$this->category_title',
              subcategory_title='$this->subcategory_title'";
  }
}
?>