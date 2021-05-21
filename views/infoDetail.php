<?php
include "../classes/information.php";
$info_id = $_GET['info_id'];
$information = new Information;
$posts = $information->getPostDetail($info_id);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post Details</title>
    <link rel="stylesheet" href="../assets/css/info_detail.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/1eaebda83d.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container mt-5">
        <div class="edit-button text-right">
            <a href="editPost.php?info_id=<?php echo $info_id;?>"><i class="fas fa-pen-nib"></i>EDIT POST</a>
        </div>
        <img src="../images/<?php echo $posts['image'];?>" alt="image" height="250px" width="100%">
        <h1 class="my-4"><?php echo $posts['title'];?></h1><hr>
        <p><?php echo $posts['message'];?></p>
    </div>
</body>
</html>

