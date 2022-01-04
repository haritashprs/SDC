<?php

session_start();

$con = mysqli_connect('localhost', 'root');

if($con)
{
   
}
else
{
    echo "no not now";
}

$db = mysqli_select_db($con,'repairbharat_301221');

if(isset($_POST['submit']))
{
    $username = $_POST['user'];
    $password = $_POST['pass'];

    $sql = " select * from admin_login where username = '$username' and pass = '$password'";

    $myquery = mysqli_query($con,$sql);
    
    
    
        if(mysqli_num_rows($myquery)==1)
        {
            echo "<script>alert('Log in is correct')</script>";
            $_SESSION['user']=$username;
            header('location:../app/admin_panel/dashboard_stats.php');

        }
        else
        {
            echo "<script>alert('Log in is incorrect please check your ID password')</script>";
            header('location:admin_login.php');
        }
    
    
    
      


}


?>