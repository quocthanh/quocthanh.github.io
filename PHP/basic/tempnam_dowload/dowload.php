<?php
//create a tmp file
$fileName = tempnam(getcwd(), 'qt');

//create a random array
$charArr = array();
$length = mt_rand(1, 10);
for ($i = 0; $i < $length; $i++) {
    $charArr[] = substr(md5(mt_rand()), mt_rand(0, 10), mt_rand(1, 10));
}

//put csv content to file
$fp = fopen($fileName, 'w');
fputcsv($fp, $charArr);
fclose($fp);

//change extension of file
$newName = preg_replace('/\.[^.]+$/', '.csv', $fileName);
rename($fileName, $newName);

//let user dowload the file
$baseName = basename($newName);
header('Content-Type: text/csv');
header("Content-Disposition: attachment; filename=$baseName");

$fileCont = file_get_contents($newName);
echo $fileCont;
