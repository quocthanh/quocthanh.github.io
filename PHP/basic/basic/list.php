<?php
    error_reporting(0);
    $arr = [1, 2, 10, 4];
    list($a, $b, $c, $d) = $arr;
    echo $a . ' ' . $b . ' ' . $c . ' ' . $d;

    echo '<br><br>';
    $arr = ['a' => 1, 'aaa' => 2, 'sa' => 10, 'hihi' => 4];
    list($a, $b, $c, $d) = $arr;
    echo $a . ' ' . $b . ' ' . $c . ' ' . $d;
