<?php
class ModelCategory extends DB{
  private $category_title="";
  private $category_img="";
  private $table_name="category";
  private $columns_name="category_title,category_img";

  //set-get
  public function setCategoryTitle($category_title){
    $this->category_title=$category_title;
  }
  public function getCategoryTitle(){
    return $this->categgory_title;
  }
  public function setCategoryImg($category_img){
    $this->category_img=$category_img;
  }
  public function getCategoryImg(){
    return $this->categgory_img;
  }

  //INSERT
  public function insertCategory(){
    $columns_value="'$this->category_title','$this->category_img'";
    parent::insertRow($this->table_name,$this->columns_name,$columns_value);
  }

  //SELECT
  public function selectCategory(){
    return parent::selectRow($this->table_name);
  }

  //UPDATE
  public function updateCategory(){
    $columns="category_title='$this->category_title',category_img='$this->category_img'";
    $condition="category_title='$this->category_title'";
    parent::updateRow($this->table_name,$columns,$condition);
  }

  //DELETE
  public function deleteCategory(){
    parent::deleteRowStr($this->table_name,"category_title",$this->category_title);
  }
}
?>