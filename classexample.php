<?php

//define also for constant decleration
define('s', 10);
class welcomeclass
{

const a=10;
function __construct()
{
	echo "Constructor get called","<br>";
	echo self::a;
}
}

class b extends welcomeclass
{

function __construct()
{
	echo "Constructor 2 get called","<br>";
	parent::__construct();
	echo "<br>";
	//for onstent no need to write a $ symbol
	echo s;
}


}

$wc = new welcomeclass();
echo "<br>";
$b = new b();

echo "access<br>";

//echo $wc::a; or 
echo welcomeclass::a;
