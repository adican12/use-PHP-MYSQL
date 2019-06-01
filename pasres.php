<?php
include('includes/config.php');
if(isset($_POST['submit'])) {
    if(getimagesize($_FILES['imagefile']['tmp_name']) == false){
          echo ' <br> Please Select An Image.<br>';
    } else {
            // declare Variables
            $image =$_FILES['imagefile']['tmp_name'];
            $name = $_FILES['imagefile']['name'];
            $images = base64_encode(file_get_contents(addslashes($image)));

            /*Query insert into db*/
            $sql = "INSERT INTO `image`(`name`,`image`)VALUES('$name','$images')";
            if($conn->query($sql) == false) {
                    echo "Image Failed to upload";
                  } else {
                            echo "Image uploaded successfully";
                          }
                        }
}
 else {
  echo "__ERROR_PLEASE__SELECT__A__PICTURE__<br>";
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
<?php
include('includes/config.php');
// Retrieve image form database and display it on html webpage
   $sql= "SELECT * FROM `image`";

   $res=$conn->query($sql);
   if($res == false){
     echo "___ERROR__WE__CANT__DISPLAY__IMAGE__FROM__DB";
   } else {
     while($row=mysqli_fetch_assoc($res)){
      echo '<img height = 150px width=100px src=data:image;base64,'.$row['image'].'>';
      }
   }

?>
<table style="width:100%">
<tr>
<th>Image</th>
</tr>
<tr>
<td><img src="<?php echo $row['image'];?>";></td>
</tr>
</table>
</body>
</html>
