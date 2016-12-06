<?php
$arr1 = [3, 1, 7, 2];
var_dump($arr1);
echo '<br>';
array_shift($arr1);
var_dump($arr1);

echo '<br><br>';
$arr2 = ['a' => 'b', 'c' => 'd'];
var_dump($arr2);
echo '<br>';
array_shift($arr2);
var_dump($arr2);

echo '<br><br>';
$arr2 = [3 => 3, 1 => 1, 0 => 7, 8 => 2];
var_dump($arr2);
echo '<br>';
array_shift($arr2);
var_dump($arr2);

echo '<br><br>';
$arr2 = [3 => 3, 1 => 1, 'a' => 'b', 0 => 7, 8 => 2];
var_dump($arr2);
echo '<br>';
array_shift($arr2);
var_dump($arr2);
