<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
	{
header('location:index.php');
}
else{

if(isset($_POST['submit']))
  {
	$name=$_POST['name'];
	$email=$_POST['email'];

		$sql="UPDATE `users` SET username=$name, email=$email";

		// $sql="UPDATE `users` SET name=$name, email=$email, gender=$gender, mobile=$mobileno, designation=$designation, Image=$image WHERE id=$idedit";
		$query = $conn->query($sql);
		if($result === false)
		{
			 user_error("Query failed: ".$conn->error."<br />$sql2");
			 echo "false";
		}


	// $sql="UPDATE admin SET username=(:name), email=(:email)";
	// $query = $dbh->prepare($sql);
	// $query-> bindParam(':name', $name, PDO::PARAM_STR);
	// $query-> bindParam(':email', $email, PDO::PARAM_STR);
	// $query->execute();
	$msg="Information Updated Successfully";
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

	<title>Edit Admin</title>

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

	<script type= "text/javascript" src="../vendor/countries.js"></script>
	<style>
	.errorWrap {
    padding: 10px;
    margin: 0 0 20px 0;
	background: #dd3d36;
	color:#fff;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
.succWrap{
    padding: 10px;
    margin: 0 0 20px 0;
	background: #5cb85c;
	color:#fff;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
		</style>

</head>

<body>
<?php
		$sql = "SELECT * from admin";
		$query = $conn->query($sql);
		if($query === false)
		{
			 user_error("Query failed: ".$conn->error."<br />$sql2");
			 echo "false";
		}
		$result = mysqli_fetch_assoc($query);

		// $sql = "SELECT * from admin;";
		// $query = $dbh -> prepare($sql);
		// $query->execute();
		// $result=$query->fetch(PDO::FETCH_OBJ);

		$cnt=1;
?>
	<?php include('includes/header.php');?>
	<div class="ts-main-content">
	<?php include('includes/leftbar.php');?>
		<div class="content-wrapper">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-12">
						<h3 class="page-title">Statics</h3>
						<div class="row">
							<div class="col-md-12">
								<div class="panel panel-default">
									<div class="panel-heading">Statics</div>
<?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php }
				else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>

									<div class="panel-body">
<form method="post" class="form-horizontal" enctype="multipart/form-data">




<div id="piechart" style="width: 100%; height: 100%"></div>
<div id="piechart1" style="width: 100%; height: 100%"></div>
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

	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<?php

$sql = "SELECT COUNT(Gender) FROM users WHERE gender= 'male'";
$result = $conn->query($sql);
if($result === false)
{
user_error("Query failed: ".$conn->error."<br />$sql");
echo "false";
}
/*while($row = mysqli_fetch_assoc($result)*/
$row= mysqli_fetch_assoc($result);
 //echo "print someting". $row['COUNT(Gender)']."<br>";

$sql = "SELECT COUNT(Gender) FROM users WHERE gender= 'Female'  OR   gender = 'Famle' ";
$result = $conn->query($sql);
if($result === false)
{
	user_error("Query failed: ".$conn->error."<br />$sql");
	echo "false";
}
	/*while($row = mysqli_fetch_assoc($result)*/
	$row1= mysqli_fetch_assoc($result);
	 //echo "print someting1". $row1['COUNT(Gender)']."<br>";
?>
<script type="text/javascript">
// Load google charts
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);

// Draw the chart and set the chart values
function drawChart() {
var data = google.visualization.arrayToDataTable([
['Gender', 'How many people use the system'],
['Men', <?php echo $row['COUNT(Gender)'];?>],
['Famle', <?php echo $row1['COUNT(Gender)'];?>]
]);

// Optional; add a title and set the width and height of the chart
var options = {'title':'Gender', 'width':550, 'height':400,'is3D': true,};

// Display the chart inside the <div> element with id="piechart"
var chart = new google.visualization.PieChart(document.getElementById('piechart'));
chart.draw(data, options);
}
</script>
<?php
$sql = "SELECT COUNT(birthday) FROM users WHERE birthday BETWEEN '1989-12-01' AND '1999-12-01'";
$result = $conn->query($sql);
if($result === false)
{
	user_error("Query failed: ".$conn->error."<br />$sql");
	echo "false";
}
$row3= mysqli_fetch_assoc($result);
 //echo "print someting". $row3['COUNT(birthday)']."<br>";

 $sql= "SELECT COUNT(birthday) FROM users WHERE birthday BETWEEN '1979-12-01' AND '1989-12-01'";
 $res=$conn->query($sql);
 if(res === false)
 {
	 user_error("Query failed: ".$conn->error."<br />$sql");
	 echo "false";
 }
 $row4= mysqli_fetch_assoc($res);
 //echo "print someting". $row4['COUNT(birthday)']."<br>";


	 $sql= "SELECT COUNT(birthday) FROM users WHERE birthday BETWEEN '1969-12-01' AND '1979-12-01'";
	 $res=$conn->query($sql);
	 if(res === false)
	 {
		 user_error("Query failed: ".$conn->error."<br />$sql");
		 echo "false";
	 }
	 $row5= mysqli_fetch_assoc($res);
		 //echo "print someting". $row5['COUNT(birthday)']."<br>";


?>

<!-- php query for the pie chreat -->
<!--
$sql = "SELECT COUNT(Gender) FROM users WHERE gender= 'male'";
$result = $conn->query($sql);
if($result === false)
{
	user_error("Query failed: ".$conn->error."<br />$sql");
	echo "false";
}
	/*while($row = mysqli_fetch_assoc($result)*/
	$row= mysqli_fetch_assoc($result);
	 echo "print someting". $row['COUNT(Gender)']."<br>";
-->
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<script type="text/javascript">
// Load google charts
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);

// Draw the chart and set the chart values
function drawChart() {
var data = google.visualization.arrayToDataTable([
['Task', 'Hours per Day'],
['20-30', <?php echo $row3['COUNT(birthday)'];?>],
['30-40', <?php echo $row4['COUNT(birthday)'];?>],
['40-50', <?php echo $row5['COUNT(birthday)'];?>]
]);

// Optional; add a title and set the width and height of the chart
var options = {'title':'Age', 'width':550, 'height':400};

// Display the chart inside the <div> element with id="piechart"
var chart = new google.visualization.PieChart(document.getElementById('piechart1'));
chart.draw(data, options);
}
</script>
</body>
</html>
<?php } ?>
