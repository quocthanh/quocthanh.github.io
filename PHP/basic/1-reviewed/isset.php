<?php
    $x = '';
    $x = null;
    $x = 'a';
    unset($x);
    $x = array();
    $x = false;
    $x = false;
    $x = null;

    if (isset($x)) {
        echo "ja ja ja";
    } else {
        echo "jo jo jo";
    }

    $a1 = '';
    echo "<br>";
    var_dump($a1);

    $a2 = NULL;
    echo "<br>";
    var_dump($a2);

?>