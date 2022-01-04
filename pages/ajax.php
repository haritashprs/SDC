<?php
include "config.php";
include_once "Common.php";
if (isset($_POST['getCityByState']) == "getCityByState") {
    $stateId = $_POST['stateId'];
    $common = new Common();
    $cities = $common->getCityByState($connection,$stateId);
    $cityData = '<option value="">City</option>';
    if ($cities->num_rows>0){
        while ($city = $cities->fetch_object()) {
            $cityData .= '<option value="'.$city->id.'">'.$city->cityName.'</option>';
        }
    }
    echo "test^".$cityData;
}
if (isset($_POST['getTechByCity']) == "getTechByCity") {
    $CityId = $_POST['CityId'];
    $common = new Common();
    $Tech = $common->getTechByCity($connection,$CityId);
    $Data = '<option value="">Technician</option>';
    if ($Tech->num_rows>0){
        while ($role = $Tech->fetch_object()) {
            $Data .= '<option value="'.$role->Index_Id.'">'.$role->Skill_Name.'</option>';
        }
    }
    echo $Data;
}
if (isset($_POST['getpopupid']) == "getpopupid") {
    $id = $_POST['id'];
    $common = new Common();
    $Tech = $common->getId($connection,$id);
    $Data = ' ';
    $Dat=' ';
    $skill = '';
    $number1 = '';
    $number2 = '';
    $address1 = '';
    $address2 = '';
    if ($Tech->num_rows>0){
        while ($role = $Tech->fetch_object()) {
            $Data .= $role->fname."^";
            $Dat .= $role->lname."^";
            $skill .= $role->skill."^";
            $number1 .= $role->number1."^";
            $number2 .= $role->number2."^";
            $address1 .= $role->address1."^";
            $address2 .= $role->address2."^";
        }
    }
    echo $Data.$skill.$number1.$number2.$address1.$address2.$Dat;
}
if (isset($_POST['getid']) == "getid") {
    $id = $_POST['id'];
    $common = new Common();
    $Tech = $common->getimageid($connection,$id);
    $Data = '';
    if ($Tech->num_rows>0){
        while ($role = $Tech->fetch_object()) {
            $Data .= $role->pimage;
        }
    }
    echo $Data;
}