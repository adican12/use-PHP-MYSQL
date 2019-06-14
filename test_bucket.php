<?php
//# Includes the autoloader for libraries installed with composer
include('includes/config.php');
require __DIR__ . '/vendor/autoload.php';

// # Imports the Google Cloud client library
use Google\Cloud\Storage\StorageClient;
//
// # Your Google Cloud Platform project ID
$projectId = 'catifi';
//
// # Instantiates a client
$storage = new StorageClient([
    'projectId' => $projectId
]);
//
// // # The name for the new bucket
// $bucketName = 'my-new-bucket';
// //
$bucket = $storage->bucket('catifi2');
// // # Creates the new bucket
//


// $uploadOk = 1;
// $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["addCoupon"])) {

  //$target_dir = "newImages/";
  $target_dir = "coupon/";
  // $target_file = $target_dir . basename($_FILES['fileToUpload']['name']);

  $file = file_get_contents($_FILES['imagefile']['name']);
  // $objectName = $target_dir.$_FILES['imagefile']['name'];
  $objectName = $_FILES['imagefile']['name'];

  $object = $bucket->upload( $file, [
      'name' => $objectName
  ]);
  echo "<br>file uploaded successfully</br>";
//       $useremail =	$_SESSION['alogin'];
//        //get the the business ID Who creates the coupon
//        $sql = "SELECT user_id FROM users WHERE email = '$useremail';";
//        $result = $conn->query($sql);
//        if($result === false) {
//        	echo "ERROR";
//        }
//        $row = mysqli_fetch_assoc($result);
// // // declare Variables
// // check if image upload to bucket
// //get coupon name
//         $couponName=$_POST['couponName'];
// // // // get imageurl
//         $imageURL ='https://storage.googleapis.com/catifi2/coupon/'.$_FILES['imagefile']['name'];
// // //  // check the image url
//
// // //  //get the counter of the coupon
//           $counter=$_POST['counter'];
//
// // // // the business ID
//             // $busID = $row['user_id'];
//             $busID = 2;
//       // check all Variables if them ok
//       echo "the business id is  : ".$busID."<br>";
//       echo "the imageurl is : ".$imageURL;
//       echo "the counter is : ".$counter;
//       echo " the coupon name is : ".$couponName;
// //       /*Query insert into db*/
//         $sql = "INSERT INTO `coupon`( `busID`, `imageURL`, `counter`, `couponName`) VALUES('$busID','$imageURL','$counter','$couponName');";
//           if($conn->query($sql) === false) {
//               echo "<script>alert('Image Failed to upload')</script>";
//               } else {
//                echo "<script>alert('Insert uploaded successfully')</script>";
//                }

    // $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    // if($check !== false) {
    //     echo "File is an image - " . $check["mime"] . ".";
    //     $uploadOk = 1;
    // } else {
    //     echo "File is not an image.";
    //     $uploadOk = 0;
    // }
}
// Check if file already exists
// if (file_exists($target_file)) {
//     echo "Sorry, file already exists.";
//     $uploadOk = 0;
// }
// // Check file size
// if ($_FILES["fileToUpload"]["size"] > 500000) {
//
//     echo "Sorry, your file is too large.";
//     $uploadOk = 0;
// }
// // Allow certain file formats
// if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
// && $imageFileType != "gif" ) {
//     echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
//     $uploadOk = 0;
// }
// // Check if $uploadOk is set to 0 by an error
// if ($uploadOk == 0) {
//     echo "Sorry, your file was not uploaded.";
// // if everything is ok, try to upload file
// } else {
//     if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
//         echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
//     } else {
//         echo "Sorry, there was an error uploading your file.";
//     }
// }
?>
<html>
<header>

</header>
<body>
<h1>bucket</h1>

<form action="" method="post" enctype="multipart/form-data">
  Select image to upload:
  <input type="file" name="imagefile" id="fileToUpload">
  <input type="submit" value="Upload Image" name="addCoupon">
</form>
</body>
</html>
