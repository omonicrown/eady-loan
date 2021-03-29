<?php
include_once 'dbConnection.php';
session_start();
$password=$_SESSION['password'];
//delete feedback
if(isset($_SESSION['key'])){
if(@$_GET['fdid'] && $_SESSION['key']=='sunny7785068889') {
$id=@$_GET['fdid'];
$result = mysqli_query($con,"DELETE FROM feedback WHERE id='$id' ") or die('Error1');
header("location:dash.php?q=3");
}
}

if(@$_GET['q']=='register') {
  $email =$_POST['email'];
  $expire = $_POST['expiry'];

//   $d = strtotime('+'.$newPlan.' month',new DateTime('now'));
//  $date = date("Y-m-d",$d); 


//$date = date("Y-m-d");
// $time = date('Y-m-d', strtotime($date. ' + '.$newPlan.' months'));

$q3=mysqli_query($con,"UPDATE `records` SET `count`='$expire'  WHERE  email = '$email' ")or die('Error124');
header("location:dash.php?q=1&q7=Updated Successfully!!!");
}



?>

<html>
<body>
  <form action="account.php" method="post">
  <input type="text" name="time2" value="<?php echo $time; ?>">
  </form>
</body>
</html>