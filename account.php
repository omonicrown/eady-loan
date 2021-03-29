<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<style>
.services .icon-box {
  padding: 30px;
  position: relative;
  overflow: hidden;
  border-radius: 10px;
  background: #fff;
  box-shadow: 0 2px 29px 0 rgba(68, 88, 144, 0.12);
  transition: all 0.4s ease-in-out;
  width: 100%;
  height: 100%;
}

.services .icon-box:hover {
  transform: translateY(-10px);
  box-shadow: 0 2px 35px 0 rgba(68, 88, 144, 0.2);
}

.services .icon {
  position: absolute;
  left: -20px;
  top: calc(50% - 30px);
}

.services .icon i {
  font-size: 64px;
  line-height: 1;
  transition: 0.5s;
}

.services .title {
  margin-left: 40px;
  font-weight: 700;
  margin-bottom: 15px;
  font-size: 18px;
}

.services .title a {
  color: #2a2c39;
  transition: ease-in-out 0.3s;
}

.services .title a:hover {
  color: #ef6603;
}

.services .description {
  font-size: 14px;
  margin-left: 40px;
  line-height: 24px;
  margin-bottom: 0;
}

</style>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Crown Softwares</title>
<!-- Vendor CSS Files -->


 
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/line-awesome/css/line-awesome.min.css" rel="stylesheet">
  <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
  

<link  rel="stylesheet" href="css/bootstrap.min.css"/>
 <link  rel="stylesheet" href="css/bootstrap-theme.min.css"/>    
 <link rel="stylesheet" href="css/main.css">
 <link  rel="stylesheet" href="css/font.css">
 <script src="js/jquery.js" type="text/javascript"></script>

 
  <script src="js/bootstrap.min.js"  type="text/javascript"></script>
<link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
 <!--alert message-->
<?php if(@$_GET['w'])
{echo'<script>alert("'.@$_GET['w'].'");</script>';}
?>
<!--alert message end-->

</head>
<?php
include_once 'dbConnection.php';
?>
<body>
<div class="header">
<div class="row">
<div class="col-lg-5">
<span class="logo" style="color:white;font-size:25px">Easy Lend</span></div>
<div class="col-md-5 col-md-offset-2">
 <?php
 include_once 'dbConnection.php';
session_start();
  if(!(isset($_SESSION['password']))){
header("location:index.php");

}
else
{
$name = $_SESSION['name'];
$password=$_SESSION['password'];
$email = $_SESSION['mail'];

include_once 'dbConnection.php';
echo '<span class="pull-right top title1" style="color:white;"><span class="log1"><span class="glyphicon glyphicon-user" aria-hidden="true" style="color:white;"></span>&nbsp;&nbsp;&nbsp;&nbsp;<span style="color:white;">Welcome,</span></span> <a href="account.php?q=1" class="log log1" style="color:white;">'.$name.'</a></span>';
echo '<br>';

$result = mysqli_query($con,"SELECT * FROM records where email='$email' ") or die('115');
$dept;
while($row = mysqli_fetch_array($result)) {
  $debt = $row['debt'];
  $attempt = $row['attempt'];
  $count = $row['count'];
}



}?>
<script>
// Set the date we're counting down to
var count = "<?php echo $count; ?>";
var countDownDate = new Date(count).getTime();

// Update the count down every 1 second
var x = setInterval(function() {

  // Get today's date and time
  var now = new Date().getTime();
    
  // Find the distance between now and the count down date
  var distance = countDownDate - now;
   // distance--;
  // Time calculations for days, hours, minutes and seconds
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  // var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  // var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  // var seconds = Math.floor((distance % (1000 * 60)) / 1000);
    
  // Output the result in an element with id="demo"
  document.getElementById("days").innerHTML = days+' DAYS';
  // document.getElementById("hours").innerHTML =  hours ;
  // document.getElementById("minutes").innerHTML =minutes;
  // document.getElementById("seconds").innerHTML =seconds;
    
  // If the count down is over, write some text 
  if(days < 0){
    clearInterval(x);
    document.getElementById("days").innerHTML = "EXPIRED!!!";
        }}, 1000);
</script>
</div>
</div></div>
<div class="bg">

<!--navigation menu-->
<nav class="navbar navbar-default title1">

<span class="pull-right top title1"><span class="log1">&nbsp;<span>Total Dept: </span></span> <a href="account.php?q=1" class="log log1" style="font-size:20px;"><?php echo $debt ;?>.0  </a></span>


<span class="pull-right top title1"><span class="log1">&nbsp;<span>Attempt : </span></span> <a href="account.php?q=1" class="log log1" style="font-size:20px;"><?php echo $attempt ;?>  </a></span>
<span class="pull-right top title1"><span class="log1">&nbsp;<span>CountDown : </span></span> <a href="account.php?q=1" class="log log1" style="font-size:20px;" id="days"> </a></span>
      
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
    
      <button type="button" style="float:left" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button> 
     <h6> <a class="navbar-brand" href="account.php?q=1"><b >DASHBOARD</b></a></h6>
     <a href="" class="navbar-brand btn btn-primary" style="color:white;font-size:15px;"> PAY</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li <?php if(@$_GET['q']==1) echo'class="active"'; ?> ><a href="account.php?q=1"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>&nbsp;Home<span class="sr-only">(current)</span></a></li>
        <!-- <li <?php //if(@$_GET['q']==2) echo'class="active"'; ?>><a href="account.php?q=2"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>&nbsp;History</a></li>
		<li <?php //if(@$_GET['q']==3) echo'class="active"'; ?>><a href="account.php?q=3"><span class="glyphicon glyphicon-stats" aria-hidden="true"></span>&nbsp;Result</a></li> -->
		<li class="pull-right"> <a href="logout.php?q=index.php" id="logout"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span>&nbsp;&nbsp;&nbsp;&nbsp;Logout</a></li>
		</ul>
         
      </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav><!--navigation menu closed-->
<div class="container"><!--container start-->
<div class="row">
<div class="col-md-12">


