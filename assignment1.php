<html>
<body>

<form action="" method="POST">

Enter the Year: <input type="text" name="year" placeholder="eg:2010"><br>

<input type="submit" name="submit"><br>

<?php  
    if($_POST)
    {    
        //get the year
        $year = $_POST['year'];
        //check if entered value is a number

        function days($year)
        {
        	$m=1;
        	$count1=0;
        	$count2=0;

        	while ($m!=13)
        	 {
        	 $days= cal_days_in_month(CAL_GREGORIAN, $m, $year);
                $no_of_days+=$days;
        	$no_of_week=($no_of_days)/7;
        	 if ($days==30) 
        	 {
        	 	$count1++;
        	 	
        	 }
        	else if ($days==31)
        	 {
        		$count2++;
        		
             }
            $m++;
        	}
        	echo "Ther are ".$count1." month has 30 days","<br>";
        	 echo "Ther are ".$count2." month has 31 days","<br>";
             echo "The number of days=".$no_of_days."<br>";
             echo "The number of weeks=".$no_of_week."<br>"; 
        }
        if(!is_numeric($year))
        { 
            echo "Strings not allowed, Input should be a number.","<br>";
            return;
        }  
        //multiple conditions to check the leap year
        if( (0 == $year % 4) and (0 != $year % 100) or (0 == $year % 400) )
        { 
            echo "$year is a Leap Year","<br>";

             days($year);

        }


        else
        { 
            echo "$year is not a Leap Year","<br>";

              days($year);

        } 
    }  





?>


</form>


</body>
</html>






