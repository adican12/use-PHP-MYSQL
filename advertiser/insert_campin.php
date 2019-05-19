<?php
$id = $_SESSION['id'] +1;
$adID = $_SESSION['adID'] +1;

	$campaignName = $_POST['campaignName'];
	$budget = $_POST['budget'];
	$gender = $_POST['gender'];
	$stratDate = $_POST['stratDate'];
	$endDate = $_POST['endDate'];
	$category = $_POST['category'];
	$ageMin = $_POST['ageMin'];
	$ageMax = $_POST['ageMax'];
echo "the id is = ".$id."<br>";
echo "the adID is = ".$adID;

  echo "Campagin Name:".$campaignName."<br>"."the budget is : ".$budget."<br>"."the gender is: ".$gender."<br>";
  echo "the strat date of the campaign is : ".$stratDate."<br>"."the end date of the campaign is : ".$endDate."<br>";
  echo "the category is : " .$category;

 	$sql = "INSERT INTO `campaign`(`campaignName`,`id`,`adID`,`gender`,`ageMin`,`ageMax`,`budget`,`category`,`stratingDate`,`endDate`)
 	VALUES('$campaignName','$id','$adID','$gender','$ageMin','$ageMax','$budget','$category','$stratDate','$endDate');";
 	if ($conn->query($sql) === TRUE) {
 		echo "<script type='text/javascript'>alert('Insert  Sucessfull!');</script>";
 		// echo "<script type='text/javascript'> document.location = 'notification.php'; </script>";
 	} else { 		echo "Error: " . $sql . "<br>" . $conn->error;
		echo "<script type='text/javascript'>alert('ERROR   INSTERT!');</script>";
		$error="Something went wrong. Please try again";


// // session_start();
// include('includes/config.php');
// // if(isset($_POST['sumbit'])) {
// 	$campaignName = $_POST['campaignName'];
// 	$budget = $_POST['budget'];
// 	$gender = $_POST['gender'];
// 	$stratDate = $_POST['stratDate'];
// 	$endDate = $_POST['endDate'];
// 	$category =$_POST['category'];
//   echo "Campagin Name:".$campaignName."<br>"."the budget is : ".$budget."<br>"."the gender is: ".$gender."<br>";
//   echo "the strat date of the campaign is : ".$stratDate."<br>"."the end date of the campaign is : ".$endDate."<br>";
//   echo "the category is : " .$category;
//
// 	$sql = "INSERT INTO `campaign`(`campaignName`,`budget`,`gender`,`stratingDate`,`endDate`,`category`)
// 	VALUES('$campaignName','$budget','$gender','$stratDate','$endDate','$category');";
// 	if ($conn->query($sql) === TRUE) {
// 		echo "<script type='text/javascript'>alert('Insert  Sucessfull!');</script>";
// 		echo "<script type='text/javascript'> document.location = 'notification.php'; </script>";
// 	} else {
// 		echo "Error: " . $sql . "<br>" . $conn->error;
// 		echo "<script type='text/javascript'>alert('ERROR   INSTERT!');</script>";
// 		$error="Something went wrong. Please try again";
// 	}
//
// 	$conn->close();
// }


?>
