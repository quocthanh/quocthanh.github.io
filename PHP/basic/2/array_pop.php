<?php
    $arr1 = [1, 3, 5, 7];
    var_dump($arr1);
    echo '<br>';
    array_pop($arr1);
    var_dump($arr1);

    echo '<br><br>';
    $arr1 = [2 => 1, 3, 5, 0 => 7];
    var_dump($arr1);
    echo '<br>';
    array_pop($arr1);
    var_dump($arr1);

    echo '<br><br>';
    $arr1 = [1, 3, 5, 7];
    var_dump($arr1);
    echo '<br>';
    array_push($arr1, 9);
    var_dump($arr1);

    echo '<br><br>';
    $arr1 = [2 => 1, 3, 5, 0 => 7];
    var_dump($arr1);
    echo '<br>';
    array_push($arr1, 9);
    var_dump($arr1);
