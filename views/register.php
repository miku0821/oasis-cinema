<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link rel="stylesheet" href="../assets/css/register.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
</head>
<body>
    <header></header>
    <div class="container mt-5 w-50">
        <h3>Registration</h3>
        <form action="../actions/register.php" method="post" class="pb-3">
            <div class="form-row mt-4">
                <div class="form-group col-md-6">
                    <label for="f_name">First Name</label>
                    <input type="text" name="first_name" id="f_name" class="form-control" placeholder="First Name" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="l_name">Last Name</label>
                    <input type="text" name="last_name" id="l_name" class="form-control" placeholder="Last Name" required> 
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="gender">Gender</label>
                    <select class="form-control" name="gender" id="gender" required>
                        <option hidden>Gender</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                        <option value="other">Other/Prefer not to say</option>
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label for="b_day">Date of Birth</label>
                    <input type="date" name="b_day" id="b_day" placeholder="Date of Birth" class="form-control">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" class="form-control" placeholder="Email">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="postcode">Postcode</label>
                    <input type="text" name="postcode" id="postcode" class="form-control" placeholder="Postcode">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="address">Address</label>
                    <input type="text" name="address" id="address" class="form-control" placeholder="Address">
                </div>
            </div>
        <h3 class="mt-4">Create an Account</h3>
            <div class="form-row mt-4">
                <div class="form-group col-md-6">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" class="form-control" placeholder="Username" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="p_word">Password</label>
                    <input type="password" name="password" id="p_word" class="form-control" placeholder="Password" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <button type="submit" value="register">Create Account</button>
                </div>
            </div>
        </form>

    <?php
        if(isset($_SESSION['msg'])){
    ?>
    <div class="alert alert-danger text-center" role="alert">
        <strong><?php echo $_SESSION['msg'];?></strong>
    </div>
    <?php
        }
        unset($_SESSION['msg']);
    ?>
    </div>
</body>
</html>