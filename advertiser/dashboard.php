<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
	{
header('location:../index.php');
}
else{
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

	<title>Advertiser Dashboard</title>

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
</head>

<body>
<?php include('includes/header.php');?>

	<div class="ts-main-content">
<?php include('includes/leftbar.php');?>
		<div class="content-wrapper">
			<div class="container-fluid">

				<div class="row">
					<div class="col-md-12">
						<!--  hello form dashboard -->
						<h2 class="page-title">dashboard</h2>

						<div class="row">
							<div class="col-md-12">
								<div class="row">
									<div class="col-md-3">
										<div class="panel panel-default">
											<div class="panel-body bk-primary text-light">
												<div class="stat-panel text-center">
<?php
/////////////////////////
////	new code
/////////////////////////
$sql ="SELECT id from users";

$result = $conn->query($sql);
if($result === false)
{
   user_error("Query failed: ".$conn->error."<br />$sql");
   echo "false";
}
if($result->num_rows == 0)
{
  echo "<script>alert('Invalid Details Or admin Details - users');</script>";
}else{

	$bg=mysqli_num_rows($result);
  }

////////////////////////////////////
/////	original code
///////////////////
// $sql ="SELECT id from users";
// $query = $dbh -> prepare($sql);
// $query->execute();
// $results=$query->fetchAll(PDO::FETCH_OBJ);
// $bg=$query->rowCount();
///////////////////////////////////
?>
													<div class="stat-panel-number h1 "><?php echo htmlentities($bg);?></div>
													<div class="stat-panel-title text-uppercase">Knowledge of Customers</div>
												</div>
											</div>
											<a href="userlist.php" class="block-anchor panel-footer">Knowledge of Customers< <i class="fa fa-arrow-right"></i></a>
										</div>
									</div>
									<div class="col-md-3">
										<div class="panel panel-default">
											<div class="panel-body bk-success text-light">
												<div class="stat-panel text-center">

<?php
/////////////////////////
////	new code
/////////////////////////
$reciver = 'Admin';
$sql1 ="SELECT id from feedback where reciver = $reciver";

$result1 = $conn->query($sql);
if($result1 === false)
{
   user_error("Query failed: ".$conn->error."<br />$sql");
   echo "false";
}
if($result1->num_rows == 0)
{
  echo "<script>alert('Invalid Details Or admin Details - reciver');</script>";
}else{

	$regbd=mysqli_num_rows($result1);
  }


////////////////////////////////////
/////	original code
///////////////////
// $reciver = 'Admin';
// $sql1 ="SELECT id from feedback where reciver = (:reciver)";
// $query1 = $dbh -> prepare($sql1);;
// $query1-> bindParam(':reciver', $reciver, PDO::PARAM_STR);
// $query1->execute();
// $results1=$query1->fetchAll(PDO::FETCH_OBJ);
// $regbd=$query1->rowCount();
/////////////////////
?>
													<div class="stat-panel-number h1 "><?php echo htmlentities($regbd);?></div>
													<div class="stat-panel-title text-uppercase">Creating Campaigns</div>
												</div>
											</div>
											<a href="feedback.php" class="block-anchor panel-footer text-center">Creating Campaigns&nbsp; <i class="fa fa-arrow-right"></i></a>
										</div>
									</div>

													<div class="col-md-3">
										<div class="panel panel-default">
											<div class="panel-body bk-danger text-light">
												<div class="stat-panel text-center">

<?php
/////////////////////////
////	new code
/////////////////////////
$reciver = 'Admin';
$sql12 ="SELECT id from notification where notireciver ='$reciver'";

$results12 = $conn->query($sql);
if($results12 === false)
{
   user_error("Query failed: ".$conn->error."<br />$sql");
   echo "false";
}
if($results12->num_rows == 0)
{
  echo "<script>alert('Invalid Details Or admin Details - reciver');</script>";
}else{

	$regbd2=mysqli_num_rows($results12);
  }

////////////////////////////////////
/////	original code
///////////////////
// $reciver = 'Admin';
// $sql12 ="SELECT id from notification where notireciver = (:reciver)";
// $query12 = $dbh -> prepare($sql12);;
// $query12-> bindParam(':reciver', $reciver, PDO::PARAM_STR);
// $query12->execute();
// $results12=$query12->fetchAll(PDO::FETCH_OBJ);
// $regbd2=$query12->rowCount();
//////////////////////////////
?>
													<div class="stat-panel-number h1 "><?php echo htmlentities($regbd2);?></div>
													<div class="stat-panel-title text-uppercase">Advertiser Campaigns</div>
												</div>
											</div>
											<a href="notification.php" class="block-anchor panel-footer text-center">Advertiser Campaigns &nbsp; <i class="fa fa-arrow-right"></i></a>
										</div>
									</div>
									<div class="col-md-3">
										<div class="panel panel-default">
											<div class="panel-body bk-info text-light">
												<div class="stat-panel text-center">
<?php
/////////////////////////
////	new code
/////////////////////////
$sql6 ="SELECT id from deleteduser ";

$results123 = $conn->query($sql);
if($results12 === false)
{
   user_error("Query failed: ".$conn->error."<br />$sql");
   echo "false";
}
if($results123->num_rows == 0)
{
  echo "<script>alert('Invalid Details Or admin Details - reciver');</script>";
}else{

	$query=mysqli_num_rows($results123);
  }


////////////////////////////////////
/////	original code
///////////////////
// $sql6 ="SELECT id from deleteduser ";
// $query6 = $dbh -> prepare($sql6);;
// $query6->execute();
// $results6=$query6->fetchAll(PDO::FETCH_OBJ);
// $query=$query6->rowCount();
//////////////////////////
?>
													<div class="stat-panel-number h1 "><?php echo htmlentities($query);?></div>
													<div class="stat-panel-title text-uppercase">See Place To Publish</div>
												</div>
											</div>
											<a href="profile.php" class="block-anchor panel-footer text-center">Full Detail &nbsp; <i class="fa fa-arrow-right"></i></a>
										</div>
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

	<script>

	window.onload = function(){

		// Line chart from swirlData for dashReport
		var ctx = document.getElementById("dashReport").getContext("2d");
		window.myLine = new Chart(ctx).Line(swirlData, {
			responsive: true,
			scaleShowVerticalLines: false,
			scaleBeginAtZero : true,
			multiTooltipTemplate: "<%if (label){%><%=label%>: <%}%><%= value %>",
		});

		// Pie Chart from doughutData
		var doctx = document.getElementById("chart-area3").getContext("2d");
		window.myDoughnut = new Chart(doctx).Pie(doughnutData, {responsive : true});

		// Dougnut Chart from doughnutData
		var doctx = document.getElementById("chart-area4").getContext("2d");
		window.myDoughnut = new Chart(doctx).Doughnut(doughnutData, {responsive : true});

	}
	</script>
</body>
</html>
<?php } ?>
