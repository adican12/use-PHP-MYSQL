
<?php
session_start();
$_SESSION['id']=+1;
$_SESSION['adID']=+1;
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
	<link rel="stylesheet" href="css/css/form.css"
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
session_start();
$_SESSION['id'];
$_SESSION['adID'];
error_reporting(0);
include('includes/config.php');
echo "hello form here1"."<br>";
if(isset($_POST['submit'])){
echo "hello form here2"."<br>";
$id =$_SESSION['id'] +1;
$adID=$_SESSION['adID'] +1;

	$campaignName = $_POST['campaignName'];
	$budget = $_POST['budget'];
	$gender = $_POST['gender'];
	$stratDate = $_POST['stratDate'];
	$endDate = $_POST['endDate'];
	$category = $_POST['category'];
	$ageMin = $_POST['ageMin'];
	$ageMax = $_POST['ageMax'];
echo "the id is = ".$id."<br>";
echo "the adID is = ".$adID;

  // echo "Campagin Name:".$campaignName."<br>"."the budget is : ".$budget."<br>"."the gender is: ".$gender."<br>";
  // echo "the strat date of the campaign is : ".$stratDate."<br>"."the end date of the campaign is : ".$endDate."<br>";
  // echo "the category is : " .$category;

 	$sql = "INSERT INTO `campaign`(`campaignName`,`id`,`adID`,`gender`,`ageMin`,`ageMax`,`budget`,`category`,`stratingDate`,`endDate`)
 	VALUES('$campaignName','$id','$adID','$gender','$ageMin','$ageMax','$budget','$category','$stratDate','$endDate');";
 	if ($conn->query($sql) === TRUE) {
 		echo "<script type='text/javascript'>alert('Insert  Sucessfull!');</script>";
 		echo "<script type='text/javascript'> document.location = 'notification.php'; </script>";
 	} else { 		echo "Error: " . $sql . "<br>" . $conn->error;
		echo "<script type='text/javascript'>alert('ERROR   INSTERT!');</script>";
		$error="Something went wrong. Please try again";
 	}
 }



// $sql = "SELECT * from  notification where notireciver = '$reciver' order by time DESC";
// $result = $conn->query($sql);
// if($result === false)
// {
// 	 user_error("Query failed: ".$conn->error."<br />$sql");
// 	 echo "false";
// 	 echo "here the false2";
// }


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


	<div class="form-content">
			<div class="container">
				<div class="main">
				<div class="row">
					<div class="col-md-6 col-md-offset-3">
						<h1 class="text-center text-bold mt-4x"> Create Campaign</h1>
						<div class="well row pt-2x pb-3x bk-light">
							<div class="col-md-8 col-md-offset-2">
								<form method="post" id="createCampaign" enctype="multipart/form-data" name="createCampaign">

									<label for="" class="text-uppercase text-sm">Campaign Name:</label>
									<input type="text" placeholder="Campaign Name:" name="campaignName" class="form-control mb" required>

									<label for="" class="text-uppercase text-sm">Budget : </label>
									<input type="text" placeholder="Budget" name="budget" class="form-control mb" required>

									<label for="" class="text-uppercase text-sm">Gender: </label>
									<input type="text" placeholder="Male/Famle/Both" name="gender" class="form-control mb" required>

									<label for="" class="text-uppercase text-sm"> ageMin: </label>
									<input type="text" placeholder="25-" name="ageMin" class="form-control mb" required>

									<label for="" class="text-uppercase text-sm"> ageMax: </label>
									<input type="text" placeholder="-30" name="ageMax" class="form-control mb" required>


									<label for="" class="text-uppercase text-sm">Strat Date : </label>
									<input type="date" placeholder="Strat Date:" name="stratDate" class="form-control mb" required>

									<label for="" class="text-uppercase text-sm">End Date : </label>
									<input type="date" placeholder="End Date:" name="endDate" class="form-control mb" required>


									<label for="" class="text-uppercase text-sm">Category: </label>
									<input type="text" placeholder="Fashion\Restaurant\movie\And more..."name="category" class="form-control mb" required>
									<br>

									<button class="btn btn-primary btn-block" name="creatCampin" type="submit">Click!</button>
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
					url:     'notification.php',
					type:    'POST',
					data:    formData,
					async:   false,
					 success: function(data) {
						alert("success");
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
