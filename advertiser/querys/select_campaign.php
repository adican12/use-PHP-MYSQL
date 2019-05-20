<?php
include("../includes/config.php");



$sql = "SELECT * FROM campaign";
 if ($result = $conn->query($sql) === TRUE) {
  	echo "<script type='text/javascript'>alert('Insert  Sucessfull!');</script>";
  	echo "<script type='text/javascript'> document.location = 'notification.php'; </script>";
 	} else {
     		echo "Error: " . $sql . "<br>" . $conn->error;
	       echo "<script type='text/javascript'>alert('ERROR   INSTERT!');</script>";
  }


?>
