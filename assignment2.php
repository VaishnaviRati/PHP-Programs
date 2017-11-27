<html>
<body>

<form action=" " method="POST">
Enter the Start date:<input type="date" name="sdate" placeholder="dd/mm/yyyy">
Enter the end date:<input type="date" name="edate" placeholder="dd/mm/yyyy"><br>
<input type="submit"  name="submit"><br>


<?php
if ($_POST) {

  $from = $_POST['sdate'];
  $to = $_POST['edate'];

$date1 = new DateTime($from);
$date2 = new DateTime($to);
$diff = $date1->diff($date2);

$date1->modify('first day of this month');
$firstday= $date1->format('Y-m-d');





$date = strtotime($from); // July 02, 2014
$month = date('m',$date);
$year = date('Y',$date);
$days_in_month = date('t',$date);


$first_day_of_month = date('w', mktime(0,0,0,$month,1,$year)); // sunday = 0, saturday = 6


//switch case to get the month
switch ($month) {
    case 1: $month= "Janavary"; break;
    
    case 2: $monrth= "February "; break;

    case 3: $month= "March";break;

    case 4: $month= "April";break;

    case 5:$month= "May";break;

    case 6:$month= "June";break;

    case 7: $month= "July";break;   

    case 8:$month= "August";  break;

    case 9:$month= "September";break;

    case 10:$month= "October"; break;   

    case 11: $month= "November"; break;  

    default: $month= "December"; break;
}


   
//swich case to get the day

switch ($first_day_of_month)     {
       case '0':
       echo "first day of month ".$month." is Sunday.","<br>";
        break;
         case '1':
       echo "first day of month ".$month." is Monday.","<br>";
        break;

         case '2':
       echo "first day of  month ".$month." is Tuesday.","<br>";
        break;

         case '3':
       echo "first day of  month ".$month." is Wednesday.","<br>";
        break;

         case '4':
       echo "first day of  month ".$month." is Thursday.","<br>";
        break;

         case '5':
       echo "first day of  month ".$month." is Friday.","<br>";
        break;
    
    default:
         echo "first day of  month ".$month." is Saturday.","<br>";
        break;
}

echo "first date of month ".$month." is ".$firstday.".","<br>";

//echo "first day of this month is ".$first_day_of_month.".","<br>";


//getmonth();

echo "The Diffrence is " . $diff->y . " years, " . $diff->m." months, ".$diff->d." days "," between ".$from." and ".$to.".","<br>";
for ($month=1; $month <= $diff->m; $month++) { 
   //getmonth();
   echo "first day of  month ".$month." is ".$first_day_of_month."<br>";
  
}
}
?>
</body>
</html>

