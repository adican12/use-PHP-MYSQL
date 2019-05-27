<?php
include('includes/config.php');
$row = 1;
if (($handle = fopen("business.csv", "r")) !== FALSE) {
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
        $num = count($data);
        echo "<p> $num fields in line $row: <br /></p>\n";
        $row++;
        for ($c=0; $c < $num; $c++) {
            $catgory =explode(","$data);
            echo $catgory[$c] . "<br />\n";
            echo $data[$c] . "<br />\n";
        }
    }
    fclose($handle);
}
?>
