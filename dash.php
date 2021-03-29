<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Crown software </title>
<link  rel="stylesheet" href="css/bootstrap.min.css"/>
 <link  rel="stylesheet" href="css/bootstrap-theme.min.css"/>    
 <link rel="stylesheet" href="css/main.css">
 <link  rel="stylesheet" href="css/font.css">
 <script src="js/jquery.js" type="text/javascript"></script>

  <script src="js/bootstrap.min.js"  type="text/javascript"></script>
 	<link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>

<script>
$(function () {
    $(document).on( 'scroll', function(){
        console.log('scroll top : ' + $(window).scrollTop());
        if($(window).scrollTop()>=$(".logo").height())
        {
             $(".navbar").addClass("navbar-fixed-top");
        }

        if($(window).scrollTop()<$(".logo").height())
        {
             $(".navbar").removeClass("navbar-fixed-top");
        }
    });
});</script>
</head>

<body  style="background:#eee;">
<div class="header">
<div class="row">
<div class="col-lg-6">
<span class="logo" style="color:white;">Easy Lend</span></div>
<?php
 include_once 'dbConnection.php';
session_start();
$email=$_SESSION['email'];
  if(!(isset($_SESSION['email']))){
header("location:index.php");

}
else
{
$name = $_SESSION['email'];;

include_once 'dbConnection.php';
echo '<span class="pull-right top title1" style="color:white;"><span style="color:white" class="log1"><span style="color:white;" class="glyphicon glyphicon-user" aria-hidden="true"></span>&nbsp;&nbsp;&nbsp;&nbsp;Hello,</span> <a href="index.php" class="log log1" style="color:white;">Admin</a>&nbsp;|&nbsp;<a href="logout.php?q=index.php" class="log" style="color:white;f"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span>&nbsp;Signout</button></a></span>';
}?>

</div></div>
<!-- admin start-->

<!--navigation menu-->
<nav class="navbar navbar-default title1">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="dash.php?q=1"><b>Dashboard</b></a>
    </div>
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
       
        <li <?php if(@$_GET['q']==1) echo'class="active"'; ?>><a href="dash.php?q=1">Records</a></li>
       
		
        </li><li class="pull-right"> <a href="logout.php?q=index.php"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span>&nbsp;&nbsp;&nbsp;&nbsp;Signout</a></li>
		
      </ul>
          </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
<!--navigation menu closed-->
<div class="container"><!--container start-->
<div class="row">
<div class="col-md-12">
<!--home start-->


<!--home closed-->
<!--users start-->

<?php if(@$_GET['q']==1) {
$result = mysqli_query($con,"SELECT * FROM admin ") or die('Error');

echo  '<div class="panel"><div class="table-responsive"><table class="table table-striped title1">';
echo '<form role="form" method="post" action="update.php?q=register" >

<div class="form-group col-md-4">
<input type="text" name="email" placeholder="Email addesss" class="form-control"/> 
</div>

<div class="form-group col-md-4">
<input type="date" name="expiry" title="Expiry Date" class="form-control"/>
</div>


<div class="form-group col-md-4" align="middle">
<input type="submit" name="SUBMIT" value="Update" class="btn btn-primary" />
</div>
</form>'
;
if(@$_GET['q7'])
{ echo'<p id="success_message" align="middle" style="color:green;font-size:15px;"><b>'.@$_GET['q7'].'</b></p>';}
echo '
<tr><td><b>S.N.</b></td><td><b>Name</b></td><td><b>Contact</b></td><td><b>Email</b></td><td><b>Home Address</b></td><td><b>Business Name</b></td><td><b>Business Decription</b></td><td><b>BAmount</b></td><td><b>Date</b></td><td><b>Delete</b></td><td><b>Update</b></td></tr>';
$c=1;
while($row = mysqli_fetch_array($result)) {
	$accnum = $row['accnum'];
	$bankname = $row['bankname'];
	$fname = $row['fname'];
  $lname = $row['lname'];
  $contact = $row['contact'];
  $mail = $row['mail'];
  $state = $row['state'];
  $business = $row['business'];
  $description = $row['description'];
  $dob = $row['dob'];
  $bvn = $row['bvn'];
  $datee = $row['datee'];
  $amount = $row['amount'];

	//$college = $row['college'];

	echo '<tr><td>'.$c++.'</td><td>'.$fname.' '.$lname.'</td><td>'.$contact.'</td><td>'.$mail.'</td><td>'.$state.'</td><td>'.$business.'</td><td>'.$description.'</td><td>'.$amount.'</td><td>'.$datee.'</td>
  <td><a title="Delete User" href="update.php?demail='.$contact.'"><b style="color:red"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></b></a></td>
  <td><a title="Update User" href="dash.php?q=121&demail='.$contact.'"><b style="color:green"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></b></a></td></tr>';

}
$c=0;
echo '</table></div></div>';

}?>