<!--home start-->
<?php if(@$_GET['q']==1) {
echo "<script>sessionStorage.clear();</script>";
$result = mysqli_query($con,"SELECT * FROM records where email='$email' ") or die('156');
// $date = date("Y-m-d");
// $date2 = "2021-02-19";
// if($date == $date2){
//   echo 'true';
// }else{
//   echo'false';
// }
echo  '<section id="services" class="services">
<div class="container">';
if(@$_GET['q7'])
{ echo'<p id="success_message" align="middle" style="color:green;font-size:18px;background-color:white;"><b>'.@$_GET['q7'].'</b></p>';}
  echo '<div class="section-title" data-aos="zoom-out">
    <h2>Services</h2>
    <p>What we do offer</p>
  </div>

  <div class="row">
    <div class="col-lg-4 col-md-6" style="padding:20px 20px">
      <div class="icon-box" data-aos="zoom-in-left">
        <div class="icon"><i class="las la-basketball-ball" style="color: #ff689b;"></i></div>
        <h4 class="title"><a href="">FIRST PLAN</a></h4>
        <p class="description">Legibility: <b class="color:pink;font-size:30px">&nbsp; &nbsp;&nbsp Instant</b> <br>
        <span >Amount:<b class="color:pink;font-size:30px">&nbsp; &nbsp;&nbsp N 50,000</b></span><br>
        <span >Duration:<b class="color:pink;font-size:30px">&nbsp; &nbsp;&nbsp 1 month</b></span><br>
        <span >Interest:<b class="color:pink;font-size:30px">&nbsp; &nbsp;&nbsp 11%</b></span>

        </p>
        
        <br>
        ';
        while($row = mysqli_fetch_array($result)) {
          $check_user = $row['attempt'];
          $date = date("Y-m-d");
          $debt = $row['debt'];
           //$date2 = $row['date'];
          //  if($date == $date2 || $date>=$date2){
          //   $q4=mysqli_query($con,"UPDATE `yoruba` SET `check_user`='false'  WHERE  mail = '$email' ")or die('Error124');
          //  }
           
          if($check_user>=0 && $debt<=0){
            echo '<a style="float:right" class="btn btn-primary " href="account.php?q=2" > GET</a>';
          }else{
            echo '<a style="float:right"class="btn btn-default " href="#" disabled > GET</a>';
          }
         
        }
        
       
        echo '
        </div>
    </div>';

    $result = mysqli_query($con,"SELECT * FROM records where email='$email' ") or die('207');

    echo '

    <div class="col-lg-4 col-md-6 mt-5 mt-md-0" style="padding:20px 20px">
      <div class="icon-box" data-aos="zoom-in-left" data-aos-delay="100">
        <div class="icon"><i class="las la-book" style="color: #e9bf06;"></i></div>
        <h4 class="title"><a href="">SECOND PLAN</a></h4>
        <p class="description">Legibility: <b class="color:pink;font-size:30px">&nbsp; &nbsp;&nbsp After 3 successful loans</b> <br>
        <span >Amount:<b class="color:pink;font-size:30px">&nbsp; &nbsp;&nbsp N 100,000</b></span><br>
        <span >Duration:<b class="color:pink;font-size:30px">&nbsp; &nbsp;&nbsp 3 month</b></span><br>
        <span >Interest:<b class="color:pink;font-size:30px">&nbsp; &nbsp;&nbsp 15%</b></span>

        </p> <br>
        ';

        while($row = mysqli_fetch_array($result)) {
          $check_user = $row['attempt'];
          $date = date("Y-m-d");
          $debt = $row['debt'];
          //  if($date == $date2 || $date>=$date2){
          //   $q4=mysqli_query($con,"UPDATE `french` SET `check_user`='false'  WHERE  mail = '$email' ")or die('Error124');
          //  }
           
          if($check_user >= 3 && $debt<=0){
            echo '<a style="float:right" class="btn btn-primary btn-disabled" href="account.php?q=3" > GET</a>';
          }else{
            echo '<a style="float:right" class="btn btn-default " href="#" disabled> GET</a>';
          }
         
        }
        
       
        echo '
        </div>
    </div>';

    $result = mysqli_query($con,"SELECT * FROM records where email='$email' ") or die('244');

    echo '

    <div class="col-lg-4 col-md-6 mt-5 mt-md-0" style="padding:20px 20px">
      <div class="icon-box" data-aos="zoom-in-left" data-aos-delay="100">
        <div class="icon"><i class="las la-book" style="color: #e9bf06;"></i></div>
        <h4 class="title"><a href="">THIRD PLAN</a></h4>
        <p class="description">Legibility: <b class="color:pink;font-size:30px">&nbsp; &nbsp;&nbsp After 5 successful loans</b> <br>
        <span >Amount:<b class="color:pink;font-size:30px">&nbsp; &nbsp;&nbsp N 200,000</b></span><br>
        <span >Duration:<b class="color:pink;font-size:30px">&nbsp; &nbsp;&nbsp 5 month</b></span><br>
        <span >Interest:<b class="color:pink;font-size:30px">&nbsp; &nbsp;&nbsp 17%</b></span>

        </p> <br>
';
        while($row = mysqli_fetch_array($result)) {
          $check_user = $row['attempt'];
          $date = date("Y-m-d");
          $debt = $row['debt'];
          //  if($date == $date2 || $date>=$date2){
          //   $q4=mysqli_query($con,"UPDATE `chinese` SET `check_user`='false'  WHERE  mail = '$email' ")or die('Error124');
          //  }
           
          if($check_user >=5 && $debt<=0){
            echo '<a style="float:right" class="btn btn-primary btn-disabled" href="account.php?q=4" > GET</a>';
          }else{
            echo '<a style="float:right" class="btn btn-default " href="#" disabled> GET</a>';
          }
         
        }
        
       
        echo '
        </div>
    </div>';
    $result = mysqli_query($con,"SELECT * FROM records where email='$email' ") or die('279');

    echo '

    <div class="col-lg-4 col-md-6 mt-5 mt-lg-0 " style="padding:20px 20px">
      <div class="icon-box" data-aos="zoom-in-left" data-aos-delay="200">
        <div class="icon"><i class="las la-file-alt" style="color: #3fcdc7;"></i></div>
        <h4 class="title"><a href="">FORTH PLAN</a></h4>
        <p class="description">Legibility: <b class="color:pink;font-size:30px">&nbsp; &nbsp;&nbsp After 10 successful loans</b> <br>
        <span >Amount:<b class="color:pink;font-size:30px">&nbsp; &nbsp;&nbsp N 500,000</b></span><br>
        <span >Duration:<b class="color:pink;font-size:30px">&nbsp; &nbsp;&nbsp 11 month</b></span><br>
        <span >Interest:<b class="color:pink;font-size:30px">&nbsp; &nbsp;&nbsp 20%</b></span>

        </p> <br>';

        while($row = mysqli_fetch_array($result)) {
          $check_user = $row['attempt'];
          $date = date("Y-m-d");
          $debt = $row['debt'];
          //  if($date == $date2 || $date>=$date2){
          //   $q4=mysqli_query($con,"UPDATE `korean` SET `check_user`='false'  WHERE  mail = '$email' ")or die('Error124');
          //  }
           
          if($check_user >=10 && $debt<=0){
            echo '<a style="float:right" class="btn btn-primary btn-disabled" href="account.php?q=5" > GET</a>';
          }else{
            echo '<a style="float:right" class="btn btn-default " href="#" disabled> GET</a>';
          }
         
        }
       
        echo '
        </div>
    </div>

   
</section>
<!-- End Services Section -->';

}?>



