<?php
include('includes/config.php');
 session_start();

// error_reporting(0);
//
// $sql = "SELECT MAX(adID) FROM ad";
// $result = $conn->query($sql);
// if($result === false) {
// 	echo "<script>alert('_____ERROR____')</script>";
// }
// $row = mysqli_fetch_assoc($result);
// $adID=$row['MAX(adID)'];
// echo $adID;

	$campaignName = $_POST['campaignName'];
	$budget = $_POST['budget'];
	$gender = $_POST['gender'];
	$stratDate = $_POST['stratDate'];
	$endDate = $_POST['endDate'];
	$category = $_POST['category'];
	$ageMin = $_POST['ageMin'];
	$ageMax = $_POST['ageMax'];
  // $adID = $_POST['adID'];
  $location_id=$_POST['locations'];
  $baneers = $_POST['banners'];

// new query
echo "the banners is : ".$baneers."<br>";
$querys = "SELECT adID FROM ad WHERE title ='$baneers'";

$result = $conn->query($querys);
if($result === false) {
  echo "_____ERROR____".$conn->error."<br>";
}
$row = mysqli_fetch_assoc($result);
$adID =$row['adID'];
echo "the adID is : ".$adID."<br>";



	 // echo "the adID is  ".$adID."<br>";
   echo "Campagin Name:".$campaignName."<br>";
   echo "the budget is : ".$budget."<br>";
   echo "the gender is: ".$gender."<br>";
   echo "the strat date of the campaign is : ".$stratDate."<br>";
   echo "the end date of the campaign is : ".$endDate."<br>";
   echo "the category is : ".$category."<br>";
   echo "this is the location: ".$location_id."<br>";

   switch($location_id) {
     case 'tel_aviv':
       $location_id =1;
       break;

    case 'haifa':
      $location_id = 2;
      break;

    case 'eilat':
      $location_id =3;
      break;
    case 'ramat_gan':
      $location_id =4;
      break;
    case 'givatayim':
      $location_id = 5;
      break;
    case 'beer_sheva':
      $location_id =6;
      break;
    case 'jerusalem':
      $location_id = 7;
      break;
    default:
      echo "Sorry You Cant Publish Campagin Here <br>";
      break;
  }

 $sql = "INSERT INTO `campaign`(`campaignName`,`adID`,`gender`,`ageMin`,`ageMax`,`budget`,`category`,`stratingDate`,`endDate`,`locationID`)
 	 VALUES('$campaignName','$adID','$gender','$ageMin','$ageMax','$budget','$category','$stratDate','$endDate','$location_id');";
 	if ($conn->query($sql) === TRUE) {
 	echo "<script type='text/javascript'>alert('Insert  Sucessfull!');</script>";
 	echo "<script type='text/javascript'> document.location = 'notification.php'; </script>";
 	}else {
		echo "Error: " . $sql . "<br>" . $conn->error;
		echo "<script type='text/javascript'>alert('ERROR   INSTERT!');</script>";
	$error="Something went wrong. Please try again";
 	}



?>