<?php if(@$_GET['q']=='2') {


if(isset($_REQUEST['update_id']))
{
	try
	{
		$id = $_REQUEST['update_id']; //get "update_id" from index.php page through anchor tag operation and store in "$id" variable
		$select_stmt=mysqli_query($con,"SELECT * FROM video_file WHERE id ='$id' ") or die('Error');
    // $select_stmt = $db->prepare('SELECT * FROM video_file WHERE id =:id'); //sql select query
		// $select_stmt->bindParam(':id',$id);
		// $select_stmt->execute(); 
    $row = mysqli_fetch_array($select_stmt);
		//$row = $select_stmt->fetch(PDO::FETCH_ASSOC);
		extract($row);
	}
	catch(PDOException $e)
	{
		$e->getMessage();
	}
	
}

if(isset($_REQUEST['btn_update']))
{
	try
	{
		$name	=$_REQUEST['txt_name'];	//textbox name "txt_name"
		
		$image_file	= $_FILES["txt_file"]["name"];
		$type		= $_FILES["txt_file"]["type"];	//file name "txt_file"
		$size		= $_FILES["txt_file"]["size"];
		$temp		= $_FILES["txt_file"]["tmp_name"];
			
		$path="upload/".$image_file; //set upload folder path
		
		$directory="upload/"; //set upload folder path for update time previous file remove and new file upload for next use
		
		if($image_file)
		{
			if($type !="image/jpg") //check file extension
			{	
				if(!file_exists($path)) //check file not exist in your upload folder path
				{
					if($size < 5555000000) //check file size 5MB
					{
						unlink($directory.$row['image']); //unlink function remove previous file
						move_uploaded_file($temp, "upload/" .$image_file);	//move upload file temperory directory to your upload folder	
					}
					else
					{
						$errorMsg="Your File To large Please Upload 5MB Size"; //error message file size not large than 5MB
					}
				}
				else
				{	
					$errorMsg="File Already Exists...Check Upload Folder"; //error message file not exists your upload folder path
				}
			}
			else
			{
				$errorMsg="Upload JPG, JPEG, PNG & GIF File Formate.....CHECK FILE EXTENSION"; //error message file extension
			}
		}
		else
		{
			$image_file=$row['image']; //if you not select new image than previous image sam it is it.
		}
	
		if(!isset($errorMsg))
		{
      $update_stmt=mysqli_query($con,"UPDATE video_file SET name='$name', image='$image_file' WHERE id='$id' ") or die('Error');
			// $update_stmt=$db->prepare('UPDATE video_file SET name=:name_up, image=:file_up WHERE id=:id'); //sql update query
			// $update_stmt->bindParam(':name_up',$name);
			// $update_stmt->bindParam(':file_up',$image_file);	//bind all parameter
			// $update_stmt->bindParam(':id',$id);
			 
			if($update_stmt)
			{
				$updateMsg="File Update Successfully.......";	//file update success message
				header("refresh:3;dash.php?q=1");	//refresh 3 second and redirect to index.php page
			}
		}
	}
	catch(PDOException $e)
	{
		echo $e->getMessage();
	}
	
}


if(isset($errorMsg))
		{
			?>
            <div class="alert alert-danger">
            	<strong>WRONG ! <?php echo $errorMsg; ?></strong>
            </div>
            <?php
		}
		if(isset($updateMsg)){
		?>
			<div class="alert alert-success">
				<strong>UPDATE ! <?php echo $updateMsg; ?></strong>
			</div>
        <?php
		}

    echo '
    <form method="post" class="form-horizontal" enctype="multipart/form-data">
					
				<div class="form-group">
				<label class="col-sm-3 control-label">Name</label>
				<div class="col-sm-6">
				<input type="text" name="txt_name" class="form-control" value="'.$name.'" required/>
				</div>
				</div>
					
					
				<div class="form-group">
				<label class="col-sm-3 control-label">File</label>
				<div class="col-sm-6">
				<input type="file" name="txt_file" class="form-control" value="'.$image.'"/>
				<p><img src="upload/'.$image.'" height="100" width="100" /></p>
				</div>
				</div>
					
					
				<div class="form-group">
				<div class="col-sm-offset-3 col-sm-9 m-t-15">
				<input type="submit"  name="btn_update" class="btn btn-primary" value="Update">
				<a href="index.php" class="btn btn-danger">Cancel</a>
				</div>
				</div>
					
			</form>
    ';

}?>





