<?php
include "../classes/user.php";
session_start();

$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$gender = $_POST['gender'];
$b_day = $_POST['b_day'];
$email = $_POST['email'];
$postcode = $_POST['postcode'];
$address = $_POST['address'];
$username = $_POST['username'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);


$user = new User;
$user_check = $user->checkUsername($username);

if($user_check == FALSE){
    echo $user->register($first_name, $last_name, $gender, $b_day, $email, $postcode, $address, $username, $password);
}else{
    $_SESSION['msg'] = "The username is already taken";
    header("location: ../views/register.php");
}

?>