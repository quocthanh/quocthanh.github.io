<?php
    $x = array("a" => "red", "b" => "green");
    $y = array("c" => "blue", "d" => "yellow");

    echo $x . "<br>";
    var_dump($x);
    echo "<br>";
    print_r($x);
    echo "<br>";
    var_dump($x + $y);
    echo "<br><br><br>";

    $a = array(1, 2, 3);
    $b = array(1, 2, "3");
    var_dump($a == $b);
    echo "<br>";
    var_dump($a === $b);
    echo "<br>";
    var_dump($a != $b);
    echo "<br>";
    var_dump($a !== $b);
    echo "<br>";

?>
