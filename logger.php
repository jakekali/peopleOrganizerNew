<?php
session_start();
include "vendor/autoload.php";
include 'users.php';
    $rem = $_POST['remember'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $dbh = new PDO("mysql:host=127.0.0.1;dbname=phpautho", "jacob", "https://slack.com/downloads/instructions/windows");
    $config = new PHPAuth\Config($dbh);
    $auth   = new PHPAuth\Auth($dbh, $config);


    $loginReturn = $auth->login($email,$password,$rem);
    if($loginReturn['error']){
        $_SESSION['loginReturn'] = $loginReturn;
        header("Location: /login.php");
    }else{
        $userID = $auth->getUID($email);
        $user = new users;
        $userInfo = $user->getUserInfo($userID);
        $_SESSION['userType'] = $userInfo['userType'];
        $_SESSION['userID'] = $userID;
        header("Location: /profile.php");
    }