<?php if(@$_GET['q']=='3') {


if(isset($_REQUEST['update_id']))
{
		$id = $_REQUEST['update_id']; //get "update_id" from index.php page through anchor tag operation and store in "$id" variable
		global $video_path;
      $video_path ='upload/';


      $query = mysqli_query($con,"SELECT * FROM video_file WHERE id='$id' ") or die('Error');
      // $query = "SELECT * FROM video_file WHERE id='$id' ";
      // $sql=mysqli_query($GLOBALS['con'],$query);
      $row = mysqli_fetch_array($query);

      echo '
      <video width="80%" height="50%" controls>
<source src="'.$GLOBALS['video_path'].$row['image'].'" type="video/mp4">
</video>
      ';
    

}

}?>


<?php if(@$_GET['q']==10) {
	
	if(isset($_REQUEST['delete_id']))
	{
		// select image from db to delete
		$id=$_REQUEST['delete_id'];	//get delete_id and store in $id variable
		
    $select_stmt= mysqli_query($con,"SELECT * FROM audio_file WHERE id ='$id' ") or die('Error');
		// $select_stmt= $con->prepare('SELECT * FROM video_file WHERE id =:id');	//sql select query
		// $select_stmt->bindParam(':id',$id);
		// $select_stmt->execute();
    $row = mysqli_fetch_array($select_stmt);
		//$row=$select_stmt->fetch(PDO::FETCH_ASSOC);
		unlink("upload2/".$row['image']); //unlink function permanently remove your file
		
		//delete an orignal record from db
    $delete_stmt = mysqli_query($con,"DELETE FROM audio_file WHERE id='$id' ") or die('Error');
		// $delete_stmt = $con->prepare('DELETE FROM video_file WHERE id =:id');
		// $delete_stmt->bindParam(':id',$id);
		// $delete_stmt->execute();
		
		header("Location:dash.php?q=11");
	}

  echo '
  <div class="wrapper">
	
	<div class="container">
			
		<div class="col-lg-12">
			<div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           <h3><a href="dash.php?q=11"><span class="glyphicon glyphicon-plus"></span>&nbsp; Add File</a></h3>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>File</th>
                                            <th>Edit</th>
                                            <th>View</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
  ';

  $select_stmt=mysqli_query($con,"SELECT * FROM audio_file") or die('Error');
  // $select_stmt=$con->prepare("SELECT * FROM video_file");	//sql select query
  // $select_stmt->execute();
  while($row = mysqli_fetch_array($select_stmt)) {
  ?>
                        <tr>
                            <td><?php echo $row['name']; ?></td>
                            <td><img src="upload2/<?php echo $row['image']; ?>" width="100px" height="60px"></td>
                            <td><a href="dash.php?q=21&update_id=<?php echo $row['id']; ?>" class="btn btn-warning">Edit</a></td>
                            <td><a href="dash.php?q=31&update_id=<?php echo $row['id']; ?>" class="btn btn-primary">View</a></td>
                            <td><a href="?delete_id=<?php echo $row['id']; ?>" class="btn btn-danger">Delete</a></td>
                        </tr>
                    <?php
  }

  echo '
  </tbody>
  </table>
</div>
<!-- /.table-responsive -->
</div>
<!-- /.panel-body -->
</div>
<!-- /.panel -->
</div>

</div>

</div>

</div>
  ';
	
}?>



