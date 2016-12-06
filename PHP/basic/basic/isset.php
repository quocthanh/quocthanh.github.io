<?php
/**
 * Hien review:
 * 
 * 1. Các keyword như NULL, FALSE, TRUE cần được viết thường
 * VD:
 * $x = null;
 * $x = false;
 */
	$x = '';
	$x = NULL;
	$x = 'a';
	unset($x);
	$x = array();
	$x = false;
	$x = FALSE;
	$x = NULL;
	
	if (isset($x)) {
		echo "ja ja ja";
	} else {
		echo "jo jo jo";
	}
	
	$a1 = '';
	echo "<br>";
	var_dump($a1);
	
	$a2 = NULL;
	echo "<br>";
	var_dump($a2);
?>