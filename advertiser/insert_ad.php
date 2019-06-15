<?php
require __DIR__ . '/../vendor/autoload.php';
// # Imports the Google Cloud client library
use Google\Cloud\Storage\StorageClient;

session_start();
include('includes/config.php');

$projectId = 'catifi';
//
// # Instantiates a client
$storage = new StorageClient([
    'projectId' => $projectId
]);

$bucket = $storage->bucket('catifi2');

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

    // declare Variables
						$price= $_POST['price'];
						$description = $_POST['text'];
						$title= $_POST['header'];
						$email= $_POST['user_email'];
						// get the user_id of the adver
						$sql = "SELECT user_id FROM users WHERE email = '$email';";
						$results = $conn->query($sql);
						if($results === false) {
							echo "___EROOR___";
						}
						$row = mysqli_fetch_assoc($results);
						$advID = $row['user_id'];

						//match_per = 0 , Will change in the future
						$match_per = 0;



						echo "we here";
						$target_dir = 'newImages/';

						$file = file_get_contents($_FILES['imagefile']['tmp_name']);
						$objectName = $target_dir.$_FILES['imagefile']['name'];

						$object = $bucket->upload( $file, [
								'name' => $objectName
						]);

							$imageURL ='https://storage.googleapis.com/catifi2/newImages/'.$_FILES['imagefile']['name'];

$sql = "INSERT INTO `ad`(`description`,`price`,`title`,`advID`,`image`,`match_per`)
VALUES('$description','$price','$title','$advID','$imageURL','$match_per');";

if ($conn->query($sql) === TRUE) {
    //echo "New record $text user  created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

///////////////////////////////////////upload a image and save it in Database/////////////////////////
//$table = 'image';

$conn->close();

?>
