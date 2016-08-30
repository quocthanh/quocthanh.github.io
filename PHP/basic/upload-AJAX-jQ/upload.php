<?php
/**
 * receive file uploaded from client
 */
//check whether request method is AJAX
if (strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) !== 'xmlhttprequest') {
    throw new LogicException('Not AJAX Request!!!');
}
//check request method
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    throw new LogicException('Not POST Request!!!');
}
//check file is uploaded successfully
if (!is_uploaded_file($_FILES['imgFile']['tmp_name'])) {
    echo 'Upload Fail!!!';
    exit;
}

//directory store files
$uploadDir = 'uploads/';
$uploadFile = $uploadDir . basename($_FILES['imgFile']['name']);

//check the uploaded file, if it exists then move it into the uploads dir
if (move_uploaded_file($_FILES['imgFile']['tmp_name'], $uploadFile)) {
    echo 'Successfully upload';
} else {
    echo 'Upload Fail!!!';
}
