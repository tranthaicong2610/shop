<?php 
    $filepath = realpath(dirname(__FILE__));//Hàm sẽ trả về đường dẫn tuyệt đối nếu thành công, ngược lại hàm trả về Fasle.
    include ($filepath.'/../config/config.php'); ?>

<?php
Class Database extends PDO{
   public $host   = DB_HOST;
   public $user   = DB_USER;
   public $pass   = DB_PASS;
   public $dbname = DB_NAME;
  public $port=DB_PORT;
 
   public $link;
   public $error;
 
 public function __construct(){
  $this->connectDB();
 }
 //connect database
private function connectDB(){
   $this->link = new mysqli($this->host, $this->user, $this->pass, 
    $this->dbname,$this->port);
   if(!$this->link){
     $this->error ="Connection fail".$this->link->connect_error;
    return false;
   }
 }
 
// Select or Read data
public function select($query){
  $result = $this->link->query($query) or 
   die($this->link->error.__LINE__);
  if($result->num_rows > 0){
    return $result;
  } else {
    return false;
  }
 }

// Insert data
public function insert($query){
   $insert_row = $this->link->query($query);
   if($insert_row!=null){
     return $insert_row;
   } else {
     return false;
    }
 }
  
// Update data
 public function update($query){
   $update_row = $this->link->query($query);
   if($update_row){
    return $update_row;
   } else {
    return false;
    }
 }
  
// Delete data
 public function delete($query){
   $delete_row = $this->link->query($query);
   if($delete_row){
     return $delete_row;
   } else {
     return false;
    }
   }
 
}