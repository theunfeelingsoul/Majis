<?php 
	
	$m = "fn jjsdv923fg : Problem wsddvsdjv";
	$array = explode(':', $m);

	echo "<pre>";
	print_r($array);
	echo "</pre>";


$expires = preg_split('/fn/', $array[0]);
array_shift($expires);
echo "<pre>";
print_r($expires);


$expires1 = preg_split('/Problem/', $array[1]);
array_shift($expires1);
echo "<pre>";
print_r($expires1);

 ?>