<?php
include('includes/config.php');

  $file = file('business.csv');
    foreach($file as $word) {
        $csv[]=explode(',',$word);
    }
    print_r($csv);
}
close($file);
?>
