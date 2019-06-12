<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
	{
header('location:index.php');
}
else{

	if(isset($_GET['reply']))
	{
	$replyto=$_GET['reply'];
	}

	if(isset($_POST['submit']))
  {
	$email = $_SESSION['alogin'];
	$query = "SELECT user_id FROM users WHERE email ='$email' ";
	$res = $conn->query($query);
	if($res == false) {
		echo "<script>alert('Sorry Cant find this email')</script>";
	}
	$row = mysqli_fetch_assoc($res);
	$user_id = $row['user_id'];

	$businessName=$_POST['businessName'];
  $category=$_POST['category'];
	$apPassword = $_POST['apPassword'];

	echo "the bus name : ".$businessName."<br>";
	echo "the category name : ".$category."<br>";
	echo "the ap password : ".$apPassword."<br>";
	echo "the user id is : ".$user_id."<br>";
	
$sql = "INSERT INTO `business` (`category`,`business_name`,`user_id`) VALUES ('$category',$businessName,'$user_id');";
if($conn->query($sql) == false) {
	echo "<script>alert('Sorry Cant Insert to this table :(( ')</script>";
}

	if($querynoti === false)
	{
		 user_error("Query failed: ".$conn->error."<br />$sqlnoti");
		 echo "false";
	}

	// $sqlnoti="insert into notification (notiuser,notireciver,notitype) values (:notiuser,:notireciver,:notitype)";
  // $querynoti = $dbh->prepare($sqlnoti);
	// $querynoti-> bindParam(':notiuser', $sender, PDO::PARAM_STR);
	// $querynoti-> bindParam(':notireciver',$reciver, PDO::PARAM_STR);
  // $querynoti-> bindParam(':notitype', $notitype, PDO::PARAM_STR);
  // $querynoti->execute();

	$sqlfeed="insert into feedback (sender, reciver, feedbackdata) values ($user,$reciver,$description)";
	$queryfeed = $conn->query($sqlfeed);
	if($queryfeed === false)
	{
		 user_error("Query failed: ".$conn->error."<br />$sqlfeed");
		 echo "false";
	}

	// $sql="insert into feedback (sender, reciver, feedbackdata) values (:user,:reciver,:description)";
	// $query = $dbh->prepare($sql);
	// $query-> bindParam(':user', $sender, PDO::PARAM_STR);
	// $query-> bindParam(':reciver', $reciver, PDO::PARAM_STR);
	// $query-> bindParam(':description', $message, PDO::PARAM_STR);
  // $query->execute();

	$msg="Feedback Send";
  }
?>

<!doctype html>
<html lang="en" class="no-js">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<meta name="theme-color" content="#3e454c">

	<title>Business Manager</title>

	<!-- Font awesome -->
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<!-- Sandstone Bootstrap CSS -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<!-- Bootstrap Datatables -->
	<link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
	<!-- Bootstrap social button library -->
	<link rel="stylesheet" href="css/bootstrap-social.css">
	<!-- Bootstrap select -->
	<link rel="stylesheet" href="css/bootstrap-select.css">
	<!-- Bootstrap file input -->
	<link rel="stylesheet" href="css/fileinput.min.css">
	<!-- Awesome Bootstrap checkbox -->
	<link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
	<!-- Admin Stye -->
	<link rel="stylesheet" href="css/style.css">
	<link rel = "stylesheet" href = css/main.css

	<script type= "text/javascript" src="../vendor/countries.js"></script>



</head>

<body>
<?php

		$sql = "SELECT * from users;";
		$result = $conn->query($sql);
		if($result === false)
		{
			 user_error("Query failed: ".$conn->error."<br />$sql");
			 echo "false";
		}



		// $sql = "SELECT * from users;";
		// $query = $dbh -> prepare($sql);
		// $query->execute();
		// $result=$query->fetch(PDO::FETCH_OBJ);

		$row = mysqli_fetch_assoc($result);

		$cnt=1;
?>
	<?php include('includes/header.php');?>
	<div class="ts-main-content">
	<?php include('includes/leftbar.php');?>
		<div class="content-wrapper">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-12">
						<div class="row">
							<div class="col-md-12">
                            <center><h2>Business Manager</h2></center>
								<div class="panel panel-default">
									<div class="panel-heading"><center>Build Your Business</center></div>
<?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php }
				else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>

									<div class="panel-body">
<form method="post" class="form-horizontal" enctype="multipart/form-data">

<div class="form-group">
	<label class="col-sm-2 control-label"> Business Name : <span style="color:red">*</span></label>
	<div class="col-sm-4">
	<input type="text" name="businessName" class="form-control"   placeholder="Business Name: " required >
	</div>
</div>


<div class="form-group">
	<label class="col-sm-2 control-label"> Category : <span style="color:red">*</span></label>
	<div class="col-sm-4">
	<input type="text" name="category" class="form-control"   placeholder="Hotel,Restaurant..." required >
	</div>
</div>

<div class="form-group">
	<label class="col-sm-2 control-label"> Acces Point Password: <span style="color:red">*</span></label>
	<div class="col-sm-4">
	<input type="password" name="apPassword" class="form-control"   required >
	</div>
</div>



<div class="form-group">
	<div class="col-sm-8 col-sm-offset-2">
		<button class="btn btn-primary" name="submit" type="submit" style="width:47%;">Build!</button>
	</div>
</div>

</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Loading Scripts -->
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap-select.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.dataTables.min.js"></script>
	<script src="js/dataTables.bootstrap.min.js"></script>
	<script src="js/Chart.min.js"></script>
	<script src="js/fileinput.js"></script>
	<script src="js/chartData.js"></script>
	<script src="js/main.js"></script>
	<script type="text/javascript">
				 $(document).ready(function () {
					setTimeout(function() {
						$('.succWrap').slideUp("slow");
					}, 3000);
					});
	</script>
</body>
</html>
<?php } ?>
