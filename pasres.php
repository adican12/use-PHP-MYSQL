<?php
include('includes/config.php');

$row = 1;
if (($handle = fopen("business.csv", "r")) !== FALSE) {
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
        $num = count($data);
        echo "<p> $num fields in line $row: <br /></p>\n";
        $row++;
        // for ($c=0; $c < $num; $c++) {

            // $catgory =explode(","$data);
          // echo $catgory[$c] . "<br />\n";
            // echo $data[$c] . "<br />\n";

        // }
        echo " befor:"."<br>";
        $catgory = $data[3];
        $copunID = intval($data[4]);
        $bus_name = $data[0];
        $bus_lat = floatval ($data[1]);
        $bus_long = floatval ($data[2]);
        echo $catgory."<br>";
        echo $copunID."<br>";
        echo $bus_name."<br>";
        echo $bus_lat."<br>";
        echo $bus_long."<br>";
        echo " after : <br>";
        $sql = "INSERT INTO `business` ( `category`, `couponID`, `business_name`, `bus_latitude`,`bus_longitude`)
         VALUES ('$catgory','$copunID', '$bus_name','$bus_lat', '$bus_long');";
         // echo "after the sql querys"."<br>";
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
