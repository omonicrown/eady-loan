<?php
include_once 'dbConnection.php';
session_start();
//$password=$_SESSION['password'];
//delete feedback
if(isset($_SESSION['key'])){
if(@$_GET['fdid'] && $_SESSION['key']=='sunny7785068889') {
$id=@$_GET['fdid'];
$result = mysqli_query($con,"DELETE FROM feedback WHERE id='$id' ") or die('Error1');
header("location:dash.php?q=3");
}
}

//delete user

if(@$_GET['q']=='register') {
  $email =$_POST['email'];
  $expire = $_POST['expiry'];

//   $d = strtotime('+'.$newPlan.' month',new DateTime('now'));
//  $date = date("Y-m-d",$d); 


//$date = date("Y-m-d");
// $time = date('Y-m-d', strtotime($date. ' + '.$newPlan.' months'));

$q3=mysqli_query($con,"UPDATE `records` SET `count`='$expire',  WHERE  email = '$email' ")or die('Error124');
header("location:dash.php?q=1&q7=Updated Successfully!!!");
}



if(@$_GET['q']== 'reg') {
  
  $bvn = $_POST['bvn'];
  $fname = $_POST['fname'];
  $lname = $_POST['lname'];
  $contact = $_POST['contact'];
  $mail = $_POST['mail'];
  $state = $_POST['state'];
  $business = $_POST['business'];
  $description = $_POST['description'];
  $dob = $_POST['dob'];
  $accnum = $_POST['accnum'];
  $bankname = $_POST['bankname'];
  $amount = $_POST['amount'];



$q3=mysqli_query($con,"INSERT INTO admin (accnum,bankname,fname,lname,contact,mail,state,business,description,dob,bvn,datee,amount) values (
  '$accnum','$bankname','$fname','$lname','$contact','$mail','$state','$business','$description','$dob','$bvn',NOW(),'$amount'
) ")or die('Error124');

if($q3){
  $result = mysqli_query($con,"SELECT * FROM records where email='$mail' ") or die('279');

  while($row = mysqli_fetch_array($result)) {
    $attempt = $row['attempt'];
    $attempt2 = $attempt + 1;
    $q4=mysqli_query($con,"UPDATE `records` SET `attempt`='$attempt2',`debt`='$amount' WHERE  email = '$mail' ")or die('Error1224');
  }
}
header("location:account.php?q=1&q7=Your Request Has Been delievered Successfully You Will Get a Response In Less Than 24 Hours!!!");
}




?>

<html>
<body>
  <form action="account.php" method="post">
  <input type="text" name="time2" value="<?php echo $time; ?>">
  </form>
</body>
</html>