<?php if(@$_GET['q']==2) {

echo  '<div class="panel title"><div class="table-responsive"><br><h3 align="middle">Kindly Fill The Details Correctly to Get 50,000 loan</h3><br>';
if(@$_GET['q7'])
{ echo'<p id="success_message" align="middle" style="color:red;font-size:15px;">'.@$_GET['q7'].'</p>';}


 echo '<form role="form" method="post" action="account.php?q=22" >
 

<div class="form-group" align="middle">
  <label class="col-md-8 control-label" for="name"> </label>  
  <div class="col-md-8">
  <input id="fname" name="fname" placeholder="Enter First Name" class="form-control input-md" type="text" required>
  </div>
</div>

<div class="form-group " align="middle">
  <label class="col-md-8 control-label" for="name"></label>  
  <div class="col-md-8">
  <input id="lname" name="lname" placeholder="Enter Last Name" class="form-control input-md" type="text" required>
    
  </div>
</div>

<div class="form-group " align="middle">
  <label class="col-md-8 control-label" for="name"></label>  
  <div class="col-md-8">
  <input id="contact" name="contact" placeholder="Kindly enter the contact you registered your bank account with." class="form-control input-md" type="text" required>
    
  </div>
</div>


<div class="form-group " align="middle">
  <label class="col-md-8 control-label" for="name"></label>  
  <div class="col-md-8">
  <input id="email" name="mail" value="'.$email.'" placeholder="Enter your Email" class="form-control input-md" type="hidden">
    
  </div>
</div>


<div class="form-group " align="middle">
  <label class="col-md-8 control-label" for="state"></label>  
  <div class="col-md-8">
  <input id="state" name="state"  placeholder="Enter your detaile address" class="form-control input-md" type="text">
    
  </div>
</div>


<div class="form-group col-md-8" align="middle">
  <label class="col-md-8 control-label" for="name"></label>  
  <div class="">
  <input id="name" name="business" placeholder="Enter your business name" class="form-control input-md" type="text" required>
    
  </div>
</div>

<div class="form-group " align="middle">
  <label class="col-md-8 control-label" for="name"></label>  
  <div class="col-md-8">
  <input id="description" name="description" placeholder="Give a detailed description of your business" class="form-control input-md" type="text" required>
    
  </div>
</div>

<div class="form-group" align="middle">
  <label class="col-md-8 control-label" for="name">Select Birthdate Registered With BVN</label>  
  <div class="col-md-8">
  <input id="name" name="dob" placeholder="Select Birthdate Registered With BVN" class="form-control input-md" type="date" required>
    
  </div>
</div>

<div class="form-group col-md-8" align="middle">
  <label class="col-md-8 control-label" for="name"></label>  
  <div class="">
  <input id="bvn" name="bvn" placeholder="Enter Your BVN Number" class="form-control input-md" type="text" required>
    
  </div>
</div>

<br><br>


<div class="col-md-12" align="middle" style="padding:20px 20px">
<input type="submit" name="proceed"  value="proceed" class="btn btn-primary" />
</div>

</form>'
;

}
?>



