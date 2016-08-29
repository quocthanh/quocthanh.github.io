<?php
/**
 * receive file uploaded from client
 */
echo '<h2>This is from PHP server</h2>' . '<br>';

//directory store files
$uploadDir = 'uploads/';
$uploadFile = $uploadDir . basename($_FILES['imgFile']['name']);

//check the uploaded file, if it exists then move it into the uploads dir
if (move_uploaded_file($_FILES['imgFile']['tmp_name'], $uploadFile)) {
    echo 'Successfully upload' . '<br>';
} else {
    echo 'Upload Fail!!!' . '<br>';
}

echo '<h2>Your Files</h2>';

//open and read the uploads dir, show files uploaded
$dirName = 'uploads';
//a class used to access filesystem
$dirObj = new FilesystemIterator($dirName);

foreach ($dirObj as $fileInfo) {
    $fileName = $fileInfo->getFilename();
    echo "<a href='$dirName/$fileName'>$fileName</a>" . '<br>';
}
