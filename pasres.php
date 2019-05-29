
<?php
namespace Google\Cloud\Storage;
  use Google\Cloud\Core\ArrayTrait;
  use Google\Cloud\Core\Exception\GoogleException;
  use Google\Cloud\Core\Exception\NotFoundException;
  use Google\Cloud\Core\Exception\ServiceException;
  use Google\Cloud\Core\Iam\Iam;
  use Google\Cloud\Core\Iterator\ItemIterator;
  use Google\Cloud\Core\Iterator\PageIterator;
  use Google\Cloud\Core\Timestamp;
  use Google\Cloud\Core\Upload\ResumableUploader;
  use Google\Cloud\Core\Upload\StreamableUploader;
  use Google\Cloud\PubSub\Topic;
  use Google\Cloud\Storage\Connection\ConnectionInterface;
  use Google\Cloud\Storage\Connection\IamBucket;
  use Google\Cloud\Storage\SigningHelper;
  use GuzzleHttp\Psr7;
  use Psr\Http\Message\StreamInterface;

  include("php/config.php");
  if(isset($_FILES['file'])) {
    $file = $_FILES['file'];

    // File Details

    //name of file
    $name = $file['name'];

    //tmp_name
    $tmp_name =$file['tmp_name'];
    $extension = explode('.',$name);
    print_r($extension);
    $tmp_file_name = "{$extension}";

    try {

    } catch(Exception $e) {
      die("There was an error uploading that file.");
    }
  }
?>

<!DOCTYPE html>
<html>
<body>

<form action="" method="post" enctype="multipart/form-data">
    Select image to upload:
    <input type="file" name="file">
    <input type="submit" value="Upload" name="submit">
</form>

</body>
</html>
