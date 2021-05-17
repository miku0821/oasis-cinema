<?php
require "../classes/user.php";
session_start();

$username = $_POST['username'];
$password = $_POST['password'];

$user = new User;
$login_result = $user->login($username, $password);


if($login_result == "Invalid Password"){
    echo $_SESSION['msg'] = "INVALID PASSWORD";
    header("location: ../views/login.php");
    exit;
}elseif($login_result == "Invalid Username"){
    $_SESSION['msg'] = "INVALID USERNAME";
    header("location: ../views/login.php");
    exit;
}