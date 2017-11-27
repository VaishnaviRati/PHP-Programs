<?php

$age = array("Vaishnavi"=>"21", "Gayathri"=>"22", "Preeti"=>"23","Poonam"=>"22");

echo "foreach function display in table";
echo "<table border=2px>";
echo "<tr>";
echo "<td>","Name","</td>";
echo "<td>","Age","</td>";
echo "</tr>";
foreach($age as $x => $x_value) {
   
	echo "<tr>";
    echo "<td>" . $x ."</td>";
    echo "<td>". $x_value."</td>";
    echo "<br>";
    echo "</tr>";
}
echo "</table>";




	echo "<h4>", "Array Slice","</h4>";
    print_r(array_slice($age,2));
    echo "<br>";

echo "<h4>","To count the Repeated word","</h4>";
   $str = 'happy beautiful happy lines pear gin happy lines rock happy lines pear ';
$words = array_count_values(str_word_count($str, 1));
echo "<pre>";
print_r($words);
echo "<br>";
echo "<br>";

echo "-------------------------------------------","<br>";
print_r($age);
echo "<h4>","To Sort the array in Assending Order : ","</h4>";
asort($age);

foreach($age as $x => $x_value) {
    echo "Key=" . $x . ", Value=" . $x_value;
    echo "<br>";
}

echo "<h4>","To Sort the array in Decending Order : ","</h4>";
rsort($age);
foreach($age as $x => $x_value) {
    echo "Key=" . $x . ", Value=" . $x_value;
    echo "<br>";
}

?>




 