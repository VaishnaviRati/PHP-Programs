<html>
<body>


<form method="POST">
<input type="text" name="year">


<input type="submit" name="submit">

<?php



$year=$_POST['year'];
function getDays($year){


    $num_of_days = array();
    $total_month = 12;
    if($year == date('Y'))
        $total_month = date('m');
    else
        $total_month = 12;

    for($m=1; $m<=$total_month; $m++){
        $num_of_days[$m] = cal_days_in_month(CAL_GREGORIAN, $m, $year);
    }

    return $num_of_days;
}
$num_of_days = getDays($year);
print_r($num_of_days);



?>

</body>
</html>
