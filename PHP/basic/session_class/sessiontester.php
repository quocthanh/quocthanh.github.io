<?php
include_once 'class.sessionservice.php';

SessionService::start();

//create a session variable
SessionService::write('id', 12534);

//check if session exists
$check = SessionService::check('id');
var_dump($check);
echo '<br>';

//get the value
$value = SessionService::read('id');
echo $value . '<br>';

SessionService::delete('id');
$check = SessionService::check('id');
var_dump($check);
echo '<br>';

SessionService::destroy();
