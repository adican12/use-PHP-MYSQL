<?php
  // Create database connection
  include('includes/config.php');
$counter = 0;

  // Initialize message variable
  $msg = "";

  // If upload button is clicked ...
  if (isset($_POST['upload'])) {
  	// Get image name
  	$image = $_FILES['image']['name'];

  	// Get text
  	$image_text = mysqli_real_escape_string($conn, $_POST['image_text']);

  	// image file directory
  	$target = "images/".basename($image);

  	$sql = "INSERT INTO images (image, image_test) VALUES ('$image', '$image_text')";
  	// execute query
  	if($conn->query($sql) == false) {
      echo "The number of attempts is :".$counter."<br>";
      echo "____________ERROR_______QUERY______NOT__________GOOD <br>";
    } else {


  	if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
        echo "we here! in the if <br>";
  		$msg = "Image uploaded successfully";
  	}else{
  		$msg = "Failed to upload image";
  	}
  }
  }
  $result = mysqli_query($conn, "SELECT * FROM images");

?>
<!DOCTYPE html>
<html>
<head>
<title>Image Upload</title>
<style type="text/css">
   #content{
   	width: 50%;
   	margin: 20px auto;
   	border: 1px solid #cbcbcb;
   }
   form{
   	width: 50%;
   	margin: 20px auto;
   }
   form div{
   	margin-top: 5px;
   }
   #img_div{
   	width: 80%;
   	padding: 5px;
   	margin: 15px auto;
   	border: 1px solid #cbcbcb;
   }
   #img_div:after{
   	content: "";
   	display: block;
   	clear: both;
   }
   img{
   	float: left;
   	margin: 5px;
   	width: 300px;
   	height: 140px;
   }
</style>
</head>
<body>
<div id="content">
  <?php
    while ($row = mysqli_fetch_array($result)) {
      echo "<div id='img_div'>";
      echo $row['image'];
      	echo "<img src='http://35.242.176.108/images/".$row['image']."' >";
      	echo "<p>".$row['image_test']."</p>";
      echo "</div>";
    }
  ?>
  <form method="POST" action="" enctype="multipart/form-data">
  	<input type="hidden" name="size" value="1000000">
  	<div>
  	  <input type="file" name="image" accept=".jpg,.png,.gif" required>
  	</div>
  	<div>
      <textarea
      	id="text"
      	cols="40"
      	rows="4"
      	name="image_text"
      	placeholder="Say something about this image..."></textarea>
  	</div>
  	<div>
  		<button type="submit" name="upload">Upload</button>
  	</div>
  </form>
</div>
</body>
</html>
