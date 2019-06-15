<?php
include('includes/config.php');
$email = $_POST['email'];
echo "the email is :" .$email."<br>";
$sql = "SELECT MAX(users.user_id,ad.advID),email FROM ad,users WHERE email='$email'; ";
$result = $conn->query($sql);
if($result === false)
{
   user_error("Query failed: ".$conn->error."<br />$sql");
   echo "false";
}
  $row1= mysqli_fetch_assoc($result);
?>
