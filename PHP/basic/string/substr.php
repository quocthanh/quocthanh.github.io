<?php
/**
 * substr: return a part of a string
 */
$str = 'hello cruel world!';
$str = substr($str, 3);
echo $str;

echo '<br><br>';
$str = 'hello cruel world!';
$str = substr($str, 0, -1);
echo $str;
