<?php

include 'cat_connection.php';

$id = $_GET['id'];

$deleatequery = " delete from skill_table where Index_Id=$id ";

$dquery = mysqli_query($check,$deleatequery);

header('location:new_category.php');

?>
