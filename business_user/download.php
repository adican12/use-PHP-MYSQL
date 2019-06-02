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
<table border="1">
									<thead>
										<tr>
										<th>#</th>
											<th>Name</th>
											<th>Email</th>
											<th>Gender</th>
											<th>Phone</th>
											<th>Image</th>
										</tr>
									</thead>

<?php
$filename="Users list";

$sql = "SELECT * FROM `users`";
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
<td>'.$Designation= $row['image'].'</td>
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
</table>
<?php } ?>
