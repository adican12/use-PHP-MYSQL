<!DOCTYPE html>
<html>
<header>
</header>
<body>

  <?php
  $default_bucket = CloudStorageTools::getDefaultGoogleStorageBucketName();
  file_put_contents("gs://catifi1/hello_default.txt", $newFileContent);
  ?>
<h1>bucket</h1>
</body>
</html>
