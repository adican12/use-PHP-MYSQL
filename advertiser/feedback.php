<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
	{
header('location:index.php');
}
else{
if(isset($_GET['del']))
{
$id=$_GET['del'];

$sql = "delete from users WHERE id=$id";
$query = $conn->query($sql);
if($query === false)
{
	 user_error("Query failed: ".$conn->error."<br />$sql2");
	 echo "false : " .$sql. "<br>";
}

// $sql = "delete from users WHERE id=:id";
// $query = $dbh->prepare($sql);
// $query -> bindParam(':id',$id, PDO::PARAM_STR);
// $query -> execute();

$msg="Data Deleted successfully";
}


// if(move_uploaded_file($file_loc,$folder.$final_file))
	// {
		// $image=$final_file;


    // }

//
// $sqlnoti="insert into notification (notiuser,notireciver,notitype) values (:notiuser,:notireciver,:notitype)";
// $querynoti = $dbh->prepare($sqlnoti);
// $querynoti-> bindParam(':notiuser', $sender, PDO::PARAM_STR);
// $querynoti-> bindParam(':notireciver',$reciver, PDO::PARAM_STR);
// $querynoti-> bindParam(':notitype', $notitype, PDO::PARAM_STR);
// $querynoti->execute();
/////////////////////////////////////////////////

if(isset($_REQUEST['unconfirm']))
	{
	$aeid=intval($_GET['unconfirm']);
	$memstatus=1;

	$sql = "UPDATE users SET status=$memstatus WHERE  id=$aeid";
	$query = $conn->query($sql);
	if($query === false)
	{
		 user_error("Query failed: ".$conn->error."<br />$sql2");
		 echo "false : ".$sql."<br>";
	}

	// $sql = "UPDATE users SET status=:status WHERE  id=:aeid";
	// $query = $dbh->prepare($sql);
	// $query -> bindParam(':status',$memstatus, PDO::PARAM_STR);
	// $query-> bindParam(':aeid',$aeid, PDO::PARAM_STR);
	// $query -> execute();

	$msg="Changes Sucessfully";
	}

	if(isset($_REQUEST['confirm']))
	{
	$aeid=intval($_GET['confirm']);
	$memstatus=0;

	$sql = "UPDATE users SET status=$memstatus WHERE  id=$aeid";
	$query = $conn->query($sql);
	if($query === false)
	{
		 user_error("Query failed: ".$conn->error."<br />$sql2");
		 echo "false : ".$sql;
	}


	// $sql = "UPDATE users SET status=:status WHERE  id=:aeid";
	// $query = $dbh->prepare($sql);
	// $query -> bindParam(':status',$memstatus, PDO::PARAM_STR);
	// $query-> bindParam(':aeid',$aeid, PDO::PARAM_STR);
	// $query -> execute();

	$msg="Changes Sucessfully";
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

	<title>creating banners</title>

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
	<link rel="stylesheet" href="css/button.css">
	<!-- main.css -->
	<link rel="stylesheet" href ="css/main.css">


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
	<script type="text/javascript">

		</script>

</head>

<body>
	<?php include('includes/header.php');?>

	<div class="ts-main-content">
		<?php include('includes/leftbar.php');?>
		<div class="content-wrapper">
			<div class="container-fluid">

				<div class="row">
					<div class="col-md-12">

						<h2 class="page-title">Creating banners</h2>

						<!-- Zero Configuration Table -->
						<div class="panel panel-default">
							<div class="panel-heading">Create banners</div>
							<div class="panel-body" id="panel-body">
							<?php if($error){?><div class="errorWrap" id="msgshow"><?php echo htmlentities($error); ?> </div><?php }
				else if($msg){?><div class="succWrap" id="msgshow"><?php echo htmlentities($msg); ?> </div><?php }?>
				<form method="post" enctype="multipart/form-data" action="">
					<br>
					<label class="col-sm-1 control-label"> Please enter the email <span style="color:red">*</span></label>
					<div class="col-sm-5">
					<input type="text" name="email" class="form-control"  placeholder="user@gmail.com" required>
					</div>
					<button type="submit" onclick="getTheLastId()" class="btn btn-primary" name="submitOne">Click me to get the banner ID</button>
				</form>

								<!-- <table id="zctb" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
									<thead>
										<tr>
										    <th>#</th>
												<th>User Email</th>
												<th>Title</th>
                        <th>Feedback</th>
                        <th>Attachment</th>
											  <th>Action</th>
										</tr>
									</thead>

									<tbody>
									-->

<?php
$reciver = 'Admin';


$sql = "SELECT * from  feedback where reciver = $reciver";
$result = $conn->query($sql);
if($result === false)
{
	 //user_error("Query failed: ".$conn->error."<br />$sql");
	 //echo "false : " .$sql."<br>";
}


// $sql = "SELECT * from  feedback where reciver = (:reciver)";
// $query = $dbh -> prepare($sql);
// $query-> bindParam(':reciver', $reciver, PDO::PARAM_STR);
// $query->execute();
// $results=$query->fetchAll(PDO::FETCH_OBJ);


$cnt=1;
// if($query->rowCount() > 0)
// {
// foreach($results as $result)
// {

if(mysqli_num_rows($result) > 0)
{

	while($row = mysqli_fetch_assoc($result)) {
				?>						<tr>
											<td><?php echo htmlentities($cnt);?></td>
                      <td><?php echo $row['sender'];?></td>
											<td><?php echo $row['title'];?></td>
                      <td><?php echo $row['feedbackdata'];?></td>
                      <td><a href="../attachment/<?php echo $row['attachment'];?>" ><?php echo $row['attachment'];?></a></td>

<td>
<a href="sendreply.php?reply=<?php echo $result->sender;?>">&nbsp; <i class="fa fa-mail-reply"></i></a>&nbsp;&nbsp;
</td>
										</tr>
										<?php $cnt=$cnt+1; }} ?>

									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>
	<button type="button" id="formButton" class="btn btn-primary" style="margin-left:550px;">Create a new banner!</button>
<div class="information" id="information">
	 <h6><strong>Please enter information to create an advertisement</strong></h6>
	 <div class="form-content">
			<form id="ad" method="post">
				<!-- <input type="file" name="file" value="Please select a picture" id="fileToUpload"> -->
					<label for="" class="text-uppercase text-sm"> Image: </label>
				<input type="file" name="imagefile" value="image" style="padding:10px;" class="form-control mb" required> <br>

				<label for="" class="text-uppercase text-sm"> Price: </label>
				<input type="text" placeholder="Price:" name="price" class="form-control mb" required>

				<label for="" class="text-uppercase text-sm"> Text: </label>
				<input type="text" placeholder="Text" name="text" class="form-control mb" required>

				<label for="" class="text-uppercase text-sm"> Header: </label>
				<input type="text" placeholder="header" name="header" class="form-control mb" required>

				<label for="" class="text-uppercase text-sm"> URL : </label>
				<input type="text" placeholder="wwww.someting.com" name="url" class="form-control mb" required>

				<label for="" class="text-uppercase text-sm"> User Email: </label>
				<input type="text" placeholder="User Email:" name="user_email" class="form-control mb" required>

				<br>
				<button name="submit" type="submit" class="btn btn-primary" style="margin-right:300px;padding: 14px 55px;"> Upload!</button>
			</form>
	</div>
	<button class="btn btn-primary" onclick="showDemo()" style="margin-right:310px;margin-top:10px;"> Show Demo </button>
</div>


<div id="result_ad"></div>
	<div class="card" id="card">
		<h2>DEMO</h2>
  <img src="images/jeans.jpg" alt="" style="width:100%" id="img">

  <h1 id="header">header</h1>
  <p class="price" id="price">$price</p>
  <p id="details">Some text about the jeans..</p>
	<a href="#" style="text-decoration:none;" id="url">try this</a>
</div>
<div id="demo"></div>
	<?php
	$email = $_SESSION['alogin'];
	$sql = "SELECT user_id FROM users WHERE email ='$email'; ";
	$result = $conn->query($sql);
	if($result === false)
	{
		 user_error("Query failed: ".$conn->error."<br />$sql");
		 echo "false";
	}
	$row1=mysqli_fetch_assoc($result);
	$row2 = $row1['user_id'];
	$sql = "SELECT MAX(adID) FROM ad WHERE advID ='$row2'; ";
	$new_result = $conn->query($sql);
	if($new_result === false) {
		echo "error <br>";
	}
	$row1 = mysqli_fetch_assoc($new_result);


	 $query= "SELECT image,description,price,title,url FROM ad WHERE adID = (SELECT MAX(adID) FROM ad)";
	 $res = $conn->query($query);
	 if($res === false){
			user_error("Query failed: ".$conn->error."<br />$sql");
			echo "false";
	 	}
	$new_row = mysqli_fetch_assoc($res);

	?>
	<script>
	function showDemo() {
			//change the price
			var price = <?php echo $new_row['price'];?>;
			document.getElementById("price").innerHTML =  price + " $ ";
			//change the text;
			var text = "<?php echo $new_row['description'];?>";
			document.getElementById("details").innerHTML =text;

			//change the header
			var header = "<?php echo $new_row['title'];?>";
			document.getElementById("header").innerHTML = header;

			var img ="<?php echo $new_row['image']?>";
			document.getElementById("img").src = img;
			var url = "<?php echo $new_row['url']?>";
			console.log(url);

			document.getElementById("url").href = url;

	}

	function getTheLastId(){
		var x = "<?php echo $row1['MAX(adID)'];?>";
		document.getElementById("panel-body").style.fontSize = "xx-large";
		document.getElementById("panel-body").style.textAlign = "center";
		document.getElementById("panel-body").innerHTML= " Your banner ID is:  " + x + " Please keep your ID in order to use a platform for the campaign";
	}
	</script>



</body>
</html>
<?php } ?>
