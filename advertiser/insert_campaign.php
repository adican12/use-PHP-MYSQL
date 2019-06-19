<?php
include('includes/config.php');
 session_start();
;
// error_reporting(0);


	$campaignName = $_POST['campaignName'];
	$budget = $_POST['budget'];
	$gender = $_POST['gender'];
	$stratDate = $_POST['stratDate'];
	$endDate = $_POST['endDate'];
	$category = $_POST['category'];
	$ageMin = $_POST['ageMin'];
	$ageMax = $_POST['ageMax'];
  $adID = $_POST['adID'];
  $location=$_POST['location_id'];


	 echo "the adID is = ".$adID."<br>";
   echo "Campagin Name:".$campaignName."<br>"."the budget is : ".$budget."<br>"."the gender is: ".$gender."<br>";
   echo "the strat date of the campaign is : ".$stratDate."<br>"."the end date of the campaign is : ".$endDate."<br>";
   echo "the category is : " .$category;

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
