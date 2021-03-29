<?php
include_once 'dbConnection.php';
ob_start();
$name = $_POST['name'];
$name= ucwords(strtolower($name));
$email = $_POST['mail'];
$gender = $_POST['gender'];
$password = $_POST['password'];
$contact = $_POST['contact'];


$q3=mysqli_query($con,"INSERT INTO records(name,email,gender,password,contact,debt,attempt) VALUES  ('$name' , '$email' , '$gender','$password','$contact','0','0')");


if($q3)
{
session_start();
$_SESSION["password"] = $password;
$_SESSION["name"] = $name;
$_SESSION["mail"] = $email;
header("location:account.php?q=1");
}else
    {
    header("location:index.php?q7=User Already Registered!!!");
    }
    ob_end_flush();

?>