<?php
$arr = ["foo" => "bar", 5, "rr" => "ddd", 89, "2" => "34", 56, "04" => 56, "it 's fun", 8.7 => "haha", true => "changed value", NULL => 56789];

var_dump($arr);
echo "<br>" . $arr[0];
echo "<br>" . $arr[1];
echo "<br>" . $arr[2];
echo "<br>" . $arr[3];
echo "<br>" . $arr[4];
echo "<br>" . $arr[5];
echo "<br>" . $arr['foo'];
echo "<br>" . $arr['2'];
echo "<br>" . $arr[6];
echo "<br>" . $arr[8];

$arr2 = 56;
echo "<br>" . $arr2;

$arr2 = $arr;
echo "<br>" . $arr2;
echo "<br>";
var_dump($arr2);
echo "<br>" . $arr2[3];
echo "<br>" . $arr2{3};

?>
