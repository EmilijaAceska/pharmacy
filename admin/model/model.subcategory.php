<?php
class ModelSubcategory extends DB{
  private $subcategory_title="";
  private $subcategory_img="";
  private $table_name="subcategory";
  private $columns_name="subcategory_title,subcategory_img";

  //set-get
  public function setSubcategoryTitle($subcategory_title){
    $this->subcategory_title=$subcategory_title;
  }
  public function getSubcategoryTitle(){
    return $this->subcategory_title;
  }
  public function setSubcategoryImg($subcategory_img){
    $this->subcategory_img=$subcategory_img;
  }
  public function getSubcategoryImg(){
    return $this->subcategory_img;
  }

  //insert
  public function insertSubcategory(){
    columns_value="'$this->subcategory_title','$this->subcategory_img'";
    parent::insertRow($this->table_name,$this->columns_name,$columns_value);
  }

  //select
  public function selectSubcategory(){
    return parent::selectRow($this->table_name);
  }

  //delete
  public function deleteSubcategory(){
    parent::deleteRowStr($this->table_name,"subcategory_title",$this->subcategory_title);
  }

  //update
  public function updateSubcategory(){
    $columns="subcategory_img='$this->subcategory_img'";
    $condition="subcategory_title='$this->subcategory_title'";
    parent::updateRow($this->table_name,$columns,$condition);
  }
}
?>