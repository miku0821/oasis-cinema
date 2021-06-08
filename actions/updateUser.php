<?php
include "../classes/user.php";
session_start();
$user_id = $_SESSION['user_id'];
$account_id = $_SESSION['account_id'];

$new_first_name = $_POST['new_first_name'];
$new_last_name = $_POST['new_last_name'];
$new_gender = $_POST['new_gender'];
$new_b_day = $_POST['new_b_day'];
$new_email = $_POST['new_email'];
$new_postcode = $_POST['new_postcode'];
$new_address = $_POST['new_address'];
$new_username = $_POST['new_username'];
$new_password = password_hash($_POST['new_password'], PASSWORD_DEFAULT);

$user = new User;
$user->updateUser($user_id, $new_first_name, $new_last_name, $new_gender, $new_b_day, $new_email, $new_postcode, $new_address, $new_username, $new_password);
?>