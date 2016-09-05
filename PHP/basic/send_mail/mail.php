<?php
/**
 * send mail directly from a script
 * use sendmail
 */
$to = "quocthanh2608@gmail.com";
$subject = "PHP mail";
$txt = "あなたはとてもハンサムです";

if (mail($to, $subject, $txt)) {
    echo 'Send successfully!';
} else {
    echo 'Fail!';
}
