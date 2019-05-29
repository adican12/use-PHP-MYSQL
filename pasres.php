
<?php
  include("php/config.php");
  if(isset($_FILES['file'])) {
    $file = $_FILES['file'];

    // File Details

    //name of file
    $name = $file['name'];

    //tmp_name
    $tmp_name =$file['tmp_name'];
    $extension = explode('.',$name);
    var_dumb($extension);
  }
?>

<!DOCTYPE html>
<html>
<body>

<form action="" method="post" enctype="multipart/form-data">
    Select image to upload:
    <input type="file" name="file" id="fileToUpload">
    <input type="submit" value="UploadImage" name="submit">
</form>

</body>
</html>
