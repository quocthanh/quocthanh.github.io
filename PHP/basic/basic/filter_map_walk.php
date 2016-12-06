<?php
$arr1 = ['runsystem', 1, '0', 0, 0.0, false, null, array()];
$arr2 = array_filter($arr1);
var_dump($arr2);


echo '<br><br>';
function test1($va)
{
    return $va*10;
}

$arr1 = [1, 4, 9];
$arr2 = array_filter($arr1, "test1");
var_dump($arr2);

echo '<br><br>';
$arr1 = [1, 4, 9];
$arr2 = array_map("test1", $arr1);
var_dump($arr2);

function show($value, $key)
{
    echo "aaa $value bbb $key" . '<br>';
}

echo '<br><br>';
$arr1 = [1, 'n' => 4, 9];
array_walk($arr1, "show");
