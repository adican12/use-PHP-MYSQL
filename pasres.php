<?php
include('inclueds/config.php');
if(isset($_POST['submit'])) {
    if(getimagesize($_FILES['imagefile']['tmp_name']) == false){
          echo ' <br> Please Select An Image.<br>';
    } else {
      echo "hello.<br>";
            // declare Variables
            $image =$_FILES['imagefile']['tmp_name'];
            $name = $_FILES['imagefile']['name'];
            $images = base64_encode(file_get_contents(addslashes($image)));

            /*Query insert into db*/
            $sql = "INSERT INTO `image`(`name`,`image`)VALUES('$name','$image')";
            //$result = $conn->query($sql);
            //if($result) {
                    //echo "Image uploaded Successfully";
            //} //else {
                  //  echo "Image Failed to upload";
            //}
    }
} else {
  echo "we here";
}
?>



<html>
<head>
  <title>Try to upload a blob image to my sql </title>
  <meta charset="UTF-8">
</head>
<body>
<form method="post" action="" enctype="multipart/form-data">
 <input type="file" name="imagefile">
 <br>
 <input type="submit" name="submit" value="Upload">
</form>

</body>
</html>
