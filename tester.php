<?php
include 'users.php';
include 'vendor/autoload.php';

$jacob = new users;
//$jacob->registerUser(1,"jacob","khalili","jacosdf@gdmail.com",1783,"RabbiJEDEL123");
var_dump($jacob->setFieldIDs(9,array(1)));
