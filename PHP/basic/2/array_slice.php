<?php
    $arr1 = [1, 3, 5, 7];
    var_dump($arr1);
    echo '<br>';
    $arr2 = array_slice($arr1, 1);
    var_dump($arr1);
    echo '<br>';
    var_dump($arr2);

    echo '<br><br>';
    $arr1 = [1, 3, 5, 7];
    var_dump($arr1);
    echo '<br>';
    $length = count($arr1) - 1;
    $arr2 = array_slice($arr1, 1, $length, true);
    var_dump($arr2);

    echo '<br><br>';
    $arr1 = [1, 'a' => 3, 5, 7];
    var_dump($arr1);
    echo '<br>' . count($arr1);
    echo '<br>';
    $length = count($arr1) - 1;
    $arr2 = array_slice($arr1, 1, $length, true);
    var_dump($arr2);

    echo '<br><br>';
    $arr1 = [1, 'a' => 3, 'b' => 5, 7, 9, 'ss' => 11, 13];
    var_dump($arr1);
    echo '<br>' . count($arr1);
    echo '<br>';
    $length = count($arr1) - 3;
    $arr2 = array_slice($arr1, 3, $length, true);
    var_dump($arr2);

    echo '<br><br>';
    $arr1 = ['a' => 1, 3, '090' => 5, 7, 9, 'b' => 11, 13, 15];
    var_dump($arr1);
    echo '<br>';
    $arr2 = array_slice($arr1, 0, 5, true);
    var_dump($arr2);
    echo '<br>';
    $length = count($arr1);
    $arr3 = array_slice($arr1, 5, null, true);
    var_dump($arr3);
    echo '<br>';
    $newArr = ['newKey' => 'newValue'];
    //$newArr = [3 => 'newValue'];
    $arr4 = $arr2 + $newArr + $arr3;
    print_r($arr4);























