<?php
//check whether request method is AJAX
if (strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) !== 'xmlhttprequest') {
    throw new LogicException('Not AJAX Request!!!');
}

date_default_timezone_set("Asia/Ho_Chi_Minh");
echo 'Hello guys!' . PHP_EOL;
echo 'Time: ' . Date("d-m-Y h:i:s");