<?php if(@$_GET['q']==11) {

if(isset($_REQUEST['btn_insert']))
{
	try
	{
		$name	= $_REQUEST['txt_name'];	//textbox name "txt_name"
			
		$image_file	= $_FILES["txt_file"]["name"];
		$type		= $_FILES["txt_file"]["type"];	//file name "txt_file"	
		$size		= $_FILES["txt_file"]["size"];
		$temp		= $_FILES["txt_file"]["tmp_name"];
		
		$path="upload2/".$image_file; //set upload folder path
		
		if(empty($name)){
			$errorMsg="Please Enter Name";
		}
		else if(empty($image_file)){
			$errorMsg="Please Select Audio";
		}
		else if($type ="mp3" ) //check file extension
		{	
			if(!file_exists($path)) //check file not exist in your upload folder path
			{
				if($size < 555000000) //check file size 5MB
				{
					move_uploaded_file($temp, "upload2/" .$image_file); //move upload file temperory directory to your upload folder
				}
				else
				{
					$errorMsg="Your File To large Please Upload 5MB Size"; //error message file size not large than 5MB
				}
			}
			else
			{	
				$errorMsg="File Already Exists...Check Upload Folder"; //error message file not exists your upload folder path
			}
		}
		else
		{
			$errorMsg="Upload .MP3 only.....CHECK FILE EXTENSION"; //error message file extension
		}
		
		if(!isset($errorMsg))
		{
			$insert_stmt=mysqli_query($con,"INSERT INTO audio_file(name,image) VALUES('$name','$image_file')") or die('Error');
      
      // $insert_stmt=$con->prepare('INSERT INTO video_file(name,image) VALUES(:fname,:fimage)'); //sql insert query					
			// $insert_stmt->bindParam(':fname',$name);	
			// $insert_stmt->bindParam(':fimage',$image_file);	  //bind all parameter 
		
			if($insert_stmt)
			{
				$insertMsg="File Upload Successfully........"; //execute query success message
				header("refresh:3;dash.php?q=11"); //refresh 3 second and redirect to index.php page
			}
		}
	}
	catch(PDOException $e)
	{
		echo $e->getMessage();
	}
}


if(isset($errorMsg))
		{
			?>
            <div class="alert alert-danger">
            	<strong>WRONG ! <?php echo $errorMsg; ?></strong>
            </div>
            <?php
		}
		if(isset($insertMsg)){
		?>
			<div class="alert alert-success">
				<strong>SUCCESS ! <?php echo $insertMsg; ?></strong>
			</div>
        <?php
		}

    echo '
    <form method="post" class="form-horizontal" enctype="multipart/form-data">
					
				<div class="form-group">
				<label class="col-sm-3 control-label">Name</label>
				<div class="col-sm-6">
				<input type="text" name="txt_name" class="form-control" placeholder="enter name" />
				</div>
				</div>
					
					
				<div class="form-group">
				<label class="col-sm-3 control-label">File</label>
				<div class="col-sm-6">
				<input type="file" name="txt_file" class="form-control" />
				</div>
				</div>
					
					
				<div class="form-group">
				<div class="col-sm-offset-3 col-sm-9 m-t-15">
				<input type="submit"  name="btn_insert" class="btn btn-success " value="Insert">
				<a href="index.php" class="btn btn-danger">Cancel</a>
				</div>
				</div>
					
			</form>
    ';

}?>


