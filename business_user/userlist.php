<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
	{
header('location:index.php');
}
else{
if(isset($_GET['del']) && isset($_GET['name']))
{
$id=$_GET['del'];
$name=$_GET['name'];

echo "id: $id , name: $name";

$sql="delete from `users` WHERE id='$id' ";
$result = $conn->query($sql);
if($result === false)
{
   user_error("Query failed: ".$conn->error."<br />$sql");
   echo "false";
}
//
// $sql = "delete from users WHERE id=:id";
// $query = $dbh->prepare($sql);
// $query -> bindParam(':id',$id, PDO::PARAM_STR);
// $query -> execute();

$sql2 = "insert into deleteduser (email) values ($name)";
// $sql="delete from `users` WHERE id='$id' ";
$result = $conn->query($sql2);
if($result === false)
{
   user_error("Query failed: ".$conn->error."<br />$sql2");
   echo "false";
}

//
// $sql2 = "insert into deleteduser (email) values (:name)";
// $query2 = $dbh->prepare($sql2);
// $query2 -> bindParam(':name',$name, PDO::PARAM_STR);
// $query2 -> execute();

$msg="Data Deleted successfully";
}

if(isset($_REQUEST['unconfirm']))
	{
	$aeid=intval($_GET['unconfirm']);
	$memstatus=1;



	$sql2 = "insert into deleteduser (email) values ($name)";
	// $sql="delete from `users` WHERE id='$id' ";
	$result = $conn->query($sql2);
	if($result === false)
	{
	   user_error("Query failed: ".$conn->error."<br />$sql2");
	   echo "false";
	}

	//
	$sql="UPDATE `users`SET status=$aeid WHERE  id=$aeid' ";
	$result = $conn->query($sql);
	if($result === false)
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

	$sql="UPDATE `users`SET status=$aeid WHERE  id=$aeid' ";
	$result = $conn->query($sql);
	if($result === false)
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
	<!-- <meta name="description" content="">
	<meta name="author" content="">
	<meta name="theme-color" content="#3e454c"> -->

	<title>Manage Users</title>

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

	<!-- Main style -->
	<link rel="stylesheet" href = "css/main.css">

</head>

<body>
	<?php include('includes/header.php');?>

	<div class="ts-main-content">
		<?php include('includes/leftbar.php');?>
		<div class="content-wrapper">
			<div class="container-fluid">

				<div class="row">
					<div class="col-md-12">


						<h2 class="page-title">Meet Your  Customers</h2>
						 <button type="button"  id="show" class="btn btn-primary" onclick="myFunction()" > <i class="fa fa-search"></i>      Do you want to look for someone? </button>
						<div id="myDIV">
						<form method="post" class="form-horizontal" enctype="multipart/form-data" action="">

							<label for="" class="text-uppercase text-sm"></label>
							<input type="search" placeholder="Search: " name="search_customers_fame" class="form-control" required>
							<br>
							<button class="btn btn-primary" name="submit" type="submit" style="width:30%;"> Search! </button>
						</form>
						<br>
					</div>
					<?php
						echo "<script>alert('we here 1')</script>";
					$name = $_POST['search_customers_fame'];
					echo "<script>alert('we here 2')</script>";
					echo "the name is : ".$name."<br>";
						$sql = "SELECT * FROM  users WHERE name='$name'";
						$result = $conn->query($sql);
						if($result === false)
						{
							echo "<script>alert('the query doesnt working')</script>";
							 user_error("Query failed: ".$conn->error."<br />$sql");
							 echo "false";
						}
						$row= mysqli_fetch_assoc($result);
						//echo($row['name']);

						$cnt=1;

					?>


						<!-- Zero Configuration Table -->
						<div class="panel panel-default">
							<div class="panel-heading"> Meet of customers</div>
							<div class="panel-body">
							<?php if($error){?><div class="errorWrap" id="msgshow"><?php echo htmlentities($error); ?> </div><?php }
				else if($msg){?><div class="succWrap" id="msgshow"><?php echo htmlentities($msg); ?> </div><?php }?>
								<table id="zctb" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
									<thead>
										<tr>
										<th>#</th>
                                                <th>Image</th>
                                                <th>Name</th>
                                                <th>Email</th>
																								<th>Gender</th>
																								<th>Phoen Number</th>
																								<th>Birthday</th>
										</tr>
								</thead>
							<tbody>
								 <!-- <div id="piechart" style="width: 100%; height: 100%"></div>
								 <div id="piechart1" style="width: 100%; height: 100%"></div> -->

<?php
///////////////////////////////
///// new code
///////////////////////////////
$sql = "SELECT * FROM  users WHERE user_type = 'standard_users' OR 'standard_user'";
$result = $conn->query($sql);
if($result === false)
{
	 user_error("Query failed: ".$conn->error."<br />$sql");
	 echo "false";
}

// $result = $result->fetch_array();

///////////////////////////////
//// original code
///////////////////////////////
// $sql = "SELECT * from  users ";
// $query = $dbh -> prepare($sql);
// $query->execute();
// $results=$query->fetchAll(PDO::FETCH_OBJ);
///////////////////////////////
$cnt=1;

///////////////////////////////


if(mysqli_num_rows($result) > 0)
{

	while($row = mysqli_fetch_assoc($result)) {
				?>
										<tr>
											<td><?php echo $cnt;?></td>
											<td><img src="<?php echo $row['image'];?>" style="width:50px; border-radius:50%;"/></td>
                      <td><?php echo $row['name']; ?></td>
                      <td><?php echo $row['email'];?></td>
                      <td><?php echo $row['gender'];?></td>
                      <td><?php echo $row['mobile'];?></td>
                      <td><?php echo $row['birthday'] ;?>
                      <td>

                                            <?php if($row['status'] == 1)
                                                    {?>
                                                    <a href="userlist.php?confirm=<?php echo $row['id'];?>" onclick="return confirm('Do you really want to Un-Confirm the Account')">Confirmed <i class="fa fa-check-circle"></i></a>
                                                    <?php } else {?>
                                                    <a href="userlist.php?unconfirm=<?php echo $row['id'];?>" onclick="return confirm('Do you really want to Confirm the Account')">Un-Confirmed <i class="fa fa-times-circle"></i></a>
                                                    <?php } ?>
</td>
                                            </td>

<td>
<a href="edit-user.php?edit=<?php echo  $row['id'];?>" onclick="return confirm('Do you want to Edit');">&nbsp; <i class="fa fa-pencil"></i></a>&nbsp;&nbsp;
<a href="userlist.php?del=<?php echo  $row['id'];?>&name=<?php echo $row['email'];?>" onclick="return confirm('Do you want to Delete');"><i class="fa fa-trash" style="color:red"></i></a>&nbsp;&nbsp;
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
  var options = {'title':'Gender', 'width':550, 'height':400};

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

<!-- php query for the pie chreat for age -->
<?php

?>



<script type="text/javascript">
// function toggle


// function myFunction() {
//   var x = document.getElementById("myDIV");
//   if (x.style.display === "none") {
//     x.style.display = "block";
//   } else {
//     x.style.display = "none";
//   }
// }
$("#show").click(function(){
  $("#myDIV").toggle();
});

</script>

</body>
</html>
<?php } ?>
