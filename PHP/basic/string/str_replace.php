<?php
/**
 * str_replace: replace a string in a big string with another string
 */
echo '<meta charset="UTF-8">';

$str = 'i have a girlfriend';
$str2 = str_replace('girlfriend', 'boyfriend', $str);
echo $str . '<br>';
echo $str2 . '<br>';

echo '<br><br>';
$str = 'trời đẹp la la nắng vàng';
$str2 = str_replace('la', 'mây', $str);
echo $str . '<br>';
echo $str2 . '<br>';
