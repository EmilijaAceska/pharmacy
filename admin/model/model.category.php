<?php
class ModelCategory extends DB{
  private $category_title="";
  private $table_name="category";
  private $columns_name="category_title";

  //set-get
  public function setCategoryTitle($category_title){
    $this->category_title=$category_title;
  }
  public function getCategoryTitle(){
    return $this->categgory_title;
  }

  //INSERT
  public function insertCategory(){
    $columns_value="'$this->category_title'";
    parent::insertRow($this->table_name,$this->columns_name,$columns_value);
  }

  //SELECT
  public function selectCategory(){
    return parent::selectRow($this->table_name);
  }

  //UPDATE
  public function updateCategory(){
    $columns="category_title='$this->category_title'";
    $condition="category_title='$this->category_title'";
    parent::updateRow($this->table_name,$columns,$condition);
  }

  //DELETE
  public function deleteCategory(){
    parent::deleteRowStr($this->table_name,"category_title",$this->category_title);
  }
}
?>