<?php
session_start();
if(isset($_SESSION["password"])){
session_destroy();
}
include_once 'dbConnection.php';
$ref=@$_GET['q'];
$name = $_POST['name'];
$password = $_POST['password'];

//$email = stripslashes($email);
//$email = addslashes($email);
// $password = stripslashes($password); 
// $password = addslashes($password);
// $password=md5($password); 
$result = mysqli_query($con,"SELECT * FROM user2 WHERE name = '$name' and password = '$password'") or die('Error');
$count=mysqli_num_rows($result);
if($count==1){
while($row = mysqli_fetch_array($result)) {
	$name = $row['name'];
	$class = $row['class'];
}
$_SESSION["name"] = $name;
$_SESSION["password"] = $password;
	if($class == '100'){
		header("location:account.php?q=1");
	}elseif($class == '200'){
		header("location:account2.php?q=1");
	}elseif($class == '300'){
		header("location:account3.php?q=1");
	}

}
else{
	header("location:$ref?w=Wrong Username or Password");
}




?>