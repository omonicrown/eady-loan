<?php 
session_start();
if(isset($_SESSION['password'])){
session_destroy();}
$ref= @$_GET['q'];
header("location:$ref");
?>