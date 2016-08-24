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

$dir = 'uploads';

//open and read the uploads dir, show files uploaded
if (is_dir($dir)) {
    if ($dirHandle = opendir($dir)) {
        while (($file = readdir($dirHandle)) !== false) {
            if ($file != '.' && $file != '..') {
                echo "<a href='$dir/$file'>$file</a>" . '<br>';
            }
        }
        closedir($dirHandle);
    }
}
