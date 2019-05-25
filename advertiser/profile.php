<?php

// adverstier maps see where the advertiers can publish

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

		$sql="UPDATE `users` SET username=$name, email=$email";

		// $sql="UPDATE `users` SET name=$name, email=$email, gender=$gender, mobile=$mobileno, designation=$designation, Image=$image WHERE id=$idedit";
		$query = $conn->query($sql);
		if($result === false)
		{
			 user_error("Query failed: ".$conn->error."<br />$sql2");
			 echo "false";
		}


	// $sql="UPDATE admin SET username=(:name), email=(:email)";
	// $query = $dbh->prepare($sql);
	// $query-> bindParam(':name', $name, PDO::PARAM_STR);
	// $query-> bindParam(':email', $email, PDO::PARAM_STR);
	// $query->execute();
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

	<title>Place to adverstier</title>

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

</head>

<body>
<?php
		$sql = "SELECT * from admin";
		$query = $conn->query($sql);
		if($query === false)
		{
			 user_error("Query failed: ".$conn->error."<br />$sql2");
			 echo "false";
		}
		$result = mysqli_fetch_assoc($query);

		// $sql = "SELECT * from admin;";
		// $query = $dbh -> prepare($sql);
		// $query->execute();
		// $result=$query->fetch(PDO::FETCH_OBJ);

		$cnt=1;
?>
	<?php include('includes/header.php');?>
	<div class="ts-main-content">
	<?php include('includes/leftbar.php');?>
		<div class="content-wrapper">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-12">
						<h3 class="page-title">Place to adverstier</h3>
						<div class="row">
							<div class="col-md-12">
								<div class="panel panel-default">
									<div class="panel-heading">See places</div>
<?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php }
				else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>

									<div class="panel-body">
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
	<script src = "../config.js"></script>
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

	<div id="googleMap" style="width:100%;height:400px;"></div>
 <!-- onclick = "getLocation()" -->
 <?php
 	include('includes/config.php');
	$sql = "SELECT * FROM locations";
	if($conn->query($sql) === false) {
		user_error("Query failed: ".$conn->error."<br />$sql2");
		echo "false";
	}
	$result = mysqli_fetch_assoc($query);
	if(mysqli_num_rows($result) > 0) {
		while($row = mysqli_fetch_assoc($result)){


 ?>
	<script>
// 	var mykey = config.MY_KEY;
// var secretkey = config.SECRET_KEY;
	// this function to open a google maps , set marker and open a info window
	function initMap() {
		// Map options
		var lat = <?php echo $row['lat'];?>
		var lng = <?php echo $row['lng'];?>
		var info = <?php echo $row['info'];?>
		console.log( lat + info + lng);
		var options = {
			zoom:8,
			center:new google.maps.LatLng(32.109333,34.855499)
		}



		// create a new map in the div googleMap;
		var map = new google.maps.Map(document.getElementById("googleMap"),options);

		// Add Marker
		var marker = new google.maps.Marker({
			position:{lat:32.10933, lng:34.855499},
			map:map
		});

		var infowindow= new google.maps.InfoWindow({
			content:'<h3>HERE WE HAVE A WIFI YOU CAN PUBLISH HERE</h3>'
		});
		// add a listnerr when the click we see the msg.
		marker.addListener('click',function(){
			infowindow.open(map,marker);
		});
}
<?php  }} ?>
	</script>
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAcM_1-tDzj4g4wFtNBw-KEluCsxMbLscQ&callback=initMap"></script>
	<!--
// 	var marker_array = [];
// 	var map,marker,info_window;
// 	var red_icon = "http://maps.google.com/mapfiles/ms/icons/red-dot.png" ;
// 	var blue_icon = "http://maps.google.com/mapfiles/ms/icons/blue-dot.png";
// 	var location;
// 		function initMap() {
// 		map = new google.maps.Map(document.getElementById('googleMap'), {
// 			center: {lat: 32.089643, lng: 34.8016837},
// 			zoom: 8
//
// 		});
//
// google.maps.event.addListener(map, 'click', function(event) {
//   placeMarker(map, event.latLng);
// });
//
// function placeMarker(map, location) {
//   var marker = new google.maps.Marker({
//     position: location,
//     map: map,
// 		icon: {url :"http://maps.google.com/mapfiles/ms/icons/blue-dot.png"}
<!- //   }); -->
<!-- //   var infowindow = new google.maps.InfoWindow({ -->
<!-- //     content: 'Latitude: ' + location.lat() + -->
<!-- //     '<br>Longitude: ' + location.lng() + ' you can publish here ! ', -->
<!-- //   }); -->
<!-- //   infowindow.open(map,marker); -->
<!-- // } -->
<!-- // } --> -->
	<!-- </script> -->


</body>
</html>
<?php } ?>
