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

	$sql="UPDATE admin SET username=$name, email=$email";
	$result = $conn->query($sql);
	if($result === false)
	{
		 user_error("Query failed: ".$conn->error."<br />$sql");
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

	<title>Time to stay in the commercial</title>

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
	<?php include('includes/header.php');?>
	<div class="ts-main-content">
	<?php include('includes/leftbar.php');?>
		<div class="content-wrapper">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-12">
						<h3 class="page-title">Time to stay in the commercial</h3>
						<div class="row">
							<div class="col-md-12">
								<div class="panel panel-default">
									<div class="panel-heading">Time to stay in the commercial</div>
									   <div class="panel-body">
<?php
$reciver = 'Admin';


$sql = "SELECT * from  notification where notireciver = '$reciver' order by time DESC";
$result = $conn->query($sql);
if($result === false)
{
	 user_error("Query failed: ".$conn->error."<br />$sql");
	 echo "false";
}


// $sql = "SELECT * from  notification where notireciver = (:reciver) order by time DESC";
// $query = $dbh -> prepare($sql);
// $query-> bindParam(':reciver', $reciver, PDO::PARAM_STR);
// $query->execute();
// $results=$query->fetchAll(PDO::FETCH_OBJ);


$cnt=1;
//
// if($query->rowCount() > 0)
// {
// foreach($results as $result)
// {

if(mysqli_num_rows($result) > 0)
{

	while($row = mysqli_fetch_assoc($result)) {

	?>
        <h5 style="background:#ededed;padding:20px;"><i class="fa fa-bell text-primary"></i>&nbsp;&nbsp;<b class="text-primary"><?php echo $row['time'];?></b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<?php echo $row['notiuser'];?> -----> <?php echo $row['notitype'];?></h5>
                       <?php $cnt=$cnt+1; }} ?>
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
<div id="curve_chart" style="width: 100%; height: 500px;margin-right:700px;"></div>
</body>
</html>
<?php } ?>


<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
	 <script type="text/javascript">
		 google.charts.load('current', {'packages':['corechart']});
		 google.charts.setOnLoadCallback(drawChart);

		 function drawChart() {
			 var data = google.visualization.arrayToDataTable([
				 ['time', 'Male', 'Famle'],
				 ['10 min',  100,      50],
				 ['5 min',  120,      80],
				 ['2 min',  100,       0],
				 ['1 min',  110,      20]
			 ]);

			 var options = {
				 title: 'ad Performance',
				 curveType: 'function',
				 legend: { position: 'bottom' }
			 };

			 var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

			 chart.draw(data, options);
		 }
	 </script>
