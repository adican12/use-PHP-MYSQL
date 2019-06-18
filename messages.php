<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
	{
header('location:index.php');
}
else{


	$sql = "SELECT coupon.imageURL,coupon.counter,coupon.couponName,users_coupon.user_id FROM coupon,users_coupon WHERE coupon.couponID =users_coupon.coupon_id";

	$result = $conn->query($sql);
	if($result === false) {
		user_error("Query failed: ".$conn->error."<br />$sql");
		echo "false";
	}
	$row= mysqli_fetch_assoc($result);
	echo $row['imageURL'];
	echo $row['counter'];
	echo $row['couponName'];
	$cnt=1;
	echo "<script>alert('we here')</script>";

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

	<title>Messages</title>

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
		<script>
		document.addEventListener("click", changeDetails);

			function changeDetails(){


				document.getElementById("img").src ="<?php echo $row['imageURL']?>;"
				document.getElementById("couponName").innerHTML ='<?php echo $row['couponName']?>';
				document.getElementById("counter").innerHTML =<?php echo  $row['counter']?>;
			}
		</script>

</head>

<body >
	<?php include('includes/header.php');?>

	<div class="ts-main-content">
		<?php include('includes/leftbar.php');?>
		<div class="content-wrapper">
			<div class="container-fluid">

				<div class="row">
					<div class="col-md-12">

						<h2 class="page-title">See Coupons</h2>

						<!-- Zero Configuration Table -->
						<div class="panel panel-default">
							<div class="panel-heading">List Coupons</div>
							<div class="panel-body">
								<div class="card">
									<center>
										<img src="https://storage.googleapis.com/catifi2/coupon/coffe.jpg" id="img" style="width:70%" onclick="changeDetails()">
										<h1 id="couponName">Coffee </h1>
										<br>
										<p class="price" id="counter">$4</p>

								</center>
								</div>
							<?php if($error){?><div class="errorWrap" id="msgshow"><?php echo htmlentities($error); ?> </div><?php }
				else if($msg){?><div class="succWrap" id="msgshow"><?php echo htmlentities($msg); ?> </div><?php }?>
								<table id="zctb" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
									<thead>

									</thead>

									<tbody>

<?php



if($result->rowCount() > 0)
{
foreach($results as $result)
{				?>
										<tr>
											<td><?php echo htmlentities($cnt);?></td>
                                            <td><?php echo htmlentities($result->sender);?></td>
											<td><?php echo htmlentities($result->feedbackdata);?></td>
										</tr>
										<?php $cnt=$cnt+1; }} ?>

									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>



</body>
</html>
<?php } ?>
