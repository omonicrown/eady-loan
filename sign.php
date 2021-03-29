<?php
include_once 'dbConnection.php';
ob_start();
$mail = $_POST['mail'];
$password = $_POST['password'];
$q3 = mysqli_query($con,"SELECT * FROM instructor WHERE email = '$mail' and password = '$password'") or die('Error');

if($q3)
{
session_start();
$_SESSION["password"] = $password;
$_SESSION["email"] = $mail;
header("location:dash.php?q=1");
}else
    {
        header("location:$ref?w=Wrong Username or Password");
    }
    ob_end_flush();

?>