<?php if(@$_GET['q']==22) {

error_reporting(0);
if (isset($_POST['proceed'])){
	$bvn = $_POST['bvn'];
  $fname = $_POST['fname'];
  $lname = $_POST['lname'];
  $contact = $_POST['contact'];
  $mail = $_POST['mail'];
  $state = $_POST['state'];
  $business = $_POST['business'];
  $description = $_POST['description'];
  $dob = $_POST['dob'];

	$url = 'https://api.paystack.co/bank/resolve_bvn/'.$bvn;
$ch = curl_init();
curl_setopt($ch, CURLOPT_RETURNTRANSFER,TRUE);
curl_setopt($ch, CURLOPT_URL,$url);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization:Bearer sk_live_d50868e49e2aed29aea642e33290049efccaac4'));
$out=curl_exec($ch);
curl_close($ch);
//echo $out;
$output = json_decode($out);
$output_status = $output->status;
$output_message = $output->message;
$output_bvn = $output->data->bvn;
$output_first_name = $output->data->first_name;
$output_last_name = $output->data->last_name;
$output_dob = $output->data->dob;
$output_mobile = $output->data->mobile;
$output_calls = $output->meta->free_calls_left;
$timestamp = strtotime($output_dob);
$new_date = date("d-m-Y", $timestamp);
$timestamp2 = strtotime($dob);
$new_date2 = date("d-m-Y", $timestamp2);


// if($new_date == $new_date2 && $output_mobile == $contact && $output_first_name == $fname && $output_last_name==$lname){
//   header("location:account.php?q=222");
// }else{
//   echo "invalid Datails";
// }


// echo '
//  <p> Message: '.$output_message.'</p>
//  <p> status: '.$output_status.'</p>
//  <p> BVN: '.$output_bvn.'</p>
//  <p> First Name '.$output_first_name.'</p>
//  <p> Last Name '.$output_last_name.'</p>
//  <p> Date of Birth '.$new_date.'</p>
//  <p> Contact '.$output_mobile.'</p>
//  <p> Calls '.$output_calls.'</p>

//  <p> Calls '.$new_date2.'</p>
// ';

}
if($new_date == $new_date2 && $output_mobile == $contact && $output_first_name == $fname && $output_last_name==$lname){
  echo '<div class="panel panel-default col-md-6"><form role="form" method="post" action="update.php?q=reg" >
 

<div class="form-group" align="middle">
  <label class="col-md-8 control-label" for="name"> </label>  
  <div class="col-md-8">
  <input id="fname" name="accnum" placeholder="Enter Account Number" class="form-control input-md" type="text" required>
  </div>
</div>

<div class="form-group " align="middle">
  <label class="col-md-8 control-label" for="name"></label>  
  <div class="col-md-8">
  <input id="lname" name="bankname" placeholder="Enter Bank Name" class="form-control input-md" type="text" required>
    
  </div>
</div>
<input type="hidden" name="amount" value="50000">
<input type="hidden" name="fname" value="'.$fname.'">
<input type="hidden" name="lname" value="'.$lname.'">
<input type="hidden" name="contact" value="'.$contact.'">
<input type="hidden" name="mail" value="'.$mail.'">
<input type="hidden" name="state" value="'.$state.'">
<input type="hidden" name="business" value="'.$business.'">
<input type="hidden" name="description" value="'.$description.'">
<input type="hidden" name="dob" value="'.$dob.'">
<input type="hidden" name="bvn" value="'.$bvn.'">


<br><br>


<div class="col-md-12" align="middle" style="padding:20px 20px">
<input type="submit" name="proceed"  value="proceed" class="btn btn-primary" />
</div>

</form> </div>'
;

}else{
  echo '<div class="panel panel-default col-md-6"><form role="form" method="post" action="update.php?q=reg" >
 

  <div class="form-group" align="middle">
    <label class="col-md-8 control-label" for="name"> </label>  
    <div class="col-md-8">
    <input id="fname" name="accnum" placeholder="Enter Account Number" class="form-control input-md" type="text" required>
    </div>
  </div>
  
  <div class="form-group " align="middle">
    <label class="col-md-8 control-label" for="name"></label>  
    <div class="col-md-8">
    <input id="lname" name="bankname" placeholder="Enter Bank Name" class="form-control input-md" type="text" required>
      
    </div>
  </div>
  <input type="hidden" name="amount" value="50000">
  <input type="hidden" name="fname" value="'.$fname.'">
  <input type="hidden" name="lname" value="'.$lname.'">
  <input type="hidden" name="contact" value="'.$contact.'">
  <input type="hidden" name="mail" value="'.$mail.'">
  <input type="hidden" name="state" value="'.$state.'">
  <input type="hidden" name="business" value="'.$business.'">
  <input type="hidden" name="description" value="'.$description.'">
  <input type="hidden" name="dob" value="'.$dob.'">
  <input type="hidden" name="bvn" value="'.$bvn.'">
  
  
  <br><br>
  
  
  <div class="col-md-12" align="middle" style="padding:20px 20px">
  <input type="submit" name="proceed"  value="proceed" class="btn btn-primary" />
  </div>
  
  </form> </div>'
  ;
  echo "";
  echo "<div align='middle' class='panel panel-default col-md-6'>invalid Details.<br> The details you entered does not correspond with your BVN details<br><br><a style='float:middle;' href='account.php?q=2'><input type='button' class='btn btn-primary col-lg-12' name='Go Back' value='Go Back'></a></div>";
  header("location:account.php?q=2");
}
}

?>




<?php if(@$_GET['q']==3) {

echo  '<div class="panel title"><div class="table-responsive"><br><h3 align="middle">Kindly Fill the form to get 100,000 Loan</h3><br>';
if(@$_GET['q7'])
{ echo'<p id="success_message" align="middle" style="color:red;font-size:15px;">'.@$_GET['q7'].'</p>';}


 echo '<form role="form" method="post" action="account.php?q=33" >
 

<div class="form-group" align="middle">
  <label class="col-md-8 control-label" for="name"> </label>  
  <div class="col-md-8">
  <input id="fname" name="fname" placeholder="Enter First Name" class="form-control input-md" type="text" required>
  </div>
</div>

<div class="form-group " align="middle">
  <label class="col-md-8 control-label" for="name"></label>  
  <div class="col-md-8">
  <input id="lname" name="lname" placeholder="Enter Last Name" class="form-control input-md" type="text" required>
    
  </div>
</div>

<div class="form-group " align="middle">
  <label class="col-md-8 control-label" for="name"></label>  
  <div class="col-md-8">
  <input id="contact" name="contact" placeholder="Kindly enter the contact you registered your bank account with." class="form-control input-md" type="text" required>
    
  </div>
</div>


<div class="form-group " align="middle">
  <label class="col-md-8 control-label" for="name"></label>  
  <div class="col-md-8">
  <input id="email" name="mail" value="'.$email.'" placeholder="Enter your Email" class="form-control input-md" type="hidden">
    
  </div>
</div>

<div class="form-group col-md-8" align="middle">
<select name="state" id="child" placeholder="Select State" class="form-control" required>
  <option disabled selected>Select Your Resident State </option>
  <option value="20" >Abia</option>
  <option value="40" >Adamawa</option>
  <option value="50" >Akwa-ibom</option>
  <option value="60" >Adamawa</option>
  <option value="70" >Gombe</option>
  <option value="80" >others</option>

</select>
</div>


<div class="form-group col-md-8" align="middle">
  <label class="col-md-8 control-label" for="name"></label>  
  <div class="">
  <input id="name" name="business" placeholder="Enter your business name" class="form-control input-md" type="text" required>
    
  </div>
</div>

<div class="form-group " align="middle">
  <label class="col-md-8 control-label" for="name"></label>  
  <div class="col-md-8">
  <input id="description" name="description" placeholder="Give a detailed description of your business" class="form-control input-md" type="text" required>
    
  </div>
</div>

<div class="form-group" align="middle">
  <label class="col-md-8 control-label" for="name">Select Birthdate Registered With BVN</label>  
  <div class="col-md-8">
  <input id="name" name="dob" placeholder="Select Birthdate Registered With BVN" class="form-control input-md" type="date" required>
    
  </div>
</div>

<div class="form-group col-md-8" align="middle">
  <label class="col-md-8 control-label" for="name"></label>  
  <div class="">
  <input id="bvn" name="bvn" placeholder="Enter Your BVN Number" class="form-control input-md" type="text" required>
    
  </div>
</div>

<br><br>


<div class="col-md-12" align="middle" style="padding:20px 20px">
<input type="submit" name="proceed"  value="proceed" class="btn btn-primary" />
</div>

</form>'
;

}
?>






