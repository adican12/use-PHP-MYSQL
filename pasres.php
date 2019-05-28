<?php
include('includes/config.php');

// $row = 1;
// if (($handle = fopen("user.csv", "r")) !== FALSE) {
//     while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
//         $num = count($data);
//         echo "<p> $num fields in line $row: <br /></p>\n";
//         $row++;
//         // for ($c=0; $c < $num; $c++) {
//         //      echo $data[$c] . "<br />\n";
//         //  }
//         echo " befor:"."<br>";
//         #LEST TRY THIS
//         $id = $data[0];
//         $name = $data[1];
//         $email = $data[2];
//         $password = $data[3];
//         $gender = $data[4];
//         $mobile = $data[5];
//         $user_type = $data[6];
//         $image = $data[7];
//         $birthday = $data[8];
//         $status = intval($data[9]);
//         $user_category = $data[10];
//
//         // $at = floatval ($data[1]);
//         // $bus_long = floatval ($data[2]);
//
//         echo "the id is: ".$id."<br>";
//         echo "the name is: ".$name."<br>";
//         echo "the email is: ".$email."<br>";
//         echo "the password is: ".$password."<br>";
//         echo "the gender is: ".$gender."<br>";
//         echo "the moblie is: ".$mobile."<br>";
//         echo "the user Type is: ".$user_type."<br>";
//         echo "the image is: ".$image."<br>";
//         echo "the birthday is: ".$birthday."<br>";
//         echo "the status is: ".$status."<br>";
//         echo "the user Category is: ".$user_category."<br>";
        // echo " after : <br>";
//
//     }
//
//   fclose($handle);
// }

$sql = "SELECT * FROM ad WHERE adID = 1";
$result = $conn->query($sql);
  if($result === false)
  {
  	user_error("Query failed: ".$conn->error."<br />$sql");
  	echo "false";
  }
  $row3= mysqli_fetch_assoc($result);
  echo "this is the image : ".$row3['image']."<br>";

?>
