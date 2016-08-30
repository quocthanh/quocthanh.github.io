<?php
/**
 * get the input, convert it to array
 * then calculate sum and product
 * send back to client
 */
//check whether request method is AJAX
if (strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) !== 'xmlhttprequest') {
    throw new LogicException('Not AJAX Request!!!');
}
//check request method
if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
    throw new LogicException('Not GET Request!!!');
}

if (empty($_GET['input'])) {
    echo 'Nothing received!!!';
    exit;
}
$input = $_GET['input'];

$input = json_decode($input);
if (json_last_error() !== JSON_ERROR_NONE) {
    throw new LogicException('JSON error: ' . json_last_error_msg());
}

$response = array(
    'sum' => array_sum($input),
    'product' => array_product($input)
);

$response = json_encode($response);
if (json_last_error() !== JSON_ERROR_NONE) {
    throw new LogicException('JSON error: ' . json_last_error_msg());
}

echo $response;
