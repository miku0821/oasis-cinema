<?php
include "../classes/user.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="../assets/css/profile.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/1eaebda83d.js" crossorigin="anonymous"></script>
</head>
<body>
<?php
    include "userNavbar.php";
    $user_id = $_SESSION['user_id'];
    $user = new User;
    $user_detail = $user->getUserDetail($user_id);
?>
    <div class="container">
        <h1>Your Profile <i class="fas fa-user"></i></h1>
        <div class="name">
            <p class="font-weight-bold"><?= $user_detail['first_name'];?> <?= $user_detail['last_name']?></p>
        </div>
        <div class="gender">
            <p>Gender: <?= $user_detail['gender'];?></p>
        </div>
        <div class="b-day">
            <p>Date of Birth: <?= $user_detail['birthday'];?></p>
        </div>
        <div class="email">
            <p>Email: <?= $user_detail['email'];?></p>
        </div>
        <div class="postcode">
            <p>Postcode: <?= $user_detail['postcode'];?></p>
        </div>
        <div class="address">
            <p>Address: <?= $user_detail['address'];?></p>
        </div>

        <a href="updateUser.php" class="button">UPDATE</a>
    </div>
</body>
</html>