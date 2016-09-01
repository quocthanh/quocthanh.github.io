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
    sendFailRes();
}

//directory store files
$uploadDir = 'uploads/';
$uploadFile = $uploadDir . basename($_FILES['imgFile']['name']);

//check the uploaded file, if it exists then move it into the uploads dir
if (!move_uploaded_file($_FILES['imgFile']['tmp_name'], $uploadFile)) {
    sendFailRes();
}

sendSuccessRes($uploadFile);
/**
 * create a fail message into $response
 * convert $response to JSON string
 * then send it, and exit
 */
function sendFailRes()
{
    $response['verify'] = 'Upload Fail!!!';
    echo json_encode($response);
    exit;
}
/**
 * create success message
 * read content of file
 * convert $response to JSON string
 * then send it to client
 *
 * @param string $file path of file
 *
 */
function sendSuccessRes($file)
{
    $response['verify'] = 'Successfully upload';

    //read the content of file
    $fileHandle = fopen($file, 'r');
    $fileCont = fread($fileHandle, filesize($file));
    $response['content'] = nl2br($fileCont);

    $responseJSON = json_encode($response);

    //the content of file can't be converted to JSON
    if (json_last_error() !== JSON_ERROR_NONE) {
        $response['content'] = "sorry, i don't know  how to show the content of this file.<br>" .
                               "Please upload a text file!!!";
        $responseJSON = json_encode($response);
    }

    echo $responseJSON;
}
