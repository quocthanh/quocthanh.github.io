<?php
/**
 * md5: calcultes md5 hash of a string
 */
$x = 23;
echo md5($x);

echo '<br><br>';
$x = '23';
echo md5($x);

//32 character hex number
echo '<br><br>';
$x = 'aaa';
echo md5($x);

//raw 16 charater
echo '<br><br>';
$x = 'aaa';
echo md5($x, true);
