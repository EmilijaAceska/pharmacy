<?php
class ModelContact extends DB{
  private $contact_id=-1;
  private $first_name="";
  private $last_name="";
  private $address="";
  private $e_mail="";
  private $age=-1;
  private $message="";
  private $table_name="contact_form";
  private $columns_name="first_name, last_name,address,e_mail,age, message";

  //SET-GET
  public function setContactId($contact_id){
    $this->contact_id=$contact_id;
  }
  public function getContactId(){
    return $this->contact_id;
  }
  public function setFirstName($first_name){
    $this->first_name=$first_name;
  }
  public function getFirstName(){
    return $this->first_name;
  }
  public function setLastName($last_name){
    $this->last_name=$last_name;
  }
  public function getLastName(){
    return $this->last_name;
  }
  public function setAddress($address){
    $this->address=$address;
  }
  public function getAddress(){
    return $this->address;
  }
  public function setEmail($e_mail){
    $this->e_mail=$e_mail;
  }
  public function getEmail(){
    return $this->e_mail;
  }
  public function setAge($age){
    $this->age=$age;
  }
  public function getAge(){
    return $this->age;
  }
  public function setMessage($message){
    $this->message=$message;
  }
  public function getMessage(){
    return $this->message;
  }

  //SELECT
  public function selectContact(){
    return parent::selectRow($this->table_name);
  }
  //INSERT
  public function insertContact(){
    $columns_value="'$this->first_name','$this->last_name','$this->address','$this->e_mail',$this->age,'$this->message'";
    parent::insertRow($this->table_name,$this->columns_name,$columns_value);
  }
  // //DELETE
  public function deleteContact(){
        parent::deleteRow($this->table_name,"contact_id",$this->contact_id);
  }
}
?>