<?php if(@$_GET['q']=='21') {


if(isset($_REQUEST['update_id']))
{
	try
	{
		$id = $_REQUEST['update_id']; //get "update_id" from index.php page through anchor tag operation and store in "$id" variable
		$select_stmt=mysqli_query($con,"SELECT * FROM audio_file WHERE id ='$id' ") or die('Error');
    // $select_stmt = $db->prepare('SELECT * FROM video_file WHERE id =:id'); //sql select query
		// $select_stmt->bindParam(':id',$id);
		// $select_stmt->execute(); 
    $row = mysqli_fetch_array($select_stmt);
		//$row = $select_stmt->fetch(PDO::FETCH_ASSOC);
		extract($row);
	}
	catch(PDOException $e)
	{
		$e->getMessage();
	}
	
}

if(isset($_REQUEST['btn_update']))
{
	try
	{
		$name	=$_REQUEST['txt_name'];	//textbox name "txt_name"
		
		$image_file	= $_FILES["txt_file"]["name"];
		$type		= $_FILES["txt_file"]["type"];	//file name "txt_file"
		$size		= $_FILES["txt_file"]["size"];
		$temp		= $_FILES["txt_file"]["tmp_name"];
			
		$path="upload2/".$image_file; //set upload folder path
		
		$directory="upload2/"; //set upload folder path for update time previous file remove and new file upload for next use
		
		if($image_file)
		{
			if($type ="mp3") //check file extension
			{	
				if(!file_exists($path)) //check file not exist in your upload folder path
				{
					if($size < 5555000000) //check file size 5MB
					{
						unlink($directory.$row['image']); //unlink function remove previous file
						move_uploaded_file($temp, "upload2/" .$image_file);	//move upload file temperory directory to your upload folder	
					}
					else
					{
						$errorMsg="Your File To large Please Upload 5MB Size"; //error message file size not large than 5MB
					}
				}
				else
				{	
					$errorMsg="File Already Exists...Check Upload Folder"; //error message file not exists your upload folder path
				}
			}
			else
			{
				$errorMsg="Upload mp3 only.....CHECK FILE EXTENSION"; //error message file extension
			}
		}
		else
		{
			$image_file=$row['image']; //if you not select new image than previous image sam it is it.
		}
	
		if(!isset($errorMsg))
		{
      $update_stmt=mysqli_query($con,"UPDATE audio_file SET name='$name', image='$image_file' WHERE id='$id' ") or die('Error');
			// $update_stmt=$db->prepare('UPDATE video_file SET name=:name_up, image=:file_up WHERE id=:id'); //sql update query
			// $update_stmt->bindParam(':name_up',$name);
			// $update_stmt->bindParam(':file_up',$image_file);	//bind all parameter
			// $update_stmt->bindParam(':id',$id);
			 
			if($update_stmt)
			{
				$updateMsg="File Update Successfully.......";	//file update success message
				header("refresh:3;dash.php?q=11");	//refresh 3 second and redirect to index.php page
			}
		}
	}
	catch(PDOException $e)
	{
		echo $e->getMessage();
	}
	
}


if(isset($errorMsg))
		{
			?>
            <div class="alert alert-danger">
            	<strong>WRONG ! <?php echo $errorMsg; ?></strong>
            </div>
            <?php
		}
		if(isset($updateMsg)){
		?>
			<div class="alert alert-success">
				<strong>UPDATE ! <?php echo $updateMsg; ?></strong>
			</div>
        <?php
		}

    echo '
    <form method="post" class="form-horizontal" enctype="multipart/form-data">
					
				<div class="form-group">
				<label class="col-sm-3 control-label">Name</label>
				<div class="col-sm-6">
				<input type="text" name="txt_name" class="form-control" value="'.$name.'" required/>
				</div>
				</div>
					
					
				<div class="form-group">
				<label class="col-sm-3 control-label">File</label>
				<div class="col-sm-6">
				<input type="file" name="txt_file" class="form-control" value="'.$image.'"/>
				<p><img src="upload2/'.$image.'" height="100" width="100" /></p>
				</div>
				</div>
					
					
				<div class="form-group">
				<div class="col-sm-offset-3 col-sm-9 m-t-15">
				<input type="submit"  name="btn_update" class="btn btn-primary" value="Update">
				<a href="index.php" class="btn btn-danger">Cancel</a>
				</div>
				</div>
					
			</form>
    ';

}?>





