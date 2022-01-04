<?php
$connection = new mysqli(hostname: "localhost",username: "root",password: "",database: "repairbharat_301221");

if (!$connection){
    die("Error in connection".$connection->connect_error);
} 