<?php if(@$_GET['q']==33) {

error_reporting(0);
if (isset($_POST['proceed'])){
	$bvn = $_POST['bvn'];
  $fname = $_POST['fname'];
  $lname = $_POST['lname'];
  $contact = $_POST['contact'];
  $mail = $_POST['mail'];
  $state = $_POST['state'];
  $business = $_POST['business'];
  $description = $_POST['description'];
  $dob = $_POST['dob'];

	$url = 'https://api.paystack.co/bank/resolve_bvn/'.$bvn;
$ch = curl_init();
curl_setopt($ch, CURLOPT_RETURNTRANSFER,TRUE);
curl_setopt($ch, CURLOPT_URL,$url);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization:Bearer sk_live_d50868e49e2aed29aea642e33290049efccaac4'));
$out=curl_exec($ch);
curl_close($ch);
//echo $out;
$output = json_decode($out);
$output_status = $output->status;
$output_message = $output->message;
$output_bvn = $output->data->bvn;
$output_first_name = $output->data->first_name;
$output_last_name = $output->data->last_name;
$output_dob = $output->data->dob;
$output_mobile = $output->data->mobile;
$output_calls = $output->meta->free_calls_left;
$timestamp = strtotime($output_dob);
$new_date = date("d-m-Y", $timestamp);
$timestamp2 = strtotime($dob);
$new_date2 = date("d-m-Y", $timestamp2);


// if($new_date == $new_date2 && $output_mobile == $contact && $output_first_name == $fname && $output_last_name==$lname){
//   header("location:account.php?q=222");
// }else{
//   echo "invalid Datails";
// }


// echo '
//  <p> Message: '.$output_message.'</p>
//  <p> status: '.$output_status.'</p>
//  <p> BVN: '.$output_bvn.'</p>
//  <p> First Name '.$output_first_name.'</p>
//  <p> Last Name '.$output_last_name.'</p>
//  <p> Date of Birth '.$new_date.'</p>
//  <p> Contact '.$output_mobile.'</p>
//  <p> Calls '.$output_calls.'</p>

//  <p> Calls '.$new_date2.'</p>
// ';

}
if($new_date == $new_date2 && $output_mobile == $contact && $output_first_name == $fname && $output_last_name==$lname){
  echo '<div class="panel panel-default col-md-6"><form role="form" method="post" action="update.php?q=reg" >
 

  <div class="form-group" align="middle">
    <label class="col-md-8 control-label" for="name"> </label>  
    <div class="col-md-8">
    <input id="fname" name="accnum" placeholder="Enter Account Number" class="form-control input-md" type="text" required>
    </div>
  </div>
  
  <div class="form-group " align="middle">
    <label class="col-md-8 control-label" for="name"></label>  
    <div class="col-md-8">
    <input id="lname" name="bankname" placeholder="Enter Bank Name" class="form-control input-md" type="text" required>
      
    </div>
  </div>
  <input type="hidden" name="amount" value="100000">
  <input type="hidden" name="fname" value="'.$fname.'">
  <input type="hidden" name="lname" value="'.$lname.'">
  <input type="hidden" name="contact" value="'.$contact.'">
  <input type="hidden" name="mail" value="'.$mail.'">
  <input type="hidden" name="state" value="'.$state.'">
  <input type="hidden" name="business" value="'.$business.'">
  <input type="hidden" name="description" value="'.$description.'">
  <input type="hidden" name="dob" value="'.$dob.'">
  <input type="hidden" name="bvn" value="'.$bvn.'">
  
  
  <br><br>
  
  
  <div class="col-md-12" align="middle" style="padding:20px 20px">
  <input type="submit" name="proceed"  value="proceed" class="btn btn-primary" />
  </div>
  
  </form> </div>'
  ;

}else{
  echo '<div class="panel panel-default col-md-6"><form role="form" method="post" action="update.php?q=reg" >
 

  <div class="form-group" align="middle">
    <label class="col-md-8 control-label" for="name"> </label>  
    <div class="col-md-8">
    <input id="fname" name="accnum" placeholder="Enter Account Number" class="form-control input-md" type="text" required>
    </div>
  </div>
  
  <div class="form-group " align="middle">
    <label class="col-md-8 control-label" for="name"></label>  
    <div class="col-md-8">
    <input id="lname" name="bankname" placeholder="Enter Bank Name" class="form-control input-md" type="text" required>
      
    </div>
  </div>
  <input type="hidden" name="amount" value="100000">
  <input type="hidden" name="fname" value="'.$fname.'">
  <input type="hidden" name="lname" value="'.$lname.'">
  <input type="hidden" name="contact" value="'.$contact.'">
  <input type="hidden" name="mail" value="'.$mail.'">
  <input type="hidden" name="state" value="'.$state.'">
  <input type="hidden" name="business" value="'.$business.'">
  <input type="hidden" name="description" value="'.$description.'">
  <input type="hidden" name="dob" value="'.$dob.'">
  <input type="hidden" name="bvn" value="'.$bvn.'">
  
  
  <br><br>
  
  
  <div class="col-md-12" align="middle" style="padding:20px 20px">
  <input type="submit" name="proceed"  value="proceed" class="btn btn-primary" />
  </div>
  
  </form> </div>'
  ;
  echo "";
  echo "<div align='middle' class='panel panel-default col-md-6'>invalid Details.<br> The details you entered does not correspond with your BVN details<br><br><a style='float:middle;' href='account.php?q=2'><input type='button' class='btn btn-primary col-lg-12' name='Go Back' value='Go Back'></a></div>";
  header("location:account.php?q=3");
}
}



?>












