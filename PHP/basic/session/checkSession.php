<?php
session_start();

//check if session variable is set
if (isset($_SESSION['cmt'])) {
    echo '$_SESSION["cmt"] is  set.' . '<br>' .
         'Value: ' . $_SESSION['cmt'] . '<br>';
} else {
    echo 'I don\'t know anything about you' . '<br>';
}

?>

<a href='destroySession.php'>Next Page</a>
<br>
<a href='createSession.php'>Prev Page</a>