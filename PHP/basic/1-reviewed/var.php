<?php
    $ha = 3;
    $arr = array(1, 5, 2);

    list($a, ,$c) = $arr;
    define('AAA', '5');

    $sum = AAA + $c;

?>

<?= $ha ?>
<?= $a . "<br>" . $c . AAA . "<br>" . $sum ?>