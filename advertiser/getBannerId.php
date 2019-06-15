<?php
include('includes/config.php');
if(isset($_POST['submitOne'])){

$email = $_POST['email'];
echo "the email is :" .$email."<br>";
$sql = "SELECT user_id FROM users WHERE email='$email'; ";
$result = $conn->query($sql);
if($result === false)
{
   user_error("Query failed: ".$conn->error."<br />$sql");
   echo "false";
}
  $row1= mysqli_fetch_assoc($result);
} else {
  echo "ERROR ";
}
?>