<?php if(@$_GET['q']=='31') {


if(isset($_REQUEST['update_id']))
{
		$id = $_REQUEST['update_id']; //get "update_id" from index.php page through anchor tag operation and store in "$id" variable
		global $video_path;
      $video_path ='upload2/';


      $query = mysqli_query($con,"SELECT * FROM audio_file WHERE id='$id' ") or die('Error');
      // $query = "SELECT * FROM video_file WHERE id='$id' ";
      // $sql=mysqli_query($GLOBALS['con'],$query);
      $row = mysqli_fetch_array($query);

      echo '
      <audio  width="80%" height="50%" controls>
          <source src="'.$GLOBALS['video_path'].$row['image'].'" type="audio/mp3">
        </audio>
      
      
      ';
    

}

}?>







<?php if(@$_GET['q']==101) {
	
	if(isset($_REQUEST['delete_id']))
	{
		// select image from db to delete
		$id=$_REQUEST['delete_id'];	//get delete_id and store in $id variable
		
    $select_stmt= mysqli_query($con,"SELECT * FROM pdf_file WHERE id ='$id' ") or die('Error');
		// $select_stmt= $con->prepare('SELECT * FROM video_file WHERE id =:id');	//sql select query
		// $select_stmt->bindParam(':id',$id);
		// $select_stmt->execute();
    $row = mysqli_fetch_array($select_stmt);
		//$row=$select_stmt->fetch(PDO::FETCH_ASSOC);
		unlink("upload3/".$row['image']); //unlink function permanently remove your file
		
		//delete an orignal record from db
    $delete_stmt = mysqli_query($con,"DELETE FROM pdf_file WHERE id='$id' ") or die('Error');
		// $delete_stmt = $con->prepare('DELETE FROM video_file WHERE id =:id');
		// $delete_stmt->bindParam(':id',$id);
		// $delete_stmt->execute();
		
		header("Location:dash.php?q=111");
	}

  echo '
  <div class="wrapper">
	
	<div class="container">
			
		<div class="col-lg-12">
			<div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           <h3><a href="dash.php?q=111"><span class="glyphicon glyphicon-plus"></span>&nbsp; Add File</a></h3>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>File</th>
                                            <th>Edit</th>
                                            <th>View</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
  ';

  $select_stmt=mysqli_query($con,"SELECT * FROM pdf_file") or die('Error');
  // $select_stmt=$con->prepare("SELECT * FROM video_file");	//sql select query
  // $select_stmt->execute();
  while($row = mysqli_fetch_array($select_stmt)) {
  ?>
                        <tr>
                            <td><?php echo $row['name']; ?></td>
                            <td><img src="upload3/<?php echo $row['image']; ?>" width="100px" height="60px"></td>
                            <td><a href="dash.php?q=211&update_id=<?php echo $row['id']; ?>" class="btn btn-warning">Edit</a></td>
                            <td><a href="dash.php?q=311&update_id=<?php echo $row['id']; ?>" class="btn btn-primary">View</a></td>
                            <td><a href="?delete_id=<?php echo $row['id']; ?>" class="btn btn-danger">Delete</a></td>
                        </tr>
                    <?php
  }

  echo '
  </tbody>
  </table>
</div>
<!-- /.table-responsive -->
</div>
<!-- /.panel-body -->
</div>
<!-- /.panel -->
</div>

</div>

</div>

</div>
  ';
	
}?>



