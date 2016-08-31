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
$response = array();
//check file is uploaded successfully
if (!is_uploaded_file($_FILES['imgFile']['tmp_name'])) {
    failAndExit();
}

//directory store files
$uploadDir = 'uploads/';
$uploadFile = $uploadDir . basename($_FILES['imgFile']['name']);

//check the uploaded file, if it exists then move it into the uploads dir
if (!move_uploaded_file($_FILES['imgFile']['tmp_name'], $uploadFile)) {
    failAndExit();
}
$response['verify'] = 'Successfully upload';

//use SplFileObject
$file = new SplFileObject($uploadFile, 'r');
$fileCont = $file->fread($file->getSize());
$response['content'] = nl2br($fileCont);
sendRes();
/**
 * create a message into $response
 * then send it, and exit
 */
function failAndExit()
{
    global $response;
    $response['verify'] = 'Upload Fail!!!';
    sendRes();
    exit;
}
/**
 * convert $response to JSON string
 * then send it to client
 */
function sendRes()
{
    global $response;
    $response = json_encode($response);
    //the content of file can't be converted to JSON
    if (json_last_error() !== JSON_ERROR_NONE) {
        $response['verify'] = 'Successfully upload';
        $response['content'] = "sorry, i don't know  how to show the content of this file.<br>" .
                               "Please upload a text file!!!";
        $response = json_encode($response);
    }

    echo $response;
}