<?php if(@$_GET['q']==4) {

echo  '<div class="panel title"><div class="table-responsive"><br><h3 align="middle">Kindly Fill The Details Correctly to get 200000 Loan</h3><br>';
if(@$_GET['q7'])
{ echo'<p id="success_message" align="middle" style="color:red;font-size:15px;">'.@$_GET['q7'].'</p>';}


 echo '<form role="form" method="post" action="account.php?q=44" >
 

<div class="form-group" align="middle">
  <label class="col-md-8 control-label" for="name"> </label>  
  <div class="col-md-8">
  <input id="fname" name="fname" placeholder="Enter First Name" class="form-control input-md" type="text" required>
  </div>
</div>

<div class="form-group " align="middle">
  <label class="col-md-8 control-label" for="name"></label>  
  <div class="col-md-8">
  <input id="lname" name="lname" placeholder="Enter Last Name" class="form-control input-md" type="text" required>
    
  </div>
</div>

<div class="form-group " align="middle">
  <label class="col-md-8 control-label" for="name"></label>  
  <div class="col-md-8">
  <input id="contact" name="contact" placeholder="Kindly enter the contact you registered your bank account with." class="form-control input-md" type="text" required>
    
  </div>
</div>


<div class="form-group " align="middle">
  <label class="col-md-8 control-label" for="name"></label>  
  <div class="col-md-8">
  <input id="email" name="mail" value="'.$email.'" placeholder="Enter your Email" class="form-control input-md" type="hidden">
    
  </div>
</div>

<div class="form-group col-md-8" align="middle">
<select name="state" id="child" placeholder="Select State" class="form-control" required>
  <option disabled selected>Select Your Resident State </option>
  <option value="20" >Abia</option>
  <option value="40" >Adamawa</option>
  <option value="50" >Akwa-ibom</option>
  <option value="60" >Adamawa</option>
  <option value="70" >Gombe</option>
  <option value="80" >others</option>

</select>
</div>


<div class="form-group col-md-8" align="middle">
  <label class="col-md-8 control-label" for="name"></label>  
  <div class="">
  <input id="name" name="business" placeholder="Enter your business name" class="form-control input-md" type="text" required>
    
  </div>
</div>

<div class="form-group " align="middle">
  <label class="col-md-8 control-label" for="name"></label>  
  <div class="col-md-8">
  <input id="description" name="description" placeholder="Give a detailed description of your business" class="form-control input-md" type="text" required>
    
  </div>
</div>

<div class="form-group" align="middle">
  <label class="col-md-8 control-label" for="name">Select Birthdate Registered With BVN</label>  
  <div class="col-md-8">
  <input id="name" name="dob" placeholder="Select Birthdate Registered With BVN" class="form-control input-md" type="date" required>
    
  </div>
</div>

<div class="form-group col-md-8" align="middle">
  <label class="col-md-8 control-label" for="name"></label>  
  <div class="">
  <input id="bvn" name="bvn" placeholder="Enter Your BVN Number" class="form-control input-md" type="text" required>
    
  </div>
</div>

<br><br>


<div class="col-md-12" align="middle" style="padding:20px 20px">
<input type="submit" name="proceed"  value="proceed" class="btn btn-primary" />
</div>

</form>'
;

}
?>






<?php if(@$_GET['q']==44) {

error_reporting(0);
if (isset($_POST['proceed'])){
	$bvn = $_POST['bvn'];
  $fname = $_POST['fname'];
  $lname = $_POST['lname'];
  $contact = $_POST['contact'];
  $mail = $_POST['mail'];
  $state = $_POST['state'];
  $business = $_POST['business'];
  $description = $_POST['description'];
  $dob = $_POST['dob'];

	$url = 'https://api.paystack.co/bank/resolve_bvn/'.$bvn;
$ch = curl_init();
curl_setopt($ch, CURLOPT_RETURNTRANSFER,TRUE);
curl_setopt($ch, CURLOPT_URL,$url);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization:Bearer sk_live_d50868e49e2aed29aea642e33290049efccaac4'));
$out=curl_exec($ch);
curl_close($ch);
//echo $out;
$output = json_decode($out);
$output_status = $output->status;
$output_message = $output->message;
$output_bvn = $output->data->bvn;
$output_first_name = $output->data->first_name;
$output_last_name = $output->data->last_name;
$output_dob = $output->data->dob;
$output_mobile = $output->data->mobile;
$output_calls = $output->meta->free_calls_left;
$timestamp = strtotime($output_dob);
$new_date = date("d-m-Y", $timestamp);
$timestamp2 = strtotime($dob);
$new_date2 = date("d-m-Y", $timestamp2);


// if($new_date == $new_date2 && $output_mobile == $contact && $output_first_name == $fname && $output_last_name==$lname){
//   header("location:account.php?q=222");
// }else{
//   echo "invalid Datails";
// }


// echo '
//  <p> Message: '.$output_message.'</p>
//  <p> status: '.$output_status.'</p>
//  <p> BVN: '.$output_bvn.'</p>
//  <p> First Name '.$output_first_name.'</p>
//  <p> Last Name '.$output_last_name.'</p>
//  <p> Date of Birth '.$new_date.'</p>
//  <p> Contact '.$output_mobile.'</p>
//  <p> Calls '.$output_calls.'</p>

//  <p> Calls '.$new_date2.'</p>
// ';

}
if($new_date == $new_date2 && $output_mobile == $contact && $output_first_name == $fname && $output_last_name==$lname){
  echo '<div class="panel panel-default col-md-6"><form role="form" method="post" action="update.php?q=reg" >
 

  <div class="form-group" align="middle">
    <label class="col-md-8 control-label" for="name"> </label>  
    <div class="col-md-8">
    <input id="fname" name="accnum" placeholder="Enter Account Number" class="form-control input-md" type="text" required>
    </div>
  </div>
  
  <div class="form-group " align="middle">
    <label class="col-md-8 control-label" for="name"></label>  
    <div class="col-md-8">
    <input id="lname" name="bankname" placeholder="Enter Bank Name" class="form-control input-md" type="text" required>
      
    </div>
  </div>
  <input type="hidden" name="amount" value="200000">
  <input type="hidden" name="fname" value="'.$fname.'">
  <input type="hidden" name="lname" value="'.$lname.'">
  <input type="hidden" name="contact" value="'.$contact.'">
  <input type="hidden" name="mail" value="'.$mail.'">
  <input type="hidden" name="state" value="'.$state.'">
  <input type="hidden" name="business" value="'.$business.'">
  <input type="hidden" name="description" value="'.$description.'">
  <input type="hidden" name="dob" value="'.$dob.'">
  <input type="hidden" name="bvn" value="'.$bvn.'">
  
  
  <br><br>
  
  
  <div class="col-md-12" align="middle" style="padding:20px 20px">
  <input type="submit" name="proceed"  value="proceed" class="btn btn-primary" />
  </div>
  
  </form> </div>'
  ;
}else{
  echo '<div class="panel panel-default col-md-6"><form role="form" method="post" action="update.php?q=reg" >
 

  <div class="form-group" align="middle">
    <label class="col-md-8 control-label" for="name"> </label>  
    <div class="col-md-8">
    <input id="fname" name="accnum" placeholder="Enter Account Number" class="form-control input-md" type="text" required>
    </div>
  </div>
  
  <div class="form-group " align="middle">
    <label class="col-md-8 control-label" for="name"></label>  
    <div class="col-md-8">
    <input id="lname" name="bankname" placeholder="Enter Bank Name" class="form-control input-md" type="text" required>
      
    </div>
  </div>
  <input type="hidden" name="amount" value="200000">
  <input type="hidden" name="fname" value="'.$fname.'">
  <input type="hidden" name="lname" value="'.$lname.'">
  <input type="hidden" name="contact" value="'.$contact.'">
  <input type="hidden" name="mail" value="'.$mail.'">
  <input type="hidden" name="state" value="'.$state.'">
  <input type="hidden" name="business" value="'.$business.'">
  <input type="hidden" name="description" value="'.$description.'">
  <input type="hidden" name="dob" value="'.$dob.'">
  <input type="hidden" name="bvn" value="'.$bvn.'">
  
  
  <br><br>
  
  
  <div class="col-md-12" align="middle" style="padding:20px 20px">
  <input type="submit" name="proceed"  value="proceed" class="btn btn-primary" />
  </div>
  
  </form> </div>'
  ;
  echo "";
  echo "<div align='middle' class='panel panel-default col-md-6'>invalid Details.<br> The details you entered does not correspond with your BVN details<br><br><a style='float:middle;' href='account.php?q=2'><input type='button' class='btn btn-primary col-lg-12' name='Go Back' value='Go Back'></a></div>";
  header("location:account.php?q=4");
}
}