<?php if(@$_GET['q']==111) {

if(isset($_REQUEST['btn_insert']))
{
	try
	{
		$name	= $_REQUEST['txt_name'];	//textbox name "txt_name"
			
		$image_file	= $_FILES["txt_file"]["name"];
		$type		= $_FILES["txt_file"]["type"];	//file name "txt_file"	
		$size		= $_FILES["txt_file"]["size"];
		$temp		= $_FILES["txt_file"]["tmp_name"];
		
		$path="upload3/".$image_file; //set upload folder path
		
		if(empty($name)){
			$errorMsg="Please Enter Name";
		}
		else if(empty($image_file)){
			$errorMsg="Please Select PDF";
		}
		else if($type ="pdf" ) //check file extension
		{	
			if(!file_exists($path)) //check file not exist in your upload folder path
			{
				if($size < 555000000) //check file size 5MB
				{
					move_uploaded_file($temp, "upload3/" .$image_file); //move upload file temperory directory to your upload folder
				}
				else
				{
					$errorMsg="Your File To large Please Upload 5MB Size"; //error message file size not large than 5MB
				}
			}
			else
			{	
				$errorMsg="File Already Exists...Check Upload Folder"; //error message file not exists your upload folder path
			}
		}
		else
		{
			$errorMsg="Upload .PDF only.....CHECK FILE EXTENSION"; //error message file extension
		}
		
		if(!isset($errorMsg))
		{
			$insert_stmt=mysqli_query($con,"INSERT INTO pdf_file(name,image) VALUES('$name','$image_file')") or die('Error');
      
      // $insert_stmt=$con->prepare('INSERT INTO video_file(name,image) VALUES(:fname,:fimage)'); //sql insert query					
			// $insert_stmt->bindParam(':fname',$name);	
			// $insert_stmt->bindParam(':fimage',$image_file);	  //bind all parameter 
		
			if($insert_stmt)
			{
				$insertMsg="File Upload Successfully........"; //execute query success message
				header("refresh:3;dash.php?q=111"); //refresh 3 second and redirect to index.php page
			}
		}
	}
	catch(PDOException $e)
	{
		echo $e->getMessage();
	}
}


if(isset($errorMsg))
		{
			?>
            <div class="alert alert-danger">
            	<strong>WRONG ! <?php echo $errorMsg; ?></strong>
            </div>
            <?php
		}
		if(isset($insertMsg)){
		?>
			<div class="alert alert-success">
				<strong>SUCCESS ! <?php echo $insertMsg; ?></strong>
			</div>
        <?php
		}

    echo '
    <form method="post" class="form-horizontal" enctype="multipart/form-data">
					
				<div class="form-group">
				<label class="col-sm-3 control-label">Name</label>
				<div class="col-sm-6">
				<input type="text" name="txt_name" class="form-control" placeholder="enter name" />
				</div>
				</div>
					
					
				<div class="form-group">
				<label class="col-sm-3 control-label">File</label>
				<div class="col-sm-6">
				<input type="file" name="txt_file" class="form-control" />
				</div>
				</div>
					
					
				<div class="form-group">
				<div class="col-sm-offset-3 col-sm-9 m-t-15">
				<input type="submit"  name="btn_insert" class="btn btn-success " value="Insert">
				<a href="index.php" class="btn btn-danger">Cancel</a>
				</div>
				</div>
					
			</form>
    ';

}?>


