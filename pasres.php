
<?php
include('includes/config.php');
 echo " befor if";
// if(isset($_POST['submit'])) {
  if(getimagesize($_FILES['imagefile']['tmp_name']) == false){
      echo "<br/> Please Select An Image,";
  } else {
              //  declare variables
        $image = $_FILES['imagefile']['tmp_name'];
        $name = $_FILES['imagefile']['name'];
        $image = base64_decode(file_get_contents(addslashes($image)));
              //sql query
        $sql = "INSERT INTO `ad`(`text`,`price`,`header`,`id`,`image`) VALUES ('TEST',1000,'TEST1',1,'$image')";
        if($image == ''){
          echo " its not good ematy image";
        if($conn->query($sql)) {
          echo "  Image uploaded Successfully <br>";
       }else {
         echo " <br/> Image Failed to uploaded";
       }
}
 }
//
// } else {
//   # code..
// }
// // retrieve image form database and display it on html webpage
//
   $sql = "SELECT * FROM ad WHERE adID =4;";
  if($res=$conn->query($sql)){
     while($row = mysqli_fetch_assoc($res)){
       echo "the text is : ".$row['text']."<br> ";
       echo "the price is : ".$row['price']."<br> ";
       echo "the header is : ".$row['header']."<br> ";
       echo "the id is : ".$row['id']."<br> ";
       echo '<img height = "250px" width="250px;" src='.$row['image']."<br> ";
     }

   }
?>

<!DOCTYPE html>
<html>
<head>
    <title>TRY TO UPLOAD A IMAGE</title>
</head>
<body>
  <form action="" method="post" enctype="multipart/form-data">
    <input type="file" name="imagefile">
    <br />
    <input type="submit" name="submit" value="upload">
  </form>
</body>
</html>
