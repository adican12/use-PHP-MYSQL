
<?php
  include('includes/config.php');
  if(isset($_POST['uploadfilesub'])) {
    $filename=$_FILES['uploadfile']['name'];
    $filetempname=$_FILES['uploadfile']['tmp_name'];
    $folder = "images/";
    if(move_uploaded_file($filetempname,$folder) === TRUE){
      $sql = "INSERT INTO `image`(`image`)VALUES('$filename');";
        if($qry = $conn->query($sql)) {
          echo "image uploaded";
        }
      } else {
                echo "ERROR_THE_FILE_NOT_IN_FOLDER <br>";
                echo "the name of the folder is : " .$folder."<br>";
                echo "the name of the temp name  is : " .$filetempname."<br>";
                echo "the name of the filename is : " .$filename."<br>";
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
<form action="upload.php" method="post" enctype="multipart/form-data">
    Select Image File to Upload:
    <input type="file" name="file">
    <input type="submit" name="submit" value="Upload">
</form>

<?php
// Include the database configuration file
include 'includes/config.php';

// Get images from the database
$query = $db->query("SELECT * FROM images ORDER BY uploaded_on DESC");

if($query->num_rows > 0){
    while($row = $query->fetch_assoc()){
        $imageURL = 'uploads/'.$row["file_name"];
?>
    <img src="<?php echo $imageURL; ?>" alt="" />
<?php }
}else{ ?>
    <p>No image(s) found...</p>
<?php } ?>