<?php if(@$_GET['q']=='211') {


if(isset($_REQUEST['update_id']))
{
	try
	{
		$id = $_REQUEST['update_id']; //get "update_id" from index.php page through anchor tag operation and store in "$id" variable
		$select_stmt=mysqli_query($con,"SELECT * FROM pdf_file WHERE id ='$id' ") or die('Error');
    // $select_stmt = $db->prepare('SELECT * FROM video_file WHERE id =:id'); //sql select query
		// $select_stmt->bindParam(':id',$id);
		// $select_stmt->execute(); 
    $row = mysqli_fetch_array($select_stmt);
		//$row = $select_stmt->fetch(PDO::FETCH_ASSOC);
		extract($row);
	}
	catch(PDOException $e)
	{
		$e->getMessage();
	}
	
}

if(isset($_REQUEST['btn_update']))
{
	try
	{
		$name	=$_REQUEST['txt_name'];	//textbox name "txt_name"
		
		$image_file	= $_FILES["txt_file"]["name"];
		$type		= $_FILES["txt_file"]["type"];	//file name "txt_file"
		$size		= $_FILES["txt_file"]["size"];
		$temp		= $_FILES["txt_file"]["tmp_name"];
			
		$path="upload3/".$image_file; //set upload folder path
		
		$directory="upload3/"; //set upload folder path for update time previous file remove and new file upload for next use
		
		if($image_file)
		{
			if($type ="pdf") //check file extension
			{	
				if(!file_exists($path)) //check file not exist in your upload folder path
				{
					if($size < 5555000000) //check file size 5MB
					{
						unlink($directory.$row['image']); //unlink function remove previous file
						move_uploaded_file($temp, "upload3/" .$image_file);	//move upload file temperory directory to your upload folder	
					}
					else
					{
						$errorMsg="Your File To large Please Upload 5MB Size"; //error message file size not large than 5MB
					}
				}
				else
				{	
					$errorMsg="File Already Exists...Check Upload Folder"; //error message file not exists your upload folder path
				}
			}
			else
			{
				$errorMsg="Upload .PDF only.....CHECK FILE EXTENSION"; //error message file extension
			}
		}
		else
		{
			$image_file=$row['image']; //if you not select new image than previous image sam it is it.
		}
	
		if(!isset($errorMsg))
		{
      $update_stmt=mysqli_query($con,"UPDATE pdf_file SET name='$name', image='$image_file' WHERE id='$id' ") or die('Error');
			// $update_stmt=$db->prepare('UPDATE video_file SET name=:name_up, image=:file_up WHERE id=:id'); //sql update query
			// $update_stmt->bindParam(':name_up',$name);
			// $update_stmt->bindParam(':file_up',$image_file);	//bind all parameter
			// $update_stmt->bindParam(':id',$id);
			 
			if($update_stmt)
			{
				$updateMsg="File Update Successfully.......";	//file update success message
				header("refresh:3;dash.php?q=111");	//refresh 3 second and redirect to index.php page
			}
		}
	}
	catch(PDOException $e)
	{
		echo $e->getMessage();
	}
	
}


if(isset($errorMsg))
		{
			?>
            <div class="alert alert-danger">
            	<strong>WRONG ! <?php echo $errorMsg; ?></strong>
            </div>
            <?php
		}
		if(isset($updateMsg)){
		?>
			<div class="alert alert-success">
				<strong>UPDATE ! <?php echo $updateMsg; ?></strong>
			</div>
        <?php
		}

    echo '
    <form method="post" class="form-horizontal" enctype="multipart/form-data">
					
				<div class="form-group">
				<label class="col-sm-3 control-label">Name</label>
				<div class="col-sm-6">
				<input type="text" name="txt_name" class="form-control" value="'.$name.'" required/>
				</div>
				</div>
					
					
				<div class="form-group">
				<label class="col-sm-3 control-label">File</label>
				<div class="col-sm-6">
				<input type="file" name="txt_file" class="form-control" value="'.$image.'"/>
				<p><img src="upload2/'.$image.'" height="100" width="100" /></p>
				</div>
				</div>
					
					
				<div class="form-group">
				<div class="col-sm-offset-3 col-sm-9 m-t-15">
				<input type="submit"  name="btn_update" class="btn btn-primary" value="Update">
				<a href="index.php" class="btn btn-danger">Cancel</a>
				</div>
				</div>
					
			</form>
    ';

}?>





<?php if(@$_GET['q']=='311') {


if(isset($_REQUEST['update_id']))
{
		$id = $_REQUEST['update_id']; //get "update_id" from index.php page through anchor tag operation and store in "$id" variable
		global $video_path;
      $video_path ='upload3/';


      $query = mysqli_query($con,"SELECT * FROM pdf_file WHERE id='$id' ") or die('Error');
      // $query = "SELECT * FROM video_file WHERE id='$id' ";
      // $sql=mysqli_query($GLOBALS['con'],$query);
      $row = mysqli_fetch_array($query);

      echo '
      
      <embed src="'.$GLOBALS['video_path'].$row['image'].'" type="application/pdf"   height="700px" width="700px">
      ';
    

}

}?>

<script>


setTimeout(function() {
            $('#success_message').fadeOut("slow");
        }, 5000 );
</script>



</div><!--container closed-->
</div></div>
</body>
</html>
