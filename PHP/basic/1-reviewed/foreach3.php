<?php
    $arr1 = [[1, 9, 2], [3, 4]];

    echo "<br>" . $arr1[0] . "<br>" . $arr1[0][1] . "<br>";

    foreach ($arr1 as list($a, $b)) {
        echo "<br>" . "A: $a, B: $b" . "<br>";
    }

    $arr2 = [1, 2, 5];
    foreach ($arr2 as $value):
        echo "<br>" . $value . "<br>";
    endforeach;

?>