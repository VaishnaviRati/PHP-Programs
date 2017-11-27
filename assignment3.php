<?php

$array1=array("Mango","Bannana","Orange","Chikku","Watermellon","Apple");
$array2=array("Bannana","Orange","Chikku","Apple","Kiwi");

echo "Array 1 = ";
print_r($array1);
echo "<br>";

echo "Array 2 = ";
print_r($array2);
echo "<br>";
echo "<br>";

echo "Intersection of two array is = ";
$result=array_intersect($array1, $array2);
print_r($result);
echo "<br>";
echo "<br>";


echo "Diffrence of two array is = ";
$result1=array_diff($array1, $array2);
print_r($result1);
echo "<br>";
echo "<br>";

echo "The Unio of two array is = ";
$union = array_merge(array_intersect($array1, $array2),
	array_diff($array1, $array2),array_diff($array2, $array1));
print_r($union);
echo "<br>";
echo "<br>";

echo "Two-Dimentional Array","<br>";

$Employee = array
  (
  array("Vaishnavi","CC126",21),
  array("Poonam","CC127",22),
  array("Gayathri","CC128",23),
  array("Preeti","CC129",22)
  );
  
echo "Employee Name: ".$Employee[0][0]." , Employee ID: ".$Employee[0][1]." , Age: ".$Employee[0][2].".<br>";
echo "Employee Name: ".$Employee[1][0]." , Employee ID: ".$Employee[1][1]." , Age: ".$Employee[1][2].".<br>";
echo "Employee Name: ".$Employee[2][0]." , Employee ID: ".$Employee[2][1]." , Age: ".$Employee[2][2].".<br>";
echo "Employee Name: ".$Employee[3][0]." , Employee ID: ".$Employee[3][1]." , Age: ".$Employee[3][2].".<br>";

echo "<br>";
echo "<br>";

    echo "Another Method of 2-D is = ","<br>";
for ($row = 0; $row < 4; $row++) {
  echo "<p><b>Row number $row</b></p>";
  echo "<ul>";
  for ($col = 0; $col < 3; $col++) {
    echo "<li>".$Employee[$row][$col]."</li>";
  }
  echo "</ul>";
}

echo "<br>";

$str = "Hello Vaishnavi. Have a beautiful day.";
echo "Explode the String : ".$str."<br>";

print_r (explode(" ",$str));
echo "<br>";
echo "<br>";

$arr = array('Hello','vaishnavi.','Have a','Beautiful','Day!');
echo "Implode the String : ";
print_r($arr);
echo "<br>";	
print_r(implode(" ",$arr));
 echo "<br>";
   echo "<br>";

echo "The String is :".$x="Wellcome to Compassites","<br>";
echo "Reverse of String = ";
   echo strrev($x);
   echo "<br>";
   echo "<br>";
   
    echo "The sub string is :";
    echo substr($x, 11);
    echo "<br>";
    echo "<br>";

    echo "In the above String Compassites is repalce with Company","<br>";
    echo str_replace("Compassites","Company","Wellcome to Compassites");
?>








