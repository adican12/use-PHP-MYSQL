
<?php
/*--------------------includes--------------*/


include("includes/config.php");

    // $storage = new StorageClient();
    // $storage->registerStreamWrapper();
    // $target_dir = "gs://catifi1/newimages/";
    // $target_file = $target_dir . basename($_FILES["image"]["name"]);
    // $uploadOk = 1;
    // $name=$_FILES["image"]["name"];
    // //$tempFile = fopen($target_dir, "w") or die("Error: Unable to open file.");
    // $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    //$ex = explode('.',$target_file);
    //print_r($ex);
    // Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["image"]["tmp_name"]);
        if($check !== false) {
            echo "File is an image - " . $check["mime"] . ".<br>".$name."<br>";
            $uploadOk = 1;
        } else {
            echo "File is not an image.<br>";
            $uploadOk = 0;
        }
    }
    // Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.<br>";
        $uploadOk = 0;
    }
    // Check file size
    if ($_FILES["image"]["size"] > 500000) {
        echo "Sorry, your file is too large.<br>";
        $uploadOk = 0;
    }
    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.<br>";
        $uploadOk = 0;
    }
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.<br>";
    // if everything is ok, try to upload file
    } else {
      $imagetmp=addslashes (file_get_contents($_FILES['image']['tmp_name']));
        } else {
            echo "Sorry, there was an error uploading your file.<br>";
        }
    }
?>

<!DOCTYPE html>
<html>
<body>

<form action="" method="post" enctype="multipart/form-data">
  <br>
    Select image to upload:
    <input type="file" name="image">
    <input type="submit" value="Upload" name="submit">
</form>

</body>
</html>
