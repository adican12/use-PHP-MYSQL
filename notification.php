<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
	{
header('location:index.php');
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

	<title>See Coupon</title>

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



</head>

<body>
	<?php include('includes/header.php');?>
	<div class="ts-main-content">
	<?php include('includes/leftbar.php');?>
		<div class="content-wrapper">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-12">
						<h3 class="page-title">Notifications</h3>
						<div class="row">
							<div class="col-md-12">
								<div class="panel panel-default">
									<div class="panel-heading">Notification</div>
									   <div class="panel-body">

											 <div class="card">
														 <img src="https://firebasestorage.googleapis.com/v0/b/firecatwifi.appspot.com/o/images%2Fcoffee.jpg?alt=media&token=40ea715d-e4de-4d34-9ece-1c1cd247ff79" id="img" style="width:100%">
														 <h1 id="couponName">Coffee</h1>
													   <p class="" id="counter">$4</p>
													   <p id="details">the best new coffee</p>
												 </div>


											<canvas id="line-chart" width="800" height="450"></canvas>
<?php
$sql = " SELECT coupon.imageURL,coupon.counter,coupon.couponName,users_coupon.user_id FROM coupon,users_coupon WHERE coupon.couponID =users_coupon.coupon_id";
$result = $conn->query($sql);
if($result === false)
{
	 user_error("Query failed: ".$conn->error."<br />$sql");
	 echo " this the false";
	 echo " the query is not good ";
}
	$row= mysqli_fetch_assoc($result);

$result = $conn->query($sql);
if($result === false)
{
	 user_error("Query failed: ".$conn->error."<br />$sql");
	 echo "false";
}
	$row= mysqli_fetch_assoc($result);
?>

<script type="text/javascript">
//document.getElementById("img").addEventListener("click", changeDetails);
document.getElementById("img1").addEventListener("click", changeDetails);
document.getElementById("img2").addEventListener("click", changeDetails);

function changeDetails(){
	//change the price
	var x = <?php echo $row['price'];?>;
	document.getElementById("price").innerHTML =  x + " $ ";
	//change the header
	var x = "<?php echo $row['header'];?>";
	document.getElementById("header").innerHTML = x;
//change the text
	var x = "<?php$row['text'];?>";
	document.getElementById("details").innerHTML =x;
//change the image
	var x = "<?php echo $row['image'];?>";
 	//alert(x);
  document.getElementById("img").src= x;
}
</script>

<?php
$reciver = $_SESSION['alogin'];

$sql = "SELECT * from  ad where id in(2,32,33)";
$result = $conn->query($sql);
if($result === false)
{
	 user_error("Query failed: ".$conn->error."<br />$sql");
	 echo "false";
}

//
// $sql = "SELECT * from  notification where notireciver = (:reciver) order by time DESC";
// $query = $dbh -> prepare($sql);
// $query-> bindParam(':reciver', $reciver, PDO::PARAM_STR);
// $query->execute();
// $results=$query->fetchAll(PDO::FETCH_OBJ);

$cnt=1;

// if($query->rowCount() > 0)
// {
// foreach($results as $result)
// {

// if(mysqli_num_rows($result) > 0)
// {
// 	while($row = mysqli_fetch_assoc($result))
// 	{
//
// 	?>
<!-- //         <h5 style="background:#ededed;padding:20px;"><i class="fa fa-bell text-primary"></i>&nbsp;&nbsp;<b class="text-primary"><?php echo $row['time'];?></b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $row['notiuser'];?> ----->
<!-- // 					<?php echo $row['text'];?></h5> -->
<!-- //                        <?php.$cnt=$cnt+1; }} ?> -->
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
	<script src="js/function.js"></script>
	<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
	<script type="text/javascript">
				 $(document).ready(function () {
					setTimeout(function() {
						$('.succWrap').slideUp("slow");
					}, 3000);
					});
	</script>
	<script>

	</script>
</body>
</html>
<?php }?>
