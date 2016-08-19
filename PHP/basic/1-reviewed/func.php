<?php
    $x = 5;
    function myTest() {
        global $x;
        echo "<p>lala la $x</p>";
    }

    myTest();

?>