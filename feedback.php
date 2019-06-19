<?php
session_start();
error_reporting(0);
include('includes/config.php');

if(strlen($_SESSION['alogin'])==0)
	{
		echo"someting in if";
		header('location:index.php');
}
else{
	echo "session alogin: ".$_SESSION['alogin'];

if(isset($_POST['submit']))
  {
		$title=$_POST['title'];
	  $description=$_POST['description'];
		$sender=$_SESSION['alogin'];
		$reciver = 'Admin';
		//$reciver= 'standard_user';
	  //$notitype='Send Feedback';
	   $attachment='sdsdds';
		 $sql = "INSERT INTO `feedback` (`sender`, `reciver`, `title`,`feedbackdata`,`attachment`) VALUES ('$sender','$reciver','$title','$description','$attachment')";
		 if ($conn->query($sql) === TRUE) {
	 		echo "<script type='text/javascript'>alert('INSERT INTO feedback Sucessfull!');</script>";
	 	} else {
	 		echo "Error: " . $sql . "<br>" . $conn->error;
	 		echo "<script type='text/javascript'>alert('ERROR   Registration!');</script>";
	 		$error="Something went wrong. Please try again";
	 	}

	 	$msg="Information Updated Successfully";
	 }
		// $result = $conn->query($sql);
		/////////////// to print the data//////////
		//  $row= $result->fetch_array();
		//  if(mysqli_num_rows($result) > 0)
		//  {
		//  	while($row = mysqli_fetch_assoc($result)) {
	 //
		//    echo "title: ".$row['title']."<br>";
		// 	 echo "description: ".$row['description']."<br>";
		//  }
	 // }
	// $file = $_FILES['attachment']['name'];
	// $file_loc = $_FILES['attachment']['tmp_name'];
	// $folder="attachment/";
	// $new_file_name = strtolower($file);
	// $final_file=str_replace(' ','-',$new_file_name);
	//

	// if(move_uploaded_file($file_loc,$folder.$final_file))
	// 	{
	// 		$attachment=$final_file;
	// 	}
	// $notireciver = 'Admin';
  //   $querynoti = $dbh->prepare($sqlnoti);
	// $querynoti-> bindParam(':notiuser', $user, PDO::PARAM_STR);
	// $querynoti-> bindParam(':notireciver', $notireciver, PDO::PARAM_STR);
  //   $querynoti-> bindParam(':notitype', $notitype, PDO::PARAM_STR);
  //   $querynoti->execute();
	//
	// $sql="insert into feedback (sender, reciver, title,feedbackdata,attachment) values (:user,:reciver,:title,:description,:attachment)";
	// $query = $dbh->prepare($sql);
	// $query-> bindParam(':user', $user, PDO::PARAM_STR);
	// $query-> bindParam(':reciver', $reciver, PDO::PARAM_STR);
	// $query-> bindParam(':title', $title, PDO::PARAM_STR);
	// $query-> bindParam(':description', $description, PDO::PARAM_STR);
	// $query-> bindParam(':attachment', $attachment, PDO::PARAM_STR);
  //   $query->execute();
	// $msg="Feedback Send";
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

	<title>Feedback</title>

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


					 changeRate(null, 3);

					 function changeRate(element, rate=null){
					   if(rate == null){
					     let id = $(element).attr('for');
					     let rateAux = $('#'+id).val();
					     $('#rate').val(rateAux);
					   }else{
					     let rateAux = $("#rate").val();
					     $("#lblStar"+rateAux).click();
					   }
					   console.log($('#rate').val());
					 }
	</script>
	<style>
	*{
			margin: 0;
			padding: 0;
	}
	.rate {
			margin: auto;
			width: 50%;
			padding: 0 10px;
	}
	.rate:not(:checked) > input {
			position:absolute;
			top:-9999px;
	}
	.rate:not(:checked) > label {
			float:right;
			width:1em;
			overflow:hidden;
			white-space:nowrap;
			cursor:pointer;
			font-size:5rem;
			color:#ccc;
	}
	.rate:not(:checked) > label:before {
			content: '★ ';
	}
	.rate > input:checked ~ label {
			color: #ffc700;
	}
	.rate:not(:checked) > label:hover,
	.rate:not(:checked) > label:hover ~ label {
			color: #deb217;
	}
	.rate > input:checked + label:hover,
	.rate > input:checked + label:hover ~ label,
	.rate > input:checked ~ label:hover,
	.rate > input:checked ~ label:hover ~ label,
	.rate > label:hover ~ input:checked ~ label {
			color: #c59b08;
	}
	</style>


</head>

<body>
<?php
		// $sql = "SELECT * from users;";
		// $result = $conn->query($sql);
		// $row= $result->fetch_array();
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
                            <h2>Give us Feedback</h2>
								<div class="panel panel-default">
									<div class="panel-heading">Edit Info</div>
<?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php }
				else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>

<div class="panel-body">
<form method="post" class="form-horizontal" enctype="multipart/form-data">


<div class="form-group">
    <input type="hidden" name="user" value="<?php// echo htmlentities($result->email); ?>">
	<label class="col-sm-2 control-label">Title<span style="color:red">*</span></label>
	<div class="col-sm-4">
	<input type="text" name="title" class="form-control" required>
	</div>

	<!-- <label class="col-sm-2 control-label">Attachment<span style="color:red"></span></label>
	<div class="col-sm-4">
	<input type="file" name="attachment" class="form-control">
	</div> -->
</div>

<div class="form-group">
	<label class="col-sm-2 control-label">Description<span style="color:red">*</span></label>
	<div class="col-sm-10">
	<textarea class="form-control" rows="5" name="description"></textarea>
	</div>
</div>
<br>

<div class="rate">
	<div class="form-group">
		<label class="col-sm-2 control-label" style="font-size:25px;"> rate ad <span style="color:red">*</span></label>
	</div>
	<input type="hidden" id="rate" value="" />
	<input type="radio" id="star5" name="rate" value="5" />
	<label onclick="changeRate(this)" id="lblStar4" for="star5" title="text">5 stars</label>
	<input type="radio" id="star4" name="rate" value="4" />
	<label onclick="changeRate(this)" id="lblStar4" for="star4" title="text">4 stars</label>
	<input type="radio" id="star3" name="rate" value="3" />
	<label onclick="changeRate(this)" id="lblStar4" for="star3" title="text">3 stars</label>
	<input type="radio" id="star2" name="rate" value="2" />
	<label onclick="changeRate(this)" id="lblStar4" for="star2" title="text">2 stars</label>
	<input type="radio" id="star1" name="rate" value="1" />
	<label onclick="changeRate(this)" id="lblStar4" for="star1" title="text">1 star</label>
</div>
<br>

<div class="form-group">
	<div class="col-sm-8 col-sm-offset-2">
		<button class="btn btn-primary" name="submit" type="submit">Send</button>
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


</body>
</html>
<?php?>
