<?php
$var = 1;

try {
    $var->method();
} catch (Error $e) {
    echo $e->getMessage();
} finally {
    echo '<br> lalala con gà';
}

echo '<br> lalala cái ca<br>';

function add(int $a, int $b)
{
    return $a + $b;
}

$value = add(6, 8);
echo $value . '<br>';

try {
    $value = add('abc', 'fifo');
} catch (TypeError $e) {
    echo $e->getMessage() . '<br>';
    echo $e->getCode() . '<br>';
}

echo '<br>that \'s ok<br>';

try {
    $value = 1 << -1;
} catch (ArithmeticError $e) {
    echo $e->getMessage() . '<br>';
    echo $e->getCode() . '<br>';
}
