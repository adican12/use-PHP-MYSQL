<?php
include('includes/config.php');
 session_start();

 ++$_SESSION['id'];
++$_SESSION['adID'];
// error_reporting(0);
  $id = $_SESSION['id'];
 $adID = $_SESSION['adID'];

	$campaignName = $_POST['campaignName'];
	$budget = $_POST['budget'];
	$gender = $_POST['gender'];
	$stratDate = $_POST['stratDate'];
	$endDate = $_POST['endDate'];
	$category = $_POST['category'];
	$ageMin = $_POST['ageMin'];
	$ageMax = $_POST['ageMax'];

	echo "the id is = ".$id."<br>";
	 echo "the adID is = ".$adID."<br>";
   echo "Campagin Name:".$campaignName."<br>"."the budget is : ".$budget."<br>"."the gender is: ".$gender."<br>";
   echo "the strat date of the campaign is : ".$stratDate."<br>"."the end date of the campaign is : ".$endDate."<br>";
   echo "the category is : " .$category;

 $sql = "INSERT INTO `campaign`(`campaignName`,`id`,`adID`,`gender`,`ageMin`,`ageMax`,`budget`,`category`,`stratingDate`,`endDate`)
 	 VALUES('$campaignName','$id','$adID','$gender','$ageMin','$ageMax','$budget','$category','$stratDate','$endDate');";
 	if ($conn->query($sql) === TRUE) {
 	echo "<script type='text/javascript'>alert('Insert  Sucessfull!');</script>";
 	echo "<script type='text/javascript'> document.location = 'notification.php'; </script>";
 	}else {
		echo "Error: " . $sql . "<br>" . $conn->error;
		echo "<script type='text/javascript'>alert('ERROR   INSTERT!');</script>";
	$error="Something went wrong. Please try again";
 	}

	sql = "SELECT * FROM campaign";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "campaign Name: " . $row["campaignName"]. " - Gender: " . $row["gender"]. " From age : " . $row["ageMin"]. "To Age:".$row["ageMax"].
				"the budget is : " .$row['budget']." the category is : ".$row['category']."From : ".$row['stratingDate']." Until : ".$row['endDate'];
    }
} else {
    echo "0 results";
}

`campaignID`INT(11) NOT NULL AUTO_INCREMENT,
`campaignName` VARCHAR(50) NOT NULL,
`id` INT(11) NOT NULL,
`adID` INT(11) NOT NULL,
`gender` varchar(50) NOT NULL,
`ageMin` INT(6) NOT NULL,
`ageMax` INT(6) NOT NULL,
`budget` FLOAT(6) NOT NULL,
`category` VARCHAR(50) NOT NULL,
`stratingDate` DATE,
`endDate
?>
