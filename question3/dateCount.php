<?php 

$test = calculateDay('2022-07-07','2022-07-19');
echo $test[0] . ' ' . $test[1];
 function calculateDay($date1, $date2){
    $firstDate = new DateTime($date1);
    $secondDate = new DateTime($date2);

    $difference = $firstDate->diff($secondDate);
    $differenceDay = $difference->days;

    $dayType = ($differenceDay % 2 == 0) ? 'even' : 'odd';

    return [$differenceDay, $dayType];
 }

?>