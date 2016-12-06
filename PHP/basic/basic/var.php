<?php
	$ha = 3;
	$arr = array(1, 5, 2);
	
	list($a, ,$c) = $arr;
	
	define('AAA', '5');
	
	$sum = AAA + $c;
?>
<!--
Hien review:
trước và sau echo shortag cần có 1 khoảng trắng, và không có dấu ;
<?= $ha ?>
-->

<?=$ha?>
<?=$a . "<br>" . $c . AAA . "<br>" . $sum?>