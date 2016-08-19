<?php
	$array = array(1, 34, -9);
	
	list($a, $b, $c) = $array;
	
	echo "hahaha it's fun ju\nst like it $a $b $c" . PHP_EOL;
	echo PHP_EOL . 'hahaha it\'s fun just like it $a $b $c';
	
	echo next($array);
	//next($array);
?>