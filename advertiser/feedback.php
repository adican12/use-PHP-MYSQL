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

.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  max-width: 300px;
  margin: auto;
	margin-left: 450px;
  text-align: center;
  font-family: arial;
}

.price {
  color: grey;
  font-size: 22px;
}

.card p{}

.card button {
  border: none;
  outline: 0;
  padding: 12px;
  color: white;
  background-color: #000;
  text-align: center;
  cursor: pointer;
  width: 100%;
  font-size: 18px;
}

.card button:hover {
  opacity: 0.7;
}
.myButton {border-radius: 30px;font-size: 16px; box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19);background-color:#F4F6F9;color:black;margin-right:120px;text-align: center;}
.myButton:hover {color:#3e8e41;}
.inside-panel-body{
  max-width: 300px;
  margin: auto;
	margin-left: 450px;
  text-align: center;
  font-family: arial;}
.information {margin-left:510px;margin-bottom: 10px;padding: 20px;display:none;}
.information input{width: 30%;padding: 12px 20px;text-align: center;margin: 8px 0;}
.information button{border-radius: 30px;font-size: 16px; box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19);background-color:#F4F6F9;color:black;margin-left: 45px;}
.information button:hover {color:#fff;background-color: black;}
.information .button:active {background-color: #3e8e41;box-shadow: 0 5px #666;transform: translateY(4px);}
#formButton {border-radius: 30px;font-size: 16px; box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19);background-color:#F4F6F9;color:black;margin-left:520px; padding: 20px;margin-bottom: 10px;}

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

						<h2 class="page-title">Creating banners</h2>

						<!-- Zero Configuration Table -->
						<div class="panel panel-default">
							<div class="panel-heading">Create banners</div>
							<div class="panel-body" id="panel-body">
							<?php if($error){?><div class="errorWrap" id="msgshow"><?php echo htmlentities($error); ?> </div><?php }
				else if($msg){?><div class="succWrap" id="msgshow"><?php echo htmlentities($msg); ?> </div><?php }?>
				<form method="post" enctype="multipart/form-data">
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
	<button type="button" id="formButton">Create a new banner!</button>
<div class="information" id="information">
	 <h6><strong>Please enter information to create an advertisement</strong></h6>
	<form id="ad" method="post">
		<!-- <input type="file" name="file" value="Please select a picture" id="fileToUpload"> -->
		<input type="text" name="image" value="image" style="padding:10px"><br>
		<input type="text" name="price" value="price"><br>
		<input type="text" name="text" value="text"><br>
		<input type="text" name="header" value="header"><br>
		<input type = "number" name="user_id" value="user_id"><br>
		<button name="submit" type="submit">Click me!</button>
	</form>
</div>
<div id="result_ad"></div>
	<div class="card" id="card">
  <img src="images/jeans.jpg" alt="Denim Jeans" style="width:100%" id="img">
	<!-- <button onclick="myFunction()">click to see  which product to advertise * Not to worry is not part of the advertisements * </button> -->
	<!-- <div id="myDIV">
		<form>
			<h6><strong> please choose which product to advertise</strong> </h6>
	  <input type="radio" name="ad" value="Coffee" id="coffee"> Coffee <br>
	  <input type="radio" name="ad" value="shirts" id="shirts">Shirts <br>
	  <input type="radio" name="ad" value="jeans" id="jeans"> Jeans <br>
		<input type="radio" name="ad" value="cars" id="cars"> Cars <br>
		<input type="radio" name="ad" value="telescope" id="telescope"> Telescope <br>
	  <input type="submit" value="Submit" onclick="changeImg()" id ="button">
	</form>
</div> -->
  <h1 id="header">header</h1>
  <p class="price" id="price">$price</p>
  <p id="details">Some text about the jeans..</p>
</div>
<div id="demo"></div>
	<?php

	if(isset($_POST['submitOne'])){
	$email = $_POST['email'];
	echo "the email is :" .$email."<br>";
	$sql = "SELECT MAX(user_id),email FROM ad,users WHERE email='$email'; ";
	$result = $conn->query($sql);
	if($result === false)
	{
		 user_error("Query failed: ".$conn->error."<br />$sql");
		 echo "false";
	}
		$row1= mysqli_fetch_assoc($result);
} else {
	echo "ERROR";
}

	// $query= "SELECT * FROM images";
	// $res = $conn->query($query);
	// if($res === false){
	// 	user_error("Query failed: ".$conn->error."<br />$sql");
	// 	echo "false";
	// }
	// $new_row = mysqli_fetch_assoc($res);
	//  echo "print the image form db: ".$new_row['image']."<br>";
	//  echo "print the text of the image form db: ".$new_row['text']."<br>";



		//echo "print image: ". $row['image']."<br>";
		 //echo "print text: ". $row['text']."<br>";
		 //echo "print price: ". $row['price']."<br>";
		 //echo "print header: ". $row['header']."<br>";
		 //echo "<img src =\"".$row['image']."\">";

	?>
	<script>
	function getTheLastId(){
		var x = "<?php echo $row1['MAX(user_id)'];?>";
		document.getElementById("panel-body").style.textAlign = "center";
		document.getElementById("panel-body").innerHTML= " Your banner ID is:  " + x + " Please keep your ID in order to use a platform for the campaign";
	}
	</script>
<script type="text/javascript">
document.getElementById("img").addEventListener("click", changeDetails);
//document.getElementById("img").addEventListener("click",changeImg);
//document.getElementById("header").addEventListener("click",changeHeader);
//document.getElementById("details").addEventListener("click",changeText);
/*function changeDeat(){
	let x =	document.getElementById("ad").submit;
	var i;
	for ( i=0; i<x.length;++i){
		console.log(x[i]);
	}

}
*/

function changeDetails(){
	//change the price
	var x = <?php echo $row['price'];?>;
	document.getElementById("price").innerHTML =  x + " $ ";
	//change the header
	var x = "<?php echo $row['header'];?>";
	document.getElementById("header").innerHTML = x;
//change the text
	var x = "<?php$row['text'];?>";
	document.getElementById("details").innerHTML =x;
//change the image
	var x = "<?php echo $row['image'];?>";
 	console.log(x);
  document.getElementById("img").src= x;
	var user_id = <?php echo $row['MAX(user_id)'];?>;
	document.getElementById('demo').innerHTML = "the id of the campaing is " + user_id;

}/*
function changePrice(){

}
 function changeHeader(){
	 var x = "?php echo $row['header'];?>";
	 document.getElementById("header").innerHTML = x;
 }
 function changeText(){
	 var x = "?php$row['text'];?>";
	 document.getElementById("details").innerHTML =x;
 }
function changeImg(){
 // var x = "?php echo $row['image'];?>";
	alert(x);
 document.getElementById("img").src= x;
	//var radios = getElementById("button").value;
	//if(document.getElementById('coffee').checked)
	//var x = document.getElementById('coffee').value;
	//alert(x);
}

/*function changePrice(){
  document.getElementById("price").innerHTML = "someting else";
}*/
/*
function myFunction() {
  var x = document.getElementById("myDIV");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}*/
</script>

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
//add to database new ad
			$("#ad").submit(function(){
			//alert("signup_form");
			$("button").prop('disabled', true);
			var formData = new FormData(this);
			$.ajax({
				url:     'insert_ad.php',
				type:    'POST',
				data:    formData,
				async:   false,
				success: function(data) {
					alert("success");
				   	$("#result_ad").html(data);
					$("button").prop('disabled', false);
				},
				cache: false,
				contentType: false,
				processData: false
			});
			return false;
	});
	$("#formButton").click(function(){
        $("#information").toggle();
    });
					});
		</script>
</body>
</html>
<?php } ?>
