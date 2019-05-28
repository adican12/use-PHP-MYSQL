<?php
include('includes/config.php');

$row = 1;
if (($handle = fopen("user.csv", "r")) !== FALSE) {
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
        $num = count($data);
        echo "<p> $num fields in line $row: <br /></p>\n";
        $row++;
        // for ($c=0; $c < $num; $c++) {
        //      echo $data[$c] . "<br />\n";
        //  }
        echo " befor:"."<br>";
        #LEST TRY THIS
        $id = $data[0];
        $name = $data[1];
        $email = $data[2];
        $password = $data[3];
        $gender = $data[4];
        $mobile = $data[5];
        $user_type = $data[6];
        $image = $data[7];
        $birthday = $data[8];
        $status = intval($data[9]);
        $user_category = $data[10];

        // $at = floatval ($data[1]);
        // $bus_long = floatval ($data[2]);

        echo $id."<br>";
        echo $name."<br>";
        echo $email."<br>";
        echo $password."<br>";
        echo $gender."<br>";
        echo $mobile."<br>";
        echo $user_type."<br>";
        echo $image."<br>";
        echo $birthday."<br>";
        echo $status."<br>";
        echo $user_category."<br>";
        // echo " after : <br>";
        $sql = "INSERT INTO `users`(`name`, `email`, `password`, `gender`, `mobile`, `image`,`user_type`,`status`,`user_category`,`birthday`)
        VALUES ('$name', '$email', '$password','$gender','$mobile','$image','$user_type','$status','$user_category','$birthday')";
        //  // echo "after the sql querys"."<br>";
         if($conn->query($sql) === TURE) {
           echo "<script type='text/javascript'>alert('INSERT INTO feedback Sucessfull!');</script>";
        } else {
             user_error("Query failed: ".$conn->error."<br />$sql");
             echo "false"."<br>";
        }
        // echo $data[1]."<br>";
        // echo $data[2]."<br>";
        // echo $data[3]."<br>";
        // echo $data[4]."<br>";

    }

  fclose($handle);
}

?>
