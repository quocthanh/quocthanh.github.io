<?php
/**
 * http_build_query: create a query string from array or object
 */
$arr1 = ['a' => 'b', 'ahihi' => 'do ngok', 'hhh' => null, '""' => "''"];
$url = http_build_query($arr1);
echo $url;

echo '<br><br>';
$arr1 = [1, 22, 3, -5];
$url = http_build_query($arr1);
echo $url;

//set numeric prefix
echo '<br><br>';
$arr1 = [1, 22, 'hotel' => 'beauty', 3, -5];
$url = http_build_query($arr1, 'qt_');
echo $url;

//multimensional array
echo '<br><br>';
$arr1 = [1, [2, 2], 'hotel' => 'beauty', [3, ['s', 77]], -5];
$url = http_build_query($arr1, 'qt_');
echo $url;
