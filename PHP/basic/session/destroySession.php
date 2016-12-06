<?php
session_start();

//unset all variables
session_unset();

//destroy session
session_destroy();

echo 'Session is destroyed.' . '<br>';

?>

<a href='checkSession.php'>Prev Page</a>