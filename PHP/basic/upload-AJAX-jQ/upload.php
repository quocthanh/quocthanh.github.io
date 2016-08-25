<?php
/**
 * receive file uploaded from client
 */
if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_FILES['imgFile']['tmp_name'])) {
    //directory store files
    $uploadDir = 'uploads/';
    $uploadFile = $uploadDir . basename($_FILES['imgFile']['name']);

    //check the uploaded file, if it exists then move it into the uploads dir
    if (move_uploaded_file($_FILES['imgFile']['tmp_name'], $uploadFile)) {
        echo 'Successfully upload';
    } else {
        echo 'Upload Fail!!!';
    }
} else {
        echo 'Upload Fail!!!';
}
