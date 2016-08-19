<?php
	echo $x . "<br>";
	for ($x = 0; $x < 10; $x++) {
		echo "the number is $x <br>";
	}
	
	echo $x . "<br>";

/**
 * Hien review:
 * 
 * 1. Còn 1 cách khác để dùng được biến $x trong function test:
 * →
 * function test() use ($x)
 * {
 *     ...
 * }
 */
	function test() {
		global $x;
		echo $x;
	}
	
	test();
?>