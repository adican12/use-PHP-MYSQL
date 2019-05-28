

<?php
// // $row = 1;
// // if (($handle = fopen("user.csv", "r")) !== FALSE) {
// //     while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
// //         $num = count($data);
// //         echo "<p> $num fields in line $row: <br /></p>\n";
// //         $row++;
// //         // for ($c=0; $c < $num; $c++) {
// //         //      echo $data[$c] . "<br />\n";
// //         //  }
// //         echo " befor:"."<br>";
// //         #LEST TRY THIS
// //         $id = $data[0];
// //         $name = $data[1];
// //         $email = $data[2];
// //         $password = $data[3];
// //         $gender = $data[4];
// //         $mobile = $data[5];
// //         $user_type = $data[6];
// //         $image = $data[7];
// //         $birthday = $data[8];
// //         $status = intval($data[9]);
// //         $user_category = $data[10];
// //
// //         // $at = floatval ($data[1]);
// //         // $bus_long = floatval ($data[2]);
// //
// //         echo "the id is: ".$id."<br>";
// //         echo "the name is: ".$name."<br>";
// //         echo "the email is: ".$email."<br>";
// //         echo "the password is: ".$password."<br>";
// //         echo "the gender is: ".$gender."<br>";
// //         echo "the moblie is: ".$mobile."<br>";
// //         echo "the user Type is: ".$user_type."<br>";
// //         echo "the image is: ".$image."<br>";
// //         echo "the birthday is: ".$birthday."<br>";
// //         echo "the status is: ".$status."<br>";
// //         echo "the user Category is: ".$user_category."<br>";
//         // echo " after : <br>";
// //
// //     }
// //
// //   fclose($handle);
// // }
// $image = ['uploadedimage'];
// $file = $_FILES['image']['name'];
//
//
// $sql = "SELECT * FROM ad WHERE adID = 1";
// $result = $conn->query($sql);
//   if($result === false)
//   {
//   	user_error("Query failed: ".$conn->error."<br />$sql");
//   	echo "false";
//   }
//   $row3= mysqli_fetch_assoc($result);
//   echo "this is the text : ".$row3['text']."<br>";
//   echo " this is the image :".$row3['image']."<br>";
//
// ?>



<?php
include('includes/config.php');
$image = addslashes(file_get_contents($_FILES['image']['tmp_name'])); //SQL Injection defence!
$image_name = addslashes($_FILES['image']['name']);
$sql = "INSERT INTO `ad` (`text`,`price`,`header`,`id`,`image`) VALUES ('test',10000,'its test','1', '{$image}')";
if (!mysql_query($sql)) { // Error handling
    echo "Something went wrong! :(";
}
  $result = mysqli_query($dbname, "SELECT * FROM ad");
?>
<!DOCTYPE html>
<html>
<head>
<title>Image Upload</title>
<style type="text/css">
   #content{
   	width: 50%;
   	margin: 20px auto;
   	border: 1px solid #cbcbcb;
   }
   form{
   	width: 50%;
   	margin: 20px auto;
   }
   form div{
   	margin-top: 5px;
   }
   #img_div{
   	width: 80%;
   	padding: 5px;
   	margin: 15px auto;
   	border: 1px solid #cbcbcb;
   }
   #img_div:after{
   	content: "";
   	display: block;
   	clear: both;
   }
   img{
   	float: left;
   	margin: 5px;
   	width: 300px;
   	height: 140px;
   }
</style>
</head>
<body>
<div id="content">
  <?php
    while ($row = mysqli_fetch_array($result)) {
      echo "<div id='img_div'>";
      	echo "<img src='images/".$row['image']."' >";
      	echo "<p>".$row['text']."</p>";
      echo "</div>";
    }
  ?>
  <form method="POST" action="pasres.php" enctype="multipart/form-data">
  	<input type="hidden" name="size" value="1000000">
  	<div>
  	  <input type="file" name="image">
  	</div>
  	<div>
      <textarea
      	id="text"
      	cols="40"
      	rows="4"
      	name="image_text"
      	placeholder="Say something about this image..."></textarea>
  	</div>
  	<div>
  		<button type="submit" name="upload">POST</button>
  	</div>
  </form>
</div>
</body>
</html>
