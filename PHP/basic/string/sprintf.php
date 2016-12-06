<?php
/**
 * sprintf: write a formatted string to a variable
 */
echo '<meta charset="UTF-8">';

$num = 98;
$str = 'ha ha ha';

$txt = sprintf('Có %u con khỉ đang cười %s', $num, $str);
echo $txt;

echo '<br><br>';
$txt = sprintf('Có %u con khỉ đang cười %s', $num);
echo $txt;

echo '<br><br>';
$txt = sprintf('Có % con khỉ đang cười %', $num, $str);
echo $txt;

//use only one argument
echo '<br><br>';
$num = 3.1435;
$txt = sprintf("what what %1\$f what  who who %1\$f", $num);
echo $txt;

//specify number of digit
echo '<br><br>';
$num = 34.54589;
$txt = sprintf("With 2 decimals: %1\$.2f
<br>With no decimals: %1\$u",$num);
echo $txt;
