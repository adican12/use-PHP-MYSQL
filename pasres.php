

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
if(isset($_POST['submit'])) {
  if(getimagesize($_FILES['imagefile']['tmp_name']) == false){
    echo "<br/> Please Select An Image,";
  } else {
    //declare variables
    $image = $_FILES['imagefile']['tmp_name'];
    $name = $_FILES['imagefile']['name'];
    $image = base64_decode(file_get_contents(addslashes($image)));
    //sql query
    $sql = "INSERT INTO `ad`(`text`,`price`,`header`,`id`,`image`) VALUES ('TEST',1000,'TEST1',1,'$image')";
    if($conn->query($sql)) {
      echo " <br/> Image uploaded Successfully";
    } else {
      echo " <br/> Image Failed to uploaded";
    }

  }

} else {
  # code..
}
// retrieve image form database and display it on html webpage

function displayImageFromDatabase() {
  $sql = "SELECT * FROM ad;";
  if($res=$conn->query($sql)){
    while($row = mysqli_fetch_assoc($res)){
      echo "the text is : ".$row['text']."<br> /";
      echo "the price is : ".$row['price']."<br> /";
      echo "the header is : ".$row['header']."<br> /";
      echo "the id is : ".$row['id']."<br> /";
      echo '<img height = "250px" width="250px;" src=data:image;base64'.$row['image']."<br> /";
    }

  }
}
displayImageFromDatabase();
?>
<!doctype html>
<html>
<head>
    <title>TRY TO UPLOAD A IMAGE</title>
</head>
<body>
  <form action="" method="post" enctype="multipart/form-data">
    <input type="file" name="imagefile">
    <br />
    <input type="submit" name="submit" value="upload">


  </form>
</body>
</html>
