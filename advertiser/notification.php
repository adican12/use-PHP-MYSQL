
<?php
session_start();
$_SESSION['id']=+1;

echo "Session variables are set.";
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
		 echo "here the false";
	}

	// $sql="UPDATE admin SET username=(:name), email=(:email)";
	// $query = $dbh->prepare($sql);
	// $query-> bindParam(':name', $name, PDO::PARAM_STR);
	// $query-> bindParam(':email', $email, PDO::PARAM_STR);
	// $query->execute();
	// $msg="Information Updated Successfully";
}

?>

<!doctype html>
<html lang="en" class="no-js">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	<meta name="theme-color" content="#3e454c">

	<title> Creat campaign </title>

	<!-- Font awesome -->
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/css/form.css">
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
		<!-- main.css -->
	<link rel="stylesheet" href="css/main.css">


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
									   <div class="panel-body" id="panel-body">
											 <?php if($error){?><div class="errorWrap" id="msgshow"><?php echo htmlentities($error); ?> </div><?php }
								 else if($msg){?><div class="succWrap" id="msgshow"><?php echo htmlentities($msg); ?> </div><?php }?>
												 <table id="zctb" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
													 <thead>
														 <tr>
														 <th>#</th>
																												 <th> Campagin Name</th>
																												 <th>Budget</th>
																												 <th>Gender</th>
																												 <th>from which age</th>
																												 <th>Until what age</th>
																												 <th>Category</th>
																												 <th>Campaign start date</th>
																												 <th>Campaign end date</th>
																												 <th>Location</th>
																												 <th>edit</th>
														 </tr>
												 </thead>
											 <tbody>
				 <?php
				 ///////////////////////////////
				 ///// new code
				 ///////////////////////////////
				 /*line 124 get the user email*/
				 $email = $_SESSION['alogin'];
				 /*----query to get user id-----*/
				 $sql = "SELECT user_id FROM users WHERE email = '$email'";
				 $res = $conn->query($sql);
				 if($res === false) {
					 echo "__ERROR__".$conn->error."<br>";
				 }
				 $resOne = mysqli_fetch_assoc($res);
				 $row = $resOne['user_id'];
				 $sql = "SELECT * FROM  campaign WHERE adID ='$row'";
				 $result = $conn->query($sql);
				 if($result === false)
				 {
						user_error("Query failed: ".$conn->error."<br />$sql");
						echo "false";
				 }


				 $cnt=1;




				 if(mysqli_num_rows($result) > 0)
				 {

					 while($row = mysqli_fetch_assoc($result)) {
						 	if($row['locationID'] == 4) {
								$row['locationID'] = 'Ramat Gan';
							} else if($row['locationID'] == 1) {
								$row['locationID'] = 'Tel-Aviv';
							} else if($row['locationID'] == 3) {
								$row['locationID'] = 'Eilat';
							} else if($row['locationID'] == 2) {
								$row['locationID'] = 'Haifa';
							} else if($row['locationID'] == 5) {
								$row['locationID'] = 'Givatayim';
							} else if($row['locationID'] == 6) {
								$row['locationID'] = 'Beer Sheva';
							} else {
								$row['locationID'] = 'Jerusalem';
							}
								 ?>
														 <tr>
															 <td><?php echo $cnt;?></td>
															 <td><?php echo $row['campaignName']; ?></td>
															 <td><?php echo $row['budget'];?></td>
															 <td><?php echo $row['gender'];?></td>
															 <td><?php echo $row['ageMin'];?></td>
															 <td><?php echo $row['ageMax'];?></td>
															 <td><?php echo $row['category'];?></td>
															 <td><?php echo $row['stratingDate'];?></td>
															 <td><?php echo $row['endDate'];?></td>
															 <td><?php echo $row['locationID'];?></td>
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
<!-- <?php


$cnt=1;


if(mysqli_num_rows($result) > 0)
{

	while($row = mysqli_fetch_assoc($result)) {

	?>
        <h5 style="background:#ededed;padding:20px;"><i class="fa fa-bell text-primary"></i>&nbsp;&nbsp;<b class="text-primary"><?php echo $row['time'];?></b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<?php echo $row['notiuser'];?> -----> <?php echo $row['notitype'];?></h5>
                       <?php $cnt=$cnt+1; }} ?> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>




	<div class="form-content">
			<div class="container">
				<div class="main">
				<div class="row">
					<div class="col-md-6 col-md-offset-3">
						<h1 class="text-center text-bold mt-4x"> Create Campaign</h1>
						<div class="well row pt-2x pb-3x bk-light">
							<div class="col-md-8 col-md-offset-2">
								<form method="post" id="createCampaign" enctype="multipart/form-data" name="createCampaign">

									<label for="" class="text-uppercase text-sm"> Campaign Name:</label>
									<input type="text" placeholder="Campaign Name:" name="campaignName" class="form-control mb" required>

									<label for="" class="text-uppercase text-sm"> Budget : </label>
									<input type="number" placeholder="Budget" name="budget" class="form-control mb" required>

									<label for="" class="text-uppercase text-sm"> Gender: </label>
									<input type="text" placeholder="Male/Famle/Both" name="gender" class="form-control mb" required>

									<label for="" class="text-uppercase text-sm"> age Min: </label>
									<input type="number" placeholder="25" name="ageMin" class="form-control mb" required>

									<label for="" class="text-uppercase text-sm"> age Max: </label>
									<input type="number" placeholder="60" name="ageMax" class="form-control mb" required>


									<label for="" class="text-uppercase text-sm"> Strat Date : </label>
									<input type="date" placeholder="Strat Date:" name="stratDate" class="form-control mb" required>

									<label for="" class="text-uppercase text-sm"> End Date : </label>
									<input type="date" placeholder="End Date:" name="endDate" class="form-control mb" required>


									<label for="" class="text-uppercase text-sm"> Category: </label>
									<input type="text" placeholder="Clothing\Digital Content\And more..."name="category" class="form-control mb" required>
									<br>

									<?php
									$sql = "SELECT title FROM ad";
									$res = $conn->query($sql);
									if($res === false) {
										echo "_____ERROR____".$conn->error."<br>";
									}
									$cnt=1;
									while($row = mysqli_fetch_assoc($res))
										{
																		?>
									<label for="" class="text-uppercase text-sm"> Please choose the ad name: </label>
									<select name="banners" class="form-control mb" required>
									  <option value="<?php echo $row['title'];?>"> <?php echo $row['title'];?> </option>
									  <option value="<?php echo $row['title'];?>"> <?php echo $row['title'];?> </option>
									  <option value="<?php echo $row['title'];?>?"><?php echo $row['title'];?> </option>
									  <option value="<?php echo $row['title'];?>"> <?php echo $row['title'];?> </option>
										<option value="<?php echo $row['title'];?>"><?php echo $row['title'];?></option>
									</select>
									<?php $cnt =$cnt+1;}?>
									<br>



									<label for="" class="text-uppercase text-sm"> Location: </label>
									<select name="locations" class="form-control mb" required>
									  <option value="tel_aviv">Tel-Aviv</option>
									  <option value="jerusalem">Jerusalem</option>
									  <option value="beer_sheva">Beer Sheva</option>
									  <option value="haifa">Haifa</option>
										<option value="eilat">Eilat</option>
										<option value="ramat_gan">Ramat Gan</option>
										<option value="givatayim">Givatayim</option>
									</select>
									<br>


									<br>

									<button class="btn btn-primary btn-block" name="addCampin" type="submit" onload="loadCamp()">Click!</button>
								</form>
								<br>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
</div>
<script type="text/javascript">
			 $(document).ready(function () {
				setTimeout(function() {
					$('.succWrap').slideUp("slow");
				}, 3000);
				});

				$("#createCampaign").submit(function(){
				//alert("signup_form");
				$("button").prop('disabled', true);
				var formData = new FormData(this);
				$.ajax({
					url:     'insert_campaign.php',
					type:    'POST',
					data:    formData,
					async:   false,
					 success: function(data) {
						alert("success");
						$("#panel-body").html(data);
						$("button").prop('disabled', false);
					},
					cache: false,
					contentType: false,
					processData: false
				});
				return false;
		});


</script>
</body>
</html>
<?php } ?>
