<?php
//start session
session_start();

//create a session variable
$_SESSION['cmt'] = 'Welcome again!!!';

echo 'Welcome!' . '<br>';
echo 'A session variable is created.' . '<br>';

?>

<a href='checkSession.php'>Next Page</a>