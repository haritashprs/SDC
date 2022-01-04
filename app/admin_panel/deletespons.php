<?php

include 'cat_connection.php';

$id = $_GET['id'];

$deleatequery = " delete from sponsors where id=$id ";

$dquery = mysqli_query($check,$deleatequery);

header('location:sponsors.php');

?>