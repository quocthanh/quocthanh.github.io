<?php
/**
 * get the input, convert it to array
 * then calculate sum and product
 * send back to client
 */
if (empty($_GET['input'])) {
    echo 'Nothing received!!!';
    exit;
}
$input = $_GET['input'];

$input = json_decode($input);

if ($input) {
    $result = array(array_sum($input), array_product($input));

    $result = json_encode($result);

    echo $result;
}
