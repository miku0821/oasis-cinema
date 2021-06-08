<?php
include "../classes/information.php";
$info_id = $_GET['info_id'];
$info= new Information;
$post_details = $info->getPostDetail($info_id);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Post</title>
    <link rel="stylesheet" href="../assets/css/add_information.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5 w-50">
    <h1 class="text-center">Add Information and Offers</h1>
        <form action="../actions/editPost.php" method="POST" enctype = "multipart/form-data">
            <div class="form-row mt-2">
                <div class="form-group col-md-9 mx-auto">
                    <label for="title">TITLE</label>
                    <input type="text" name="new_title" id="title" value="<?php echo $post_details['title']?>" class="form-control" required>
                </div>
            </div>
            <div class="form-row mt-4">
                <div class="form-group col-md-9 mx-auto">
                    <label for="date">Date</label>
                    <input type="text" name="new_date" id="date" value="<?php echo $post_details['date'];?>" class="form-control" required>
                </div>
            </div>
            <div class="info-image text-center mt-4">
                <img src="../assets/images/<?= $post_details['image'];?>" alt="image" width="50%">
            </div>
            <div class="form-row mt-3">
                <div class="form-group col-md-9 mx-auto">
                    <div class="custom-file">
                        <label for="image" class="custom-file-label">Upload Image</label>
                        <input type="file" name="new_image" id="image" class="custom-file-input">
                    </div>
                </div>
            </div>
            <div class="form-row mt-5">
                <div class="form-group col-md-12">
                    <textarea name="new_message" cols="30" rows="10" class="form-control" placeholder="MESSAGE" required><?php echo $post_details['message'];?></textarea>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-12">
                    <input type="hidden" name="info_id" value="<?php echo $info_id; ?>">
                    <button type="submit" name="add" class="button">Add</button>
                </div>
            </div>
        </form>
    </div>
</body>
</html>