?>















<?php if(@$_GET['q']==5) {

echo  '<div class="panel title"><div class="table-responsive"><br><h3 align="middle">Kindly Fill The Details Correctly to Get 500000 Loan</h3><br>';
if(@$_GET['q7'])
{ echo'<p id="success_message" align="middle" style="color:red;font-size:15px;">'.@$_GET['q7'].'</p>';}


 echo '<form role="form" method="post" action="account.php?q=55" >
 

<div class="form-group" align="middle">
  <label class="col-md-8 control-label" for="name"> </label>  
  <div class="col-md-8">
  <input id="fname" name="fname" placeholder="Enter First Name" class="form-control input-md" type="text" required>
  </div>
</div>

<div class="form-group " align="middle">
  <label class="col-md-8 control-label" for="name"></label>  
  <div class="col-md-8">
  <input id="lname" name="lname" placeholder="Enter Last Name" class="form-control input-md" type="text" required>
    
  </div>
</div>

<div class="form-group " align="middle">
  <label class="col-md-8 control-label" for="name"></label>  
  <div class="col-md-8">
  <input id="contact" name="contact" placeholder="Kindly enter the contact you registered your bank account with." class="form-control input-md" type="text" required>
    
  </div>
</div>


<div class="form-group " align="middle">
  <label class="col-md-8 control-label" for="name"></label>  
  <div class="col-md-8">
  <input id="email" name="mail" value="'.$email.'" placeholder="Enter your Email" class="form-control input-md" type="hidden">
    
  </div>
</div>

<div class="form-group col-md-8" align="middle">
<select name="state" id="child" placeholder="Select State" class="form-control" required>
  <option disabled selected>Select Your Resident State </option>
  <option value="20" >Abia</option>
  <option value="40" >Adamawa</option>
  <option value="50" >Akwa-ibom</option>
  <option value="60" >Adamawa</option>
  <option value="70" >Gombe</option>
  <option value="80" >others</option>

</select>
</div>


<div class="form-group col-md-8" align="middle">
  <label class="col-md-8 control-label" for="name"></label>  
  <div class="">
  <input id="name" name="business" placeholder="Enter your business name" class="form-control input-md" type="text" required>
    
  </div>
</div>

<div class="form-group " align="middle">
  <label class="col-md-8 control-label" for="name"></label>  
  <div class="col-md-8">
  <input id="description" name="description" placeholder="Give a detailed description of your business" class="form-control input-md" type="text" required>
    
  </div>
</div>

<div class="form-group" align="middle">
  <label class="col-md-8 control-label" for="name">Select Birthdate Registered With BVN</label>  
  <div class="col-md-8">
  <input id="name" name="dob" placeholder="Select Birthdate Registered With BVN" class="form-control input-md" type="date" required>
    
  </div>
</div>

<div class="form-group col-md-8" align="middle">
  <label class="col-md-8 control-label" for="name"></label>  
  <div class="">
  <input id="bvn" name="bvn" placeholder="Enter Your BVN Number" class="form-control input-md" type="text" required>
    
  </div>
</div>

<br><br>


<div class="col-md-12" align="middle" style="padding:20px 20px">
<input type="submit" name="proceed"  value="proceed" class="btn btn-primary" />
</div>

</form>'
;

}
?>






