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
								<?php 		$email = $_SESSION['alogin'];
									$query = "SELECT user_id FROM users WHERE email = '$email'";
									$res = $conn->query($query);
									if($res === false) {
										user_error("Query failed: ".$conn->error."<br />$sql");
										echo "false";
									}
									$temp = mysqli_fetch_assoc($res);
									$user_id = $temp['user_id'];



									$sql = "SELECT * FROM coupon WHERE couponID IN(SELECT coupon_id FROM users_coupon WHERE user_id ='$user_id')";

									$result = $conn->query($sql);
									if($result === false) {
										user_error("Query failed: ".$conn->error."<br />$sql");
										echo "false";
									}
									$cnt = 1;
									if(mysqli_num_rows($result) > 0) {
									while($row= mysqli_fetch_array($result)){


									// echo "<script>alert('we here')</script>";?>
								<div class="card">
									<center>
										<img src="<?php echo $row['imageURL']?>" style="width:80%">
										<h1 class="title"> <?php echo $row['couponName']?> </h1>
										<p class="price" ><?php echo $row['counter']?> </p>
									</center>
								</div>
								<br>

							<?php $cnt= $cnt+1;}}?>
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
