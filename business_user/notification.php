<?php
require __DIR__ . '/../vendor/autoload.php';

// # Imports the Google Cloud client library
use Google\Cloud\Storage\StorageClient;
//

session_start();
error_reporting(0);
include('includes/config.php');
// # Your Google Cloud Platform project ID

$projectId = 'catifi';
//
// # Instantiates a client
$storage = new StorageClient([
    'projectId' => $projectId
]);

$bucket = $storage->bucket('catifi2');

if(strlen($_SESSION['alogin'])==0)
	{
header('location:index.php');
}
else{

if(isset($_POST['submit']))
  {
	$name=$_POST['name'];
	$email=$_POST['email'];
	echo $email;

	$sql="UPDATE admin SET username=$name, email=$email";
	$result = $conn->query($sql);
	if($result === false)
	{
		 user_error("Query failed: ".$conn->error."<br />$sql");
		 //echo "false";
	}

	// $sql="UPDATE admin SET username=(:name), email=(:email)";
	// $query = $dbh->prepare($sql);
	// $query-> bindParam(':name', $name, PDO::PARAM_STR);
	// $query-> bindParam(':email', $email, PDO::PARAM_STR);
	// $query->execute();
	$msg="Information Updated Successfully";
}

//echo "<script>alert('hello')</script>";
	// # Imports the Google Cloud client library

	//
	// Start the session
// session_start();
// include('includes/config.php');
//
// // # The name for the new bucket
// $bucketName = 'my-new-bucket';
// //

if(isset($_POST['addCoupon'])) {
    // if(getimagesize($_FILES['imagefile']['tmp_name']) == false){
    //       echo ' <br> Please Select An Image.<br>';
    // } else {
			$target_dir = "coupon/";
			// $target_file = $target_dir . basename($_FILES['fileToUpload']['name']);

			$file = file_get_contents($_FILES['imagefile']['tmp_name']);
			$objectName = $target_dir.$_FILES['imagefile']['name'];

			$object = $bucket->upload( $file, [
					'name' => $objectName
			]);
			// echo "<br>file uploaded successfully</br>";

      $useremail =	$_SESSION['alogin'];
			// echo "useremail: $useremail";
       //get the the business ID Who creates the coupon
       $sql = "SELECT user_id FROM users WHERE email = '$useremail';";
       $result = $conn->query($sql);
       if($result === false) {
       	echo "ERROR";
       }
       $row = mysqli_fetch_assoc($result);
	// // declare Variables
	// check if image upload to bucket
	//get coupon name
	        $couponName=$_POST['couponName'];
	// // // get imageurl
	        $imageURL ='https://storage.googleapis.com/catifi2/coupon/'.$_FILES['imagefile']['name'];
	// //  // check the image url

	// //  //get the counter of the coupon
          $counter=$_POST['counter'];

// // // the business ID
            // $busID = $row['user_id'];
            $busID = $row['user_id'];
            $sql = "SELECT businessID FROM business WHERE businessID = '$busID'";
            $res = $conn->query($sql);
            if($res === false) {
              echo "error";
            }
            $row = mysqli_fetch_assoc($res);
            $busID = $row['businessID'];
 		      // check all Variables if them ok
		      // echo "the business id is  : ".$busID."<br>";
		      // echo "the imageurl is : ".$imageURL;
		      // echo "the counter is : ".$counter;
		      // echo " the coupon name is : ".$couponName;
		//       /*Query insert into db*/
		        $sql = "INSERT INTO `coupon`( `busID`, `imageURL`, `counter`, `couponName`) VALUES('$busID','$imageURL','$counter','$couponName');";
		          if($conn->query($sql) === false) {
		              echo "<script>alert('Image Failed to upload')</script>";
		              } else {
		               echo "<script>alert('Insert uploaded successfully')</script>";
		               }

		// }

}
//  else {
//   echo "__ERROR_PLEASE__SELECT__A__PICTURE__<br>";
// }

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

	<title>Coupon</title>

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
	<!-- adding w3schools card -->
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

	<!-- notification style -->
	<link rel ="stylesheet" href ="css/noti.css">

	<script type= "text/javascript" src="../vendor/countries.js"></script>


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
						<h3 class="page-title">Coupon</h3>
						<div class="row">
							<div class="col-md-12">
								<div class="panel panel-default">
									<div class="panel-heading">Coupon</div>
									   <div class="panel-body">
<?php

// $query = "SELECT user_id FROM users WHERE email = '$' ";
$email = $_SESSION['alogin'];
// echo $email;
$query = "SELECT user_id FROM users WHERE email = '$email';";
$resu122 = $conn->query($query);
if( $resu122 == false) {
	echo "the query is nor good";
} else {
	while($row1=mysqli_fetch_assoc($resu122)){
		//echo $row1['user_id']."<br>";
		$id = $row1['user_id'];
		//echo "the id is".$id."<br>";
$sql = "SELECT imageURL,couponName FROM coupon WHERE busID = '$id';";
$result = $conn->query($sql);
if($result === false)
{
	 user_error("Query failed: ".$conn->error."<br />$sql");
	 echo "false <br>";
	 echo"the false is here <br>";
} else {
	while($row=mysqli_fetch_assoc($res)){
	 echo '<img height = 150px width=100px src='.$row['imageURL'].'>';
	 echo $row['couponName'];
	 }
}
}
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

			<centre><div class="w3-container" style="margin-left:300px;;"><div class="w3-card-4" style="width:50%;"><center><br><?php echo '<img height = 150px width=150px src='.$row['imageURL'].'>';?> <div class="w3-container w3-center"><?php echo "<br>".$row['couponName'];?></div></h5></br></center></div>
		</div></centre>
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

	<script type="text/javascript">
				 $(document).ready(function () {
					setTimeout(function() {
						$('.succWrap').slideUp("slow");
					}, 3000);
					});
	</script>
	<div class="form-content">
			<div class="container">
				<div class="main">
				<div class="row">
					<div class="col-md-6 col-md-offset-3">
						<h1 class="text-center text-bold mt-4x"> Create Coupon</h1>
						<div class="well row pt-2x pb-3x bk-light">
							<div class="col-md-8 col-md-offset-2">
								<form method="post" id="createCoupon" enctype="multipart/form-data" name="creatcoupon" action="">

									<label for="" class="text-uppercase text-sm"> Coupon Name:</label>
									<input type="text" placeholder="Coupon Name:" name="couponName" class="form-control mb" required>

									<label for="" class="text-uppercase text-sm"> Image : </label>
									<input type="file" placeholder="Image" name="imagefile" class="form-control mb" required>

									<label for="" class="text-uppercase text-sm"> Amount of coupon use : </label>
									<input type="number" placeholder="10" name="counter" class="form-control mb" required>



									<button class="btn btn-primary btn-block" name="addCoupon" type="submit">Click!</button>
								</form>
								<br>
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