<?php if(@$_GET['q']==55) {

error_reporting(0);
if (isset($_POST['proceed'])){
	$bvn = $_POST['bvn'];
  $fname = $_POST['fname'];
  $lname = $_POST['lname'];
  $contact = $_POST['contact'];
  $mail = $_POST['mail'];
  $state = $_POST['state'];
  $business = $_POST['business'];
  $description = $_POST['description'];
  $dob = $_POST['dob'];

	$url = 'https://api.paystack.co/bank/resolve_bvn/'.$bvn;
$ch = curl_init();
curl_setopt($ch, CURLOPT_RETURNTRANSFER,TRUE);
curl_setopt($ch, CURLOPT_URL,$url);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization:Bearer sk_live_d50868e49e2aed29aea642e33290049efccaac4'));
$out=curl_exec($ch);
curl_close($ch);
//echo $out;
$output = json_decode($out);
$output_status = $output->status;
$output_message = $output->message;
$output_bvn = $output->data->bvn;
$output_first_name = $output->data->first_name;
$output_last_name = $output->data->last_name;
$output_dob = $output->data->dob;
$output_mobile = $output->data->mobile;
$output_calls = $output->meta->free_calls_left;
$timestamp = strtotime($output_dob);
$new_date = date("d-m-Y", $timestamp);
$timestamp2 = strtotime($dob);
$new_date2 = date("d-m-Y", $timestamp2);


// if($new_date == $new_date2 && $output_mobile == $contact && $output_first_name == $fname && $output_last_name==$lname){
//   header("location:account.php?q=222");
// }else{
//   echo "invalid Datails";
// }


// echo '
//  <p> Message: '.$output_message.'</p>
//  <p> status: '.$output_status.'</p>
//  <p> BVN: '.$output_bvn.'</p>
//  <p> First Name '.$output_first_name.'</p>
//  <p> Last Name '.$output_last_name.'</p>
//  <p> Date of Birth '.$new_date.'</p>
//  <p> Contact '.$output_mobile.'</p>
//  <p> Calls '.$output_calls.'</p>

//  <p> Calls '.$new_date2.'</p>
// ';

}
if($new_date == $new_date2 && $output_mobile == $contact && $output_first_name == $fname && $output_last_name==$lname){
  echo '<div class="panel panel-default col-md-6"><form role="form" method="post" action="update.php?q=reg" >
 

  <div class="form-group" align="middle">
    <label class="col-md-8 control-label" for="name"> </label>  
    <div class="col-md-8">
    <input id="fname" name="accnum" placeholder="Enter Account Number" class="form-control input-md" type="text" required>
    </div>
  </div>
  
  <div class="form-group " align="middle">
    <label class="col-md-8 control-label" for="name"></label>  
    <div class="col-md-8">
    <input id="lname" name="bankname" placeholder="Enter Bank Name" class="form-control input-md" type="text" required>
      
    </div>
  </div>
  <input type="hidden" name="amount" value="500000">
  <input type="hidden" name="fname" value="'.$fname.'">
  <input type="hidden" name="lname" value="'.$lname.'">
  <input type="hidden" name="contact" value="'.$contact.'">
  <input type="hidden" name="mail" value="'.$mail.'">
  <input type="hidden" name="state" value="'.$state.'">
  <input type="hidden" name="business" value="'.$business.'">
  <input type="hidden" name="description" value="'.$description.'">
  <input type="hidden" name="dob" value="'.$dob.'">
  <input type="hidden" name="bvn" value="'.$bvn.'">
  
  
  <br><br>
  
  
  <div class="col-md-12" align="middle" style="padding:20px 20px">
  <input type="submit" name="proceed"  value="proceed" class="btn btn-primary" />
  </div>
  
  </form> </div>'
  ;

}else{
  echo '<div class="panel panel-default col-md-6"><form role="form" method="post" action="update.php?q=reg" >
 

  <div class="form-group" align="middle">
    <label class="col-md-8 control-label" for="name"> </label>  
    <div class="col-md-8">
    <input id="fname" name="accnum" placeholder="Enter Account Number" class="form-control input-md" type="text" required>
    </div>
  </div>
  
  <div class="form-group " align="middle">
    <label class="col-md-8 control-label" for="name"></label>  
    <div class="col-md-8">
    <input id="lname" name="bankname" placeholder="Enter Bank Name" class="form-control input-md" type="text" required>
      
    </div>
  </div>
  <input type="hidden" name="amount" value="500000">
  <input type="hidden" name="fname" value="'.$fname.'">
  <input type="hidden" name="lname" value="'.$lname.'">
  <input type="hidden" name="contact" value="'.$contact.'">
  <input type="hidden" name="mail" value="'.$mail.'">
  <input type="hidden" name="state" value="'.$state.'">
  <input type="hidden" name="business" value="'.$business.'">
  <input type="hidden" name="description" value="'.$description.'">
  <input type="hidden" name="dob" value="'.$dob.'">
  <input type="hidden" name="bvn" value="'.$bvn.'">
  
  
  <br><br>
  
  
  <div class="col-md-12" align="middle" style="padding:20px 20px">
  <input type="submit" name="proceed"  value="proceed" class="btn btn-primary" />
  </div>
  
  </form> </div>'
  ;
  echo "";
  echo "<div align='middle' class='panel panel-default col-md-6'>invalid Details.<br> The details you entered does not correspond with your BVN details<br><br><a style='float:middle;' href='account.php?q=2'><input type='button' class='btn btn-primary col-lg-12' name='Go Back' value='Go Back'></a></div>";
  header("location:account.php?q=5");
}
}



?>





<?php if(@$_GET['q']==222) {

echo  '<div class="panel title"><div class="table-responsive"><br><h3 align="middle">Enter Your Account Details</h3><br>';
if(@$_GET['q7'])
{ echo'<p id="success_message" align="middle" style="color:red;font-size:15px;">'.@$_GET['q7'].'</p>';}


 echo '<form role="form" method="post" action="account.php?q=22" >
 

<div class="form-group" align="middle">
  <label class="col-md-8 control-label" for="name"> </label>  
  <div class="col-md-8">
  <input id="fname" name="fname" placeholder="Enter Account Number" class="form-control input-md" type="text" required>
  </div>
</div>

<div class="form-group " align="middle">
  <label class="col-md-8 control-label" for="name"></label>  
  <div class="col-md-8">
  <input id="lname" name="lname" placeholder="Enter Bank Name" class="form-control input-md" type="text" required>
    
  </div>
</div>

<div class="form-group " align="middle">
  <label class="col-md-8 control-label" for="name"></label>  
  <div class="col-md-8">
  <input id="contact" name="contact" placeholder="Enter Account Type" class="form-control input-md" type="text" required>
    
  </div>
</div>



<br><br>


<div class="col-md-12" align="middle" style="padding:20px 20px">
<input type="submit" name="proceed"  value="proceed" class="btn btn-primary" />
</div>

</form>'
;

}
?>






</div></div></div></div>
<!--Footer start-->
<div class="row footer">
<div class="col-md-3 box">

</div>

<a href="#" data-toggle="modal"class="btn " style="color:black;" data-target="#login"></a>
<div class="col-md-3 box">

</div>
<div class="col-md-3 box">

<div class="modal fade title1" id="developers">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        
      </div>
	  
      
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!--footer end-->

<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script>


        setTimeout(function() {
            $('#success_message').fadeOut("slow");
        }, 5000 );
           


        function displayVals() {
          var singleValues = $( "#child" ).val();
          //var multipleValues = $( "#multiple" ).val() || [];
          // When using jQuery 3:
          // var multipleValues = $( "#multiple" ).val();
          $( "sam" ).html(  " <h1 align='middle' style='font-size: 30px;'>  ₦" + singleValues +  "<b style='font-size: 10px;'></b> " + "</h1> " );
        }
         
        $( "select" ).change( displayVals );
        displayVals();



        $(document).ready(function(){
    $('select').formSelect();
  });
        </script>

</body>
</html>
