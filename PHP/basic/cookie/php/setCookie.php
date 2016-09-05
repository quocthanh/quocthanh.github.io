<?php
setcookie('user', 'quoc thanh', time() + 7*24*60*60, '/');

//check cookie exist and display message
if (isset($_COOKIE['user'])) {
    echo 'Cookie "user" is set' . '<br>';
    echo 'Value: ' . $_COOKIE['user'];
} else {
    echo 'Cookie "user" is not set';
}
