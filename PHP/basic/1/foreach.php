<?php
	$arr1 = [1, 2, 3, 4];
	
	echo "<br>" . $GLOBALS['value'] . "<br>";
	var_dump($GLOBALS);
	
	foreach ($arr1 as $val) {
		$val *= 2;
	}
	
	echo "<br>" . $GLOBALS['value'] . "<br>";
	var_dump($GLOBALS);
	
	echo "<br>" . isset($value) . "<br>";
	var_dump($value);
	echo "<br>" . $value . "<br>";
	
	
	
	echo "<br>" . $GLOBALS['val'] . "<br>";
	var_dump($GLOBALS);
	
	echo "<br>" . isset($val) . "<br>";
	var_dump($val);
	echo "<br>" . $val . "<br>";
	
	function scopeValue() {
		$arr2 = [1, 3, 5, 7];
		
		foreach ($arr2 as $xyz) {
			$xyz *= 2;
		}
		
		var_dump($xyz);
		echo "<br>" . $xyz . "<br>";
	}
	
	scopeValue();
	
	echo "<br>" . $xyz . "<br>";
	
	reset($arr1);
	while(list(, $ha) = each($arr1)) {
		echo "<br>" . "Value: $ha" . "<br>";
		var_dump($ha);
	}
	echo "<br>" . "Value: $ha" . "<br>";
	var_dump($ha);	
?>



























