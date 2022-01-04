<?php

class Common
{
  
  public function getId($connection,$Id){
      $query = "SELECT * FROM technician_data WHERE fname='$Id'"; 
      $result2 = $connection->query($query) or die("Error in  Query".$connection->error);
      return $result2;
  }  
  public function getimageid($connection,$Id){
      $query = "SELECT * FROM technician_data WHERE number1='$Id'"; 
      $result2 = $connection->query($query) or die("Error in  Query".$connection->error);
      return $result2;
  }
  public function inserta($connection,$Id){
      $query = "UPDATE technician_data SET account_status = 'Approved' WHERE number1='$Id'"; 
      $result2 = $connection->query($query) or die("Error in  Query".$connection->error);
      return $result2;
  }
  public function insertdecline($connection,$Id){
      $query = "UPDATE technician_data SET account_status = 'Declined' WHERE number1='$Id'"; 
      $result2 = $connection->query($query) or die("Error in  Query".$connection->error);
      return $result2;
  }
  public function Reset($connection,$Id){
      $query = "UPDATE technician_data SET rewards=0 WHERE number1='$Id'"; 
      $result2 = $connection->query($query) or die("Error in  Query".$connection->error);
      return $result2;
  }
}
?>