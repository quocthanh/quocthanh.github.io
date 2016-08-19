<?php
    $arr1 = ['a' => 'apple', 1 => 'one'];
    $arr2 = ['1' => 'one string', 'a' => 'address'];

    $arr3 = array_merge($arr1, $arr2);
    var_dump($arr3);

    echo '<br><br>';
    $arr3 = $arr1 + $arr2;
    var_dump($arr3);

    echo '<br><br>';
    $arr1 = [1, 2, 3];
    $arr2 = [4, 5];
    $arr3 = $arr1 + $arr2;
    var_dump($arr3);

    echo '<br><br>';
    $x = array("a" => "red", "b" => "green");
    $y = array("c" => "blue", "d" => "yellow");

    var_dump($x + $y);

    echo '<br><br>';
    $arr1 = [1, 2, 3];
    $arr2 = ['a' => 4, 'b' => 5];
    $arr3 = $arr1 + $arr2;
    var_dump($arr3);

    echo '<br><br>';
    $arr1 = [1, 2, 3];
    $arr2 = [1 => 4, 10 => 5];
    $arr3 = $arr1 + $arr2;
    var_dump($arr3);

    echo '<br><br>';
    $x = array("a" => "red", "b" => "green");
    $y = array("a" => "blue", "d" => "yellow");

    var_dump($x + $y);
