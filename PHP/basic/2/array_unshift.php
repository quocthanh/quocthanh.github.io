<?php
    $arr1 = [1, 5, 9, 0];
    var_dump($arr1);
    echo '<br>';
    array_unshift($arr1, 10);
    var_dump($arr1);

    echo '<br><br>';
    $arr1 = [1, 3 => 5, 5 => 9, 0];
    var_dump($arr1);
    echo '<br>';
    array_unshift($arr1, 10);
    var_dump($arr1);
