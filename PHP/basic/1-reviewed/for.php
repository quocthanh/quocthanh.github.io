<?php
    echo $x . "<br>";
    for ($x = 0; $x < 10; $x++) {
        echo "the number is $x <br>";
    }

    echo $x . "<br>";

    function test() {
        global $x;
        echo $x;
    }
    test();

?>