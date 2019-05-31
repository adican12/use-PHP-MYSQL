
<?php
include('includes/config.php');
if(isset($_POST['submit'])) {
	$filename=$_FILES['uploadfile']['name'];
	    $filetempname=$_FILES['uploadfile']['tmp_name'];
	    $folder = 'images/';
	    move_uploaded_file($filetempname,$folder.$filename);
	  $sql = "INSERT INTO `image`(`image`)VALUES('$filename');";
	  if($qry = $conn->query($sql)) {
	    echo "image uploaded";
	  }
	}
	$sql = "SELECT * FROM image WHERE image_id =";
	if($res = $conn->query($sql)) {
	  echo '<script>alert("ok the query is working work")</script>';
	}
	while($row =  mysqli_fetch_assoc($res)) {
	  echo '<img height = 150px width=100px src="'.$row['image'].'">';
	}
$conn->close();
?>

<!DOCTYPE html>
<html>
<body>

<form method="post" enctype="multipart/form-data">
  <br>
    Select image to upload:
    <input type="file" name="uploadfile" id="uploadfile">
    <input type="submit" value="Insert" name="insert" id="insert">
</form>
<br>
<br>
<table>
  <tr>
    <th>Image</th>
  </tr>
  <?php
  include('includes/config.php');
  $query = "SELECT * FROM image ORDER BY image_id DESC";
  if($res = $conn->query($query)) {
    echo '<script>alert("we print the image")</script>';
  }
  while($row = mysqli_fetch_assoc($res)) {
    echo '<tr>
              <td>'
              echo '<img height = 150px width=100px src="'.$row['image'].'">;
              </td>
          </tr>';
  }
  ?>
</table>
</body>
</html>

<script>
  $(document).ready(function(){
    $('#insert').click(function(){
      var image_name = $('#image').val();
      if(image_name == ''){
        alert("Please Select Image");
        return false;
      }else {
        var extension = $('#image').val().split('.').pop().toLowerCase();
        if(jQuery.inArray(extension),['gif','png','jpg','jpeg'] == -1){
          alert('Invaild image file');
          $('#image').val('');
          return false;
        }
      }
    });
  });
</script>
