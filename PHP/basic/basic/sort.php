<?php
    $arr1 = [1 , 2, 7, 9];
    $arr2 = ['a', 'd', 'b', 'f'];

    $arr3 = array_combine($arr2, $arr1);
    var_dump($arr3);

    echo '<br><br>';
    $arr4 = array_combine($arr1, $arr2);
    var_dump($arr4);

    echo '<br><br>';
    $arr1 = ['x' => 1, 'ss' => 2, 7, 'a' => 9];
    $arr2 = ['a', 'd', 'b', 'f'];
    var_dump($arr1);
    echo '<br>';
    $arr3 = array_combine($arr2, $arr1);
    var_dump($arr3);

    echo '<br><br>';
    $arr3 = ['b' => 'variable', 'd' => 'function', 'a' => 'class', 'c' => 'constant'];
    var_dump($arr3);
    //$arr3 = array_combine(array_keys($arr3), sort($arr3));
    $arr_tmp1 = array_keys($arr3);
    $arr_tmp2 = sort($arr3);
	echo '<br>';
    var_dump($arr_tmp2);
    echo '<br>';
    $arr3 = array_combine($arr_tmp1, $arr3);
    var_dump($arr3);

    echo '<br><br>';
    $arr3 = ['b' => 'variable', 'd' => 'function', 'a' => 'class', 'c' => 'constant'];
    var_dump($arr3);
    echo '<br>';
    asort($arr3);
    var_dump($arr3);
