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
		 //echo "false";
	}

	// $sql="UPDATE admin SET username=(:name), email=(:email)";
	// $query = $dbh->prepare($sql);
	// $query-> bindParam(':name', $name, PDO::PARAM_STR);
	// $query-> bindParam(':email', $email, PDO::PARAM_STR);
	// $query->execute();
	$msg="Information Updated Successfully";
}
?>
<?php
//echo "<script>alert('hello')</script>";
include('includes/config.php');
if(isset($_POST['addCoupon'])) {
    if(getimagesize($_FILES['imagefile']['tmp_name']) == false){
          echo ' <br> Please Select An Image.<br>';
    } else {
            // declare Variables
						echo "we here";
            $image =$_FILES['imagefile']['tmp_name'];
            $name = $_FILES['imagefile']['name'];
            $images = base64_encode(file_get_contents(addslashes($image)));
						$couponName=$_POST['couponName'];
						$url =$_POST['url'];
						$counter=10;
						$id=2;
            	/*Query insert into db*/
            $sql = "INSERT INTO `coupon`( `id`, `image`, `url`, `counter`, `couponName`) VALUES('$id','$images','$url','$counter','$couponName');";
            if($conn->query($sql) == false) {
                    echo "<script>alert('Image Failed to upload')</script>";
                  } else {
                            echo "<script>alert('Insert uploaded successfully')</script>";
                          }
                        }
}
 else {
  echo "__ERROR_PLEASE__SELECT__A__PICTURE__<br>";
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
$reciver = 'Admin';


$sql = "SELECT image,url FROM coupon WHERE couponID =1";
$result = $conn->query($sql);
if($result === false)
{
	 user_error("Query failed: ".$conn->error."<br />$sql");
	 echo "false <br>";
	 echo"the false is here <br>";
} else {
	while($row=mysqli_fetch_assoc($res)){
	 echo '<img height = 150px width=100px src=data:image;base64,'.$row['image'].'>';
	 echo $row['url'];
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
      
					<?php echo '<img height = 150px width=100px src=data:image;base64,'.$row['image'].'>';?> <?php echo "<br>".$row['url'];?></h5>
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
								<form method="post" id="createCampaign" enctype="multipart/form-data" name="creatcoupon" action="">

									<label for="" class="text-uppercase text-sm"> Coupon Name:</label>
									<input type="text" placeholder="Campaign Name:" name="couponName" class="form-control mb" required>

									<label for="" class="text-uppercase text-sm"> Image : </label>
									<input type="file" placeholder="Image" name="imagefile" class="form-control mb" required>

									<label for="" class="text-uppercase text-sm"> Url: </label>
									<input type="text" placeholder="www.url.com" name="url" class="form-control mb" required>

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
