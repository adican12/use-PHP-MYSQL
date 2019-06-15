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
  {;
	// $file = $_FILES['image']['name'];
	// $file_loc = $_FILES['image']['tmp_name'];
	// $folder="images/";
	// $new_file_name = strtolower($file);
	// $final_file=str_replace(' ','-',$new_file_name);
  //	echo "<br>id POST= ".$row['id']."<br>";

	$name=$_POST['name'];
	$email=$_POST['email'];
	$password = $_POST['password'];
	$gender = $_POST['gender'];
	$mobileno=$_POST['mobile'];
	$birthday=$_POST['birthday'];
	//$idedit=$_POST['editid'];
	// $image=$_POST['image'];
	$image='asdasd';

  $sql="SELECT * FROM `users` WHERE `email`='$email' AND `password`='$password' ";
  $result = $conn->query($sql);
  $row= $result->fetch_array();
  $id=$row['id'];
	// if(move_uploaded_file($file_loc,$folder.$final_file))
	// 	{
	// 		$image=$final_file;
	// 	}
	//

//echo "<br>id = ".$idedit."<br>";

	$sql = "UPDATE `users` SET name='$name', email='$email',password='$password',gender='$gender', mobile='$mobileno', birthday='$birthday', Image='$image',status=1 WHERE id='$id' ";

	if ($conn->query($sql) === TRUE) {
		echo "<script type='text/javascript'>alert('UPDATE Sucessfull!');</script>";
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
		echo "<script type='text/javascript'>alert('ERROR   Registration!');</script>";
		$error="Something went wrong. Please try again";
	}

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

	<title>Edit Profile</title>

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

	<script type= "text/javascript" src="./vendor/countries.js"></script>
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
<?php
		$email = $_SESSION['alogin'];
		echo "<br>EmailL: $email<br>";
		$sql="SELECT * FROM `users` WHERE `email`='$email' ";
		$result = $conn->query($sql);

		if($result === false)
		{
		   user_error("Query failed: ".$conn->error."<br />$sql");
			 $error=$conn->error;
		   echo "false";
		}
		if($result->num_rows == 0)
		{
		  echo "<script>alert('Invalid Details Or Account Not Confirmed');</script>";
		}else{
				$row = $result->fetch_array();

    	 // echo "<table>";
			 // while($row = $result->fetch_array() ){
	  	//   echo "<tr>";
	    //     echo '<td>'.$row['id'].'</td>
	    //           <td>'.$row['name'].'</td>
	    //           <td>'.$row['email'].'</td>
	    //           <td>'.$row['password'].'</td>
	    //           <td>'.$row['gender'].'</td>
	    //           <td>'.$row['mobile'].'</td>
	    //           <td>'.$row['designation'].'</td></tr>';
			// 				}
	    // echo "</table>";
	}
?>
	<?php include('includes/header.php');?>
	<div class="ts-main-content">
	<?php include('includes/leftbar.php');?>
		<div class="content-wrapper">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-12">
						<div class="row">
							<div class="col-md-12">
								<div class="panel panel-default">
									<div class="panel-heading"><?php echo htmlentities($_SESSION['alogin']); ?></div>
<?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php }
				else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>

									<div class="panel-body">
<form method="post" class="form-horizontal" enctype="multipart/form-data">

<div class="form-group">
	<div class="col-sm-4">
	</div>
	<div class="col-sm-4 text-center">
		<img src="<?php echo $row['image'] ;?>" style="width:200px; border-radius:50%; margin:10px;">
		<input type="file" name="image" class="form-control">
		<input type="hidden" name="image" class="form-control" value="BIHR_Goliath_HD_Extra_2600m_Pack_white.jpg<?php //echo htmlentities($result->image);?>">
	</div>
	<div class="col-sm-4">
	</div>
</div>

<div class="form-group">
	<label class="col-sm-2 control-label">Name<span style="color:red">*</span></label>
	<div class="col-sm-4">
	<input type="text" name="name" class="form-control"  placeholder="<?php echo $row['name'];?>" required value="<?php echo $row['name'];?>">
	</div>

	<label class="col-sm-2 control-label">Email<span style="color:red">*</span></label>
	<div class="col-sm-4">
	<input type="email" name="email" class="form-control" placeholder="<?php echo $row['email'];?>" required value="<?php echo $row['email'];?>">
	</div>
</div>

<div class="form-group">
	<label class="col-sm-2 control-label">Mobile<span style="color:red">*</span></label>
	<div class="col-sm-4">
	<input type="text" name="mobile" class="form-control" placeholder="<?php echo $row['mobile'];?>" required value="<?php echo $row['mobile'];?>">
	</div>

	<label class="col-sm-2 control-label">Password<span style="color:red">*</span></label>
	<div class="col-sm-4">
	<input type="password" name="password" class="form-control" placeholder="<?php echo $row['password'];?>" required value="<?php echo $row['password'];?>">
	</div>

	<label class="col-sm-2 control-label">Images<span style="color:red">*</span></label>
	<div class="col-sm-4">
	<input type="file" name="image" style="margin-top:10px;" class="form-control" placeholder="<?php echo $row['image'];?>" required value="<?php echo $row['image'];?>">
	</div>
</div>

<div class="form-group">
	<label class="col-sm-2 control-label">Gender<span style="color:red">*</span></label>
	<div class="col-sm-4">
		<select name="gender" class="form-control" required>
		<option value="">Select</option>
		<option value="Male">Male</option>
		<option value="Female">Female</option>
	</select>
	</div>
	<label class="col-sm-2 control-label">birthday<span style="color:red">*</span></label>
	<div class="col-sm-4">
			<input type="date" name="birthday" class="form-control" placeholder="<?php echo $row['image'];?>" required value="<?php echo $row['image'];?>">
	</div>

</div>
<div class="form-group">
	<div class="col-sm-8 col-sm-offset-2">
		<button class="btn btn-primary" name="submit" type="submit">Save Changes</button>
	</div>
</div>

</form>
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
</body>
</html>
<?php } ?>
