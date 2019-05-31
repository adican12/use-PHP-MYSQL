

<?php
  include('includes/config.php');
$target_dir = "images/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
        $sql = "INSERT INTO `image`(`image`)VALUES('$target_file');";
        if($qry = $conn->query($sql)) {
          echo "image uploaded";
        }
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
$sql = "SELECT * FROM image";
if($res = $conn->query($sql)) {
  //echo '<script>alert("ok the query is working work")</script>';
  while($row =  mysqli_fetch_assoc($res)) {
    echo '<img height = 150px width=250px src="'.$row['image'].'">';
  }
}
?>
<!DOCTYPE html>
<html>
<body>
  <form action="" method="post" enctype="multipart/form-data">
  Select image to upload:
  <input type="file" name="fileToUpload" id="fileToUpload">
  <input type="submit" value="Upload Image" name="submit">
</form>
    <table style="width:100%">
  <tr>
    <th>Image</th>
  </tr>
  <tr>
    <td><?php echo $row['image'];?></td>
  </tr>
  <tr>
    <!-- <img src="images/banner3.jpg"> -->
  </tr>
</table>
</body>
</html>
