<?php
session_start();
include('includes/config.php');
//gloab var
// $msg = "";
//
//   echo "we inside the function <br>";
//   //this is the path to where the sotrge the images
//   $target_name = "images/";
//   $target_image = $target_name.basename($_FILES['file']['text']);
//   echo "what inside the target" .$target."<br>";
//
//   //get the data form the form
//   $file = $_FILES['file'];
//   $text = $_POST['text'];
//
//   $sql = "INSERT INTO images(image,name) VALUES ('$file','$text')";
//   if($conn->query($sql) === TRUE){
//     echo " first New record $text image create successfully";
//   }else {
//       echo " FIRST Error: " . $sql . "<br>" . $conn->error;
//   }
//   if(move_uploaded_file($_FILES['file']['tmp_name'],$target)){
//     $msg = "Image Upload to database Sucessfully!!!";
//   } else {
//     $msg = "EROOR CANT UPLOADING IMAGE TO DATABASE";
//   }
$image= $_POST['image'];
$price= $_POST['price'];
$description = $_POST['text'];
$title= $_POST['header'];
$advID= $_POST['user_id'];
      // declare Variables
						echo "we here";
            $image =$_FILES['imagefile']['tmp_name'];
            $name = $_FILES['imagefile']['name'];
            $images = base64_encode(file_get_contents(addslashes($image)));



$sql = "INSERT INTO `ad`(`description`,`price`,`title`,`advID`,`image`)
VALUES('$description','$price','$title','$advID','$images');";

if ($conn->query($sql) === TRUE) {
    //echo "New record $text user  created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

///////////////////////////////////////upload a image and save it in Database/////////////////////////
//$table = 'image';

$conn->close();

?>
