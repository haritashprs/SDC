<?php
include "config.php";
include_once "Common.php";

if (isset($_POST['getid']) == "getid") {
    $id = $_POST['id'];
    $common = new Common();
    $Tech = $common->getimageid($connection,$id);
    $Data = '';
    if ($Tech->num_rows>0){
        while ($role = $Tech->fetch_object()) {
            $Data .= "<div style='text-align: -webkit-center;'><img src=../../pages/".$role->pimage." height='182px' width='auto' ></div>";
        }
    }
    echo $Data;
}
if (isset($_POST['getidproof']) == "getidproof") {
    $id = $_POST['id'];
    $common = new Common();
    $Tech = $common->getimageid($connection,$id);
    $Data = '';
    if ($Tech->num_rows>0){
        while ($role = $Tech->fetch_object()) {
            $Data .= "<div style='text-align: -webkit-center;'><embed src='../../pages/".$role->idproof."#toolbar=0'  height='400px' width='100%' /></div>";
        }
    }
    echo $Data;
}
if (isset($_POST['getdocument']) == "getdocument") {
    $id = $_POST['id'];
    $common = new Common();
    $Tech = $common->getimageid($connection,$id);
    $Data = '';
    if ($Tech->num_rows>0){
        while ($role = $Tech->fetch_object()) {
            $Data .= "<embed src='../../pages/".$role->iticertificate."#toolbar=0' height='500px' width='100%' />";
        }
    }
    echo $Data;
}
if (isset($_POST['getbtnid']) == "getbtnid") {
    $id = $_POST['id'];
    $common = new Common();
    $Tech = $common->inserta($connection,$id);
    
}
if (isset($_POST['getdecline']) == "getdecline") {
    $id = $_POST['id'];
    $common = new Common();
    $Tech = $common->insertdecline($connection,$id);
    
}
if (isset($_POST['Reset']) == "Reset") {
    $id = $_POST['id'];
    $common = new Common();
    $Tech = $common->Reset($connection,$id);
    
}