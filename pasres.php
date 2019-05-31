<?php
include('inclueds/config.php');
if(isset($_POST['submit'])) {
    if(getimagesize($_FILES['imagefile']['tmp_name']) == false){
      echo ' <br> Please Select An Image.<br>';

    } else {
      // code...
    }{

    }
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
