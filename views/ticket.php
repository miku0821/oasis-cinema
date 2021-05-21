<?php
    include "../classes/reservation.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tickets</title>
    <!-- <link rel="stylesheet" href="../assets/css/movie_detail.css"> -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5 w-50">
        <h4>Choose your tickets</h4>
        <form action="payment.php" method="post">
            <div class="form-row">
                <div class="form-group">
                    <label for="adult">Adult</label>
                    <input type="number" name="adult" id="adult" value="0" class="form-control" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label for="Child">Child</label>
                    <input type="number" name="child" id="child" value="0" class="form-control" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label for="senior">Senior</label>
                    <input type="number" name="senior" id="senior" value="0" class="form-control" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label for="student">Student</label>
                    <input type="number" name="student" id="student" value="0" class="form-control" required>
                </div>
            </div>
            <button type="submit" name="submit">See Total Price</button>
        </form>
    </div>
</body>
</html>