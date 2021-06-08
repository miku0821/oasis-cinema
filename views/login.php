<?php
include "../classes/user.php";
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN</title>
    <link rel="stylesheet" href="../assets/css/login.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
</head>
<body>
    <div class="container w-50">
        <h3 class="text-center">SIGN IN</h3>
        <form action="../actions/login.php" method="post" class="pb-4">
        <div class="form-row mt-4">
            <div class="form-group col-md-6 mx-auto">
                <label for="username">Username</label>
                <input type="text" name="username" id="username" placeholder="Username" class="form-control">
            </div>
        </div>
        <div class="form-row mt-2">
            <div class="form-group col-md-6 mx-auto">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" placeholder="Password" class="form-control">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group">
                <button type="submit" name="login">SIGN IN</button>
            </div>
        </div>
        </form>

        <?php
        if(isset($_SESSION['msg'])){
        ?>
            <div class="alert alert-danger text-center mt-5" role="alert">
            <strong><?php echo $_SESSION['msg']; ?></strong>
            </div>
        <?php
        }
        unset($_SESSION['msg']);
        ?>

    </div>
</body>
</html>