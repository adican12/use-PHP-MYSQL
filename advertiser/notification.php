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

	<title> Creat campaign </title>

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
						<h3 class="page-title"> Creat campaign </h3>
						<div class="row">
							<div class="col-md-12">
								<div class="panel panel-default">
									<div class="panel-heading"> Creat campaign </div>
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
	<form method="post" class="form-horizontal" enctype="multipart/form-data" name="regform" onSubmit="return validate();">
		 <div class="form-group">
		 <label class="col-sm-1 control-label">Name<span style="color:red">*</span></label>
		 <div class="col-sm-5">
		 <input type="text" name="name" class="form-control" required>
		 </div>
		 <label class="col-sm-1 control-label">Email<span style="color:red">*</span></label>
		 <div class="col-sm-5">
		 <input type="text" name="email" class="form-control" required>
		 </div>
		 </div>

		 <div class="form-group">
		 <label class="col-sm-1 control-label">Password<span style="color:red">*</span></label>
		 <div class="col-sm-5">
		 <input type="password" name="password" class="form-control" id="password" required >
		 </div>
		 <label class="col-sm-1 control-label">User Type<span style="color:red">*</span></label>
		 <div class="col-sm-5">
			 <select name="usertype" class="form-control" required>
			 <option value="">Select</option>
			 <option value="standard_user">Standard user</option>
			 <option value="business_user">Business User</option>
			 <option value="advertiser_user">Advertiser user</option>
			 </select>
		 </div>
		 </div>

		 <div class="form-group">
			 <label class="col-sm-1 control-label">Birthday<span style="color:red">*</span></label>
			 <div class="col-sm-5">
			 <input type="date" name="birthday" class="form-control" required>
			 </div>
		 </div>


			<div class="form-group">
		 <label class="col-sm-1 control-label">Gender<span style="color:red">*</span></label>
		 <div class="col-sm-5">
		 <select name="gender" class="form-control" required>
		 <option value="">Select</option>
		 <option value="Male">Male</option>
		 <option value="Female">Female</option>
		 </select>
		 </div>

		 <label class="col-sm-1 control-label">Phone<span style="color:red">*</span></label>
		 <div class="col-sm-5">
		 <input type="number" name="mobileno" class="form-control" required>
		 </div>
		 </div>

			<div class="form-group">
		 <label class="col-sm-1 control-label">Avtar<span style="color:red">*</span></label>
		 <div class="col-sm-5">
		 <div><input type="file" name="image" class="form-control"></div>
		 </div>
		 </div>

<br>
				 <button class="btn btn-primary" name="submit" type="submit">Register</button>
				 </form>
</body>
</html>
<?php } ?>
