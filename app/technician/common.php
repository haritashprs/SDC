<?php

class Common
{
  
  public function getStateByCountry($connection){
      $query = "SELECT * FROM bird_states WHERE countryId='101'";
      $result = $connection->query($query) or die("Error in  Query".$connection->error);
      return $result;
  }
  public function getCityByState($connection,$stateId){
      $query = "SELECT * FROM bird_cities WHERE state_id='$stateId'";
      $result1 = $connection->query($query) or die("Error in  Query".$connection->error);
      return $result1;
  }
  public function getTechByCity($connection,$CityId){
      $query = "SELECT * FROM skill_table WHERE City_ID='$CityId'"; 
      $result2 = $connection->query($query) or die("Error in  Query".$connection->error);
      return $result2;
  }
  public function getId($connection,$Id){
      $query = "SELECT * FROM technician_data WHERE number1='$Id'"; 
      $result2 = $connection->query($query) or die("Error in  Query".$connection->error);
      return $result2;
  }  
  public function getimageid($connection,$Id){
      $query = "SELECT * FROM technician_data WHERE pimage='$Id'"; 
      $result2 = $connection->query($query) or die("Error in  Query".$connection->error);
      return $result2;
  }
}
?>