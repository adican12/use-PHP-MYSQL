
<?php
  include('includes/config.php');
  if(isset($_POST['uploadfilesub'])) {
    $filename=$_FILES['uploadfile']['name'];
    $filetempname=$_FILES['uploadfile']['tmp_name'];
    $folder = 'images/';
    move_uploaded_file($filetempname,$folder.$filename);
  $sql = "INSERT INTO `image`(`image`)VALUES('$filename');";
  if($qry = $conn->query($sql)) {
    //echo "image uploaded";
  }
}
$image_id = 1;
$sql = "SELECT * FROM image WHERE image_id = 2;";
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
      <input type="file" name="uploadfile" />
      <input type="submit" name="uploadfilesub" value="upload" />
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
