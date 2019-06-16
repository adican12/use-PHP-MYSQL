<?php
session_start();
//error_reporting(0);
session_regenerate_id(true);
include('includes/config.php');

if(strlen($_SESSION['alogin'])==0)
	{
	header("Location: index.php"); //
	}
	else{?>
		<!doctype html>
		<head>

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

<table id="zctb" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
									<thead>
										<tr>
										<th>#</th>
											<th>Name</th>
											<th>Email</th>
											<th>Gender</th>
											<th>Phone</th>
											<th>Designation</th>
										</tr>
									</thead>

<?php
$filename="Users list";

$sql = "SELECT * from users";
$result = $conn->query($sql);
if($result === false)
{
   user_error("Query failed: ".$conn->error."<br />$sql");
   echo "false";
}

// $sql = "SELECT * from Users";
// $query = $dbh -> prepare($sql);
// $query->execute();
// $results=$query->fetchAll(PDO::FETCH_OBJ);

$cnt=1;


if(mysqli_num_rows($result) > 0)
{
	while($row = mysqli_fetch_assoc($result))
	{

// if($query->rowCount() > 0)
// {
// foreach($results as $result)
// {

echo '
<tr>
<td>'.$cnt.'</td>
<td>'.$Name= $row['name'].'</td>
<td>'.$Email= $row['email'].'</td>
<td>'.$Gender= $row['gender'].'</td>
<td>'.$Phone= $row['mobile'].'</td>
<td>'.$birthday= $row['birthday'].'</td>
</tr>
';
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=".$filename."-report.xls");
header("Pragma: no-cache");
header("Expires: 0");
			$cnt++;
			}
	}
?>
<tr>
	<td><?php echo htmlentities($cnt);?></td>
	<td><?php echo $row['name'];?></td>
	<td><?php echo $row['email'];?></td>
	<td><?php echo $row['birthday'];?></td>
	<td><?php echo $row['mobile'];?></td>
	<td><?php echo $row['gender'];?></td>
	<td><?php echo $row['user_category'];?></td>

</tr>
</table>
<?php } ?>
