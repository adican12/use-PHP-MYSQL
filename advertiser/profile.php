<?php

// adverstier maps see where the advertiers can publish

session_start();
error_reporting(0);
include('includes/config.php');
include('cons.php');
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
		if($query === false)
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
		$sql = "SELECT * from locations WHERE location_id=8";
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
	<!-- <script src="js/constOne.js"></script> -->
	<script src="js/jquery.min.js"></script>
	<!-- <script src="js/const.js"></script> -->
	<!-- <script src = "../config.js"></script> -->

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
/*GET THE HOW MUCE LOCATIONS WE HAVE IN DB*/
$query="SELECT MAX(location_id) FROM locations";
$res =$conn->query($query);
if($res === false) {
	echo "the query is not working";
}
$length =  mysqli_fetch_assoc($res);
?>
<?php
include('includes/config.php');
/*GET ALL THE INFO  WE HAVE IN DB*/
$query = "SELECT lat,lng ,info FROM locations where id =13;";
$res = $conn->query($query);
if($res === false) {
	echo "____ERROR___THE__QUERY__FAIELD";
}
$info = mysqli_fetch_assoc($res);
$sql = "SELECT lat,lng ,info FROM locations where id =15; ";
$res = $conn->query($sql);
if($res === false) {
		echo "____ERROR___THE__QUERY__FAIELD__1__";
}
$row1=mysqli_fetch_assoc($res);
?>
	<script>
	 // var mykey = key;
//	 console.log(mykey);
var length = <?php echo $length['MAX(location_id)']?>;
console.log("the length is : " + length);


// 	var mykey = config.MY_KEY;
// var secretkey = config.SECRET_KEY;
	// this function to open a google maps , set marker and open a info window
// 	function initMap() {
// 		var marker,i;
// 		// Map options
// 		var options = {
// 			zoom:8,
// 			center:new google.maps.LatLng(32.109333,34.855499)
// 		}
//
//
//
// 		// create a new map in the div googleMap;
// 		var map = new google.maps.Map(document.getElementById("googleMap"),options);
//
// 		// Add Marker
// 		var marker = new google.maps.Marker({
// 			position:{lat:32.10933, lng:34.855499},
// 			map:map
// 		});
// 		//Add a new marker1
// 		var marker1 = new google.maps.Marker({
// 			position:{lat:<?php echo $result['lat']?>,lng:<?php echo $result['lng']?>},
// 			map:map
//
// 		});
// 		var marker2 = new google.maps.Marker({
// 			position:{lat:<?php echo $info['lat']?>,lng:<?php echo $info['lng']?>},
// 			map:map
//
// 		});
// 		var marker3 = new google.maps.Marker({
// 			position:{lat:34.5702,lng:31.6836},
// 			map:map
//
// 		});
// 		var marker4 = new google.maps.Marker({
// 			position:{lat:<?php echo $info['lat']?>,lng:<?php echo $info['lng']?>},
// 			map:map
//
// 		});
// 		var marker5 = new google.maps.Marker({
// 			position:{lat:<?php echo $info['lat']?>,lng:<?php echo $info['lng']?>},
// 			map:map
//
// 		});
//
//
// 		var infowindow= new google.maps.InfoWindow({
// 			content:'<h3>H - Good location away from the crouds</h3>'
// 		});
// 		//adding a new infowindow
// 		var infowindow1 = new google.maps.InfoWindow({
// 			content: '<h3><?php echo $result['info'].$result['name']?>;</h3>'
// 		});
// 		var infowindow2 = new google.maps.InfoWindow({
// 			content: '<h3><?php echo $info['info']?>;</h3>'
// 		});
// 		// add a listnerr when the click we see the msg.
// 		marker.addListener('click',function(){
// 			infowindow.open(map,marker);
// 		});
// 		marker1.addListener('click',function(){
// 			infowindow1.open(map,marker);
// 		});
// 		marker2.addListener('click',function(){
// 			infowindow2.open(map,marker);
// 		});
//
//
//
// }
function initMap() {
  var options = {
  zoom:9,
  center:new google.maps.LatLng(32.109333,34.855499)
}
  	var map = new google.maps.Map(document.getElementById("googleMap"),options);
    setMarkers(map);
    var infoWindow = new google.maps.InfoWindow(), marker, i;
  }
    var beaches= [
        ['grand beach', 32.135178, 34.781334, 4],
        ['cron palza', 34.141084, 34.797801, 5],
        ['Dan Hotel', 32.134968, 34.761612, 3],
        ['Lendore Botik',32.139363,34.836722, 2],
    ['rimonim Hotel',31.815342,35.169466, 1],
    ['aiibi',31.835906,35.214997,6],
    ['lenord',32.891758,34.941509,7],
    ['beway',32.903532,34.991884,8]
      ];
  var restaurants = [
    ['Bieta coffe',32.187217,34.792008,1],
    ['name',32.164837,34.781041,2],
    ['TOTO',32.120992,34.773103,3],
    ['AMORA MIA',32.092712,34.783845,4],
    ['THE RESTAURANT',32.125556,34.792376,5],
    ['MODREN',31.829818,35.213579,6],
    ['MAHNA-YHEDA',31.835016,35.203752,7],
    ['VIVINO',32.889647,34.986638,8],
    ['THE-PROT-24',32.919405,35.002212,9]
  ];
  var malls = [
    ['Azrieli Ayalon Mall',32.101797,34.826884,1],
    ['Ofer Mall',32.113282,24.796149,2],
    ['Arim Mall Kfar Saba',32.184225,34.905302,3],
    ['Ofer Shopping Center',32.095107,34.865602,4],
    ['The Givatayim Azrieli Mall',32.067370,34.809359,5],
    ['the Golden Mall',31.994869,34.774416,6]
  ];




    function setMarkers(map) {
      for (var i = 0; i < beaches.length; i++) {
          var beach = beaches[i];
          var marker = new google.maps.Marker({
            position: {lat: beach[1], lng: beach[2]},
            map: map,
            title: beach[0],
            zIndex: beach[3]
          });
        }
        for(var i = 0; i <restaurants.length; i++) {
          var restaurant = restaurants[i];
          var marker = new google.maps.Marker({
            position: {lat: restaurant[1], lng: restaurant[2]},
            map: map,
            title: restaurant[0],
            zIndex: restaurant[3]
          });
          var infowindow= new google.maps.InfoWindow({
            content:restaurant[0]
    });
        }
        for(var i = 0; i< malls.length; i++) {
          var mall = malls[i];
          var marker = new google.maps.Marker({
            position: {lat: restaurant[1], lng: restaurant[2]},
            map: map,
            title: restaurant[0],
            zIndex: restaurant[3]
          });
          var infowindow= new google.maps.InfoWindow({
			content:malls[0]
		});

        }
      }

	</script>

	<!-- <script src=a></script> -->
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
<!-- // } -->
	<!-- </script> -->


</body>
</html>
<?php } ?>
