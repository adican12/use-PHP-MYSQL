<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
	{
header('location:index.php');
}
else{
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

	<title>Notification</title>

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
<!-- loading image to bucket -->
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
	<script src="js/function.js"></script>
	<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
	<script type="text/javascript">
				 $(document).ready(function () {
					setTimeout(function() {
						$('.succWrap').slideUp("slow");
					}, 3000);
					});
	</script>





</head>

<body>
	<?php include('includes/header.php');?>
	<div class="ts-main-content">
	<?php include('includes/leftbar.php');?>

	<?php
	$adID = 1;
	$sql = " SELECT * FROM  ad WHERE adID ='$adID'";
	$result = $conn->query($sql);
	if($result === false)
	{
		 user_error("Query failed: ".$conn->error."<br />$sql");
		 echo "false";
	}
		$row = mysqli_fetch_assoc($result);
	$adID = $adID+1;
	$sql2 =  " SELECT * FROM  ad WHERE adID ='$adID'";
	$result =$conn->query($sql2);
	if($result === false) {
		user_error("Query failed: ".$conn->error."<br />$sql");
		echo "false";
	}
	$row2= mysqli_fetch_assoc($result);
	$adID = $adID+1;
	$new_sql = "SELECT * FROM  ad WHERE adID ='$adID'";
	$res = $conn->query($new_sql);
	if($res === false) {
		user_error("Query failed: ".$conn->error."<br />$sql");
		echo "false";
	}
	$row3 = mysqli_fetch_assoc($res);


 ?>
		<div class="content-wrapper">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-12">
						<h3 class="page-title">Notifications</h3>
						<div class="row">
							<div class="col-md-12">
								<div class="panel panel-default">
									<div class="panel-heading">Notification</div>
									   <div class="panel-body">

											 <div class="card">
														 <img src="<?php echo $row['image']?>" id="img" style="width:100%">
														 <h1 id="header" class="title"><?php echo $row['title']?></h1>
													   <p class="price" id="price"><?php echo $row['price']?> $</p>
													   <p id="details"><?php echo $row['description']?></p>
												 </div>
												 <br>

											<div class="card1">
													<img src="<?php echo $row2['image']?>" id="img1" style="width:80%">
													<h1 id="header" class="title"><?php echo $row2['title']?></h1>
													<p class="price" id="price"><?php echo $row2['price']?> $</p>
													<p id="details"><?php echo $row2['description']?></p>
											</div>
											<br>

											<div class="card2" >
												<img src="<?php echo $row3['image']?>" style="width:100%">
												<h1 id="header" class="title"> <?php echo $row3['title']?></h1>
												<p class="price" id="price"><?php echo $row3['price']?> $</p>
												<p id="details"><?php echo $row3['description']?></p>
											</div>





<!-- <script type="text/javascript">
//document.getElementById("img").addEventListener("click", changeDetails);
document.getElementById("img1").addEventListener("click", changeDetails);
document.getElementById("img2").addEventListener("click", changeDetails);

function changeDetails(){
	//change the price
	var x =
	document.getElementById("price").innerHTML =  x + " $ ";
	//change the header
	var x =
	document.getElementById("header").innerHTML = x;
//change the text
	var x = "
	document.getElementById("details").innerHTML =x;
//change the image
	var x = "
 	//alert(x);
  document.getElementById("img").src= x;
}
</script> -->

<?php
$reciver = $_SESSION['alogin'];

$sql = "SELECT * from  ad where id in(2,32,33)";
$result = $conn->query($sql);
if($result === false)
{
	 // user_error("Query failed: ".$conn->error."<br />$sql");
	 // echo "false";
}

//
// $sql = "SELECT * from  notification where notireciver = (:reciver) order by time DESC";
// $query = $dbh -> prepare($sql);
// $query-> bindParam(':reciver', $reciver, PDO::PARAM_STR);
// $query->execute();
// $results=$query->fetchAll(PDO::FETCH_OBJ);

$cnt=1;

// if($query->rowCount() > 0)
// {
// foreach($results as $result)
// {

// if(mysqli_num_rows($result) > 0)
// {
// 	while($row = mysqli_fetch_assoc($result))
// 	{
//
// 	?>
<!-- //         <h5 style="background:#ededed;padding:20px;"><i class="fa fa-bell text-primary"></i>&nbsp;&nbsp;<b class="text-primary"><?php echo $row['time'];?></b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $row['notiuser'];?> ----->
<!-- // 					<?php echo $row['text'];?></h5> -->
<!-- //                        <?php.$cnt=$cnt+1; }} ?> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>


</body>
</html>
<?php }?>
