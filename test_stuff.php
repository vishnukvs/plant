<?php
 
//PHP Example code to add one day,one month or one year to todays date
 
$todayDate = date("2012-02-29");// current date
echo "Today: ".$todayDate."<br>";

$lastDate = date("2012-10-30");
 

$interval = array(
    1 => '1 month',
    2 => '2 months',
    3 => '3 months',
    4 => '4 months',
    
    5 => '5 months',
    6 => '6 months',
    7 => '7 months',
    8 => '8 months',

    9 => '9 months',
    10 => '10 months',
    11 => '11 months',
    12 => '12 months',

    );
echo '<pre>';
print_r($interval);
echo '</pre>';

//Add one month to today
$dateOneMonthAdded = strtotime(date("Y-m-d", strtotime($todayDate)) . $interval[11]);

echo "After adding " . $interval[11] ." = " . date('Y-m-d', $dateOneMonthAdded)."<br>";


$dateOneMonthAdded = strtotime(date("Y-m-d", strtotime($todayDate)) . $interval[12]);

echo "After adding " . $interval[12] ." = " . date('Y-m-d', $dateOneMonthAdded)."<br>";





?>

