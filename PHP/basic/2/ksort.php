<?php
    $arr1 = [1, 5, 3, 19];
    ksort($arr1);
    var_dump($arr1);

    echo '<br><br>';
    $arr2 = [2 => 3, 0 => 76, 10 => 2];
    var_dump($arr2);
    ksort($arr2);
    echo '<br>';
    var_dump($arr2);

    echo '<br><br>';
    $arr3 = ['b' => 'variable', 'd' => 'function', 'a' => 'class', 'c' => 'constant'];
    var_dump($arr3);
    ksort($arr3);
    echo '<br>';
    var_dump($arr3);
