<?php
session_start();
include('includes/config.php');
//echo "<br>config";

if(isset($_POST['login']))
{
$status='1';
$email=$_POST['email'];
$password=$_POST['password'];

//echo "<br>email: ".$email ."		password: ".$password."<br>";

$sql="SELECT * FROM `users` WHERE `email`='$email' AND `password`='$password' ";
$result = $conn->query($sql);
if($result === false)
{
   user_error("Query failed: ".$conn->error."<br />$sql");
   echo "false";
}
if($result->num_rows == 0)
{
  echo "<script>alert('Invalid Details Or Account Not Confirmed');</script>";
} else{
      $_SESSION['alogin'] = $_POST['email'];
      $row= $result->fetch_array();

      if($row['user_type'] === 'business_user'){
          echo "<script type='text/javascript'> document.location = 'business_user/dashboard.php'; </script>";
      }
      else if($row['user_type'] === 'advertiser_user'){
          $_SESSION['alogin'] = $_POST['email'];
          echo "hell world form if user_type === advertiser_user";
          echo "<script type='text/javascript'> document.location = 'advertiser/dashboard.php'; </script>";
      }
      else if ($row['user_type'] === 'standard_user'){
          $_SESSION['alogin'] = $_POST['email'];
          echo "<script type='text/javascript'> document.location = 'userdashborad.php'; </script>";
  }
  }

}
?>
<!doctype html>
<html lang="en" class="no-js">
<!--  catifi 2019-->
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
	<link rel="stylesheet" href="css/bootstrap-social.css">
	<link rel="stylesheet" href="css/bootstrap-select.css">
	<link rel="stylesheet" href="css/fileinput.min.css">
	<link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
	<link rel="stylesheet" href="css/style.css">
</head>
<body onload="getLocation()">
	<div class="login-page bk-img">
		<div class="form-content">
			<div class="container">
				<div class="row">
					<div class="col-md-6 col-md-offset-3">
						<h1 class="text-center text-bold mt-4x">Login</h1>
						<div class="well row pt-2x pb-3x bk-light">
							<div class="col-md-8 col-md-offset-2">
								<form method="post">
									<label for="" class="text-uppercase text-sm">Your Email</label>
									<input type="text" placeholder="Email" name="email" class="form-control mb" required>
									<label for="" class="text-uppercase text-sm">Password</label>
									<input type="password" placeholder="Password" name="password" class="form-control mb" required>
									<button class="btn btn-primary btn-block" name="login" type="submit">LOGIN</button>
								</form>
								<br>
								<p>Don't Have an Account? <a href="register.php" >Signup</a></p>
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

</body>

</html>
