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
<div id="chart_div" style="width: 100%; height: 500px;margin-right:700px;"></div>
</body>
</html>
<?php } ?>



<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable
            ([['X', 'Average ages: [1, 1]', 'lineDashStyle: [2, 2]',
               'lineDashStyle: [4, 4]', 'lineDashStyle: [5, 1, 3]',
               'lineDashStyle: [4, 1]',
               'lineDashStyle: [10, 2]', 'lineDashStyle: [14, 2, 7, 2]',
               'lineDashStyle: [14, 2, 2, 7]',
               'lineDashStyle: [2, 2, 20, 2, 20, 2]'],
              [1, 2, 3, 4, 5, 6, 7, 8, 9, 10],
              [2, 3, 4, 5, 6, 7, 8, 9, 10, 11],
              [3, 4, 5, 6, 7, 8, 9, 10, 11, 12],
              [4, 5, 6, 7, 8, 9, 10, 11, 12, 13],
              [5, 6, 7, 8, 9, 10, 11, 12, 13, 14],
              [6, 7, 8, 9, 10, 11, 12, 13, 14, 15],
              [7, 8, 9, 10, 11, 12, 13, 14, 15, 16],
              [8, 9, 10, 11, 12, 13, 14, 15, 16, 17],
              [9, 10, 11, 12, 13, 14, 15, 16, 17, 18]
        ]);

        var options = {
          hAxis: { maxValue: 10 },
          vAxis: { maxValue: 18 },
          chartArea: { width: 380 },
          lineWidth: 4,
          series: {
            0: { lineDashStyle: [1, 1] },
            1: { lineDashStyle: [2, 2] },
            2: { lineDashStyle: [4, 4] },
            3: { lineDashStyle: [5, 1, 3] },
            4: { lineDashStyle: [4, 1] },
            5: { lineDashStyle: [10, 2] },
            6: { lineDashStyle: [14, 2, 7, 2] },
            7: { lineDashStyle: [14, 2, 2, 7] },
            8: { lineDashStyle: [2, 2, 20, 2, 20, 2] }
          },
          colors: ['#e2431e', '#f1ca3a', '#6f9654', '#1c91c0',
                   '#4374e0', '#5c3292', '#572a1a', '#999999', '#1a1a1a'],
        };

        var chart = new google.visualization.LineChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }
    </script>
