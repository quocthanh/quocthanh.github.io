<?php
    $a = array("Volvo", "XC90", array("BMW", "Toyota"));
    $reverse = array_reverse($a);
    $preserve = array_reverse($a,true);

    print_r($a);
    echo '<br>';
    print_r($reverse);
    echo '<br>';
    print_r($preserve);
    echo '<br>';

    echo '<br><br>';
    $arr = [1, 3, 2, 10];
    var_dump($arr);
    echo '<br>';
    $arr = array_reverse($arr);
    var_dump($arr);

    echo '<br><br>';
    $arr = [1, 3, 2, 10];
    var_dump($arr);
    echo '<br>';
    $arr = array_reverse($arr, true);
    var_dump($arr);

    echo '<br><br>';
    $arr = ['a' => 1, 'aas' => 3, 2, 7 => 10];
    var_dump($arr);
    echo '<br>';
    $arr = array_reverse($arr);
    var_dump($arr);

    echo '<br><br>';
    $arr = ['a' => 1, 'aas' => 3, 2, 7 => 10];
    var_dump($arr);
    echo '<br>';
    $arr = array_reverse($arr, true);
    var_dump($arr);
























