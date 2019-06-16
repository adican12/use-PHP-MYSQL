<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
	{
header('location:index.php');
}
else{
if(isset($_GET['del']))
{
$id=$_GET['del'];

$sql = "delete from users WHERE id=$id";
$query = $conn->query($sql);
if($query === false)
{
	 user_error("Query failed: ".$conn->error."<br />$sql2");
	 echo "false";
}

// $sql = "delete from users WHERE id=:id";
// $query = $dbh->prepare($sql);
// $query -> bindParam(':id',$id, PDO::PARAM_STR);
// $query -> execute();

$msg="Data Deleted successfully";
}

if(isset($_REQUEST['unconfirm']))
	{
	$aeid=intval($_GET['unconfirm']);
	$memstatus=1;

	$sql = "UPDATE users SET status=$memstatus WHERE  id=$aeid";
	$query = $conn->query($sql);
	if($query === false)
	{
		 user_error("Query failed: ".$conn->error."<br />$sql2");
		 echo "false";
	}

	// $sql = "UPDATE users SET status=:status WHERE  id=:aeid";
	// $query = $dbh->prepare($sql);
	// $query -> bindParam(':status',$memstatus, PDO::PARAM_STR);
	// $query-> bindParam(':aeid',$aeid, PDO::PARAM_STR);
	// $query -> execute();

	$msg="Changes Sucessfully";
	}

	if(isset($_REQUEST['confirm']))
	{
	$aeid=intval($_GET['confirm']);
	$memstatus=0;

	$sql = "UPDATE users SET status=$memstatus WHERE  id=$aeid";
	$query = $conn->query($sql);
	if($query === false)
	{
		 user_error("Query failed: ".$conn->error."<br />$sql2");
		 echo "false";
	}


	// $sql = "UPDATE users SET status=:status WHERE  id=:aeid";
	// $query = $dbh->prepare($sql);
	// $query -> bindParam(':status',$memstatus, PDO::PARAM_STR);
	// $query-> bindParam(':aeid',$aeid, PDO::PARAM_STR);
	// $query -> execute();

	$msg="Changes Sucessfully";
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

	<title>Manage Feedback</title>

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

<body>
	<?php include('includes/header.php');?>

	<div class="ts-main-content">
		<?php include('includes/leftbar.php');?>
		<div class="content-wrapper">
			<div class="container-fluid">

				<div class="row">
					<div class="col-md-12">

						<h2 class="page-title">Manage Feedback</h2>

						<!-- Zero Configuration Table -->
						<div class="panel panel-default">
							<div class="panel-heading">List Users</div>
							<div class="panel-body">
							<?php if($error){?><div class="errorWrap" id="msgshow"><?php echo htmlentities($error); ?> </div><?php }
				else if($msg){?><div class="succWrap" id="msgshow"><?php echo htmlentities($msg); ?> </div><?php }?>
								<table id="zctb" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
									<thead>
										<tr>
										    <th>#</th>
												<th>Description</th>
												<th>User ID</th>


										</tr>
									</thead>

									<tbody>

<?php
$reciver = 'Admin';


$sql = "SELECT * from  feedback";
$result = $conn->query($sql);
if($result === false)
{
	 user_error("Query failed: ".$conn->error."<br />$sql");
	 echo "false";
}


// $sql = "SELECT * from  feedback where reciver = (:reciver)";
// $query = $dbh -> prepare($sql);
// $query-> bindParam(':reciver', $reciver, PDO::PARAM_STR);
// $query->execute();
// $results=$query->fetchAll(PDO::FETCH_OBJ);


$cnt=1;
// if($query->rowCount() > 0)
// {
// foreach($results as $result)
// {

if(mysqli_num_rows($result) > 0)
{

	while($row = mysqli_fetch_assoc($result)) {
				?>						<tr>
											<td><?php echo htmlentities($cnt);?></td>
                      <td><?php echo $row['description'];?></td>
											<td><?php echo $row['user_id'];?></td>

<td>
<a href="sendreply.php?reply=<?php echo $result->sender;?>">&nbsp; <i class="fa fa-mail-reply"></i></a>&nbsp;&nbsp;
</td>
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
