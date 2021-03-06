<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Information</title>
    <link rel="stylesheet" href="../assets/css/add_information.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5 w-50">
        <h1 class="text-center">Add News and Articles</h1>
        <form action="../actions/addArticle.php" method="POST" enctype = "multipart/form-data">
            <div class="form-row mt-2">
                <div class="form-group col-md-9 mx-auto">
                    <label for="title">TITLE</label>
                    <input type="text" name="title" id="title" class="form-control" required>
                </div>
            </div>
            <div class="form-row mt-2">
                <div class="form-group col-md-9 mx-auto">
                    <label for="date">DATE</label>
                    <input type="text" name="date" id="date" class="form-control" reqired>
                </div>
            </div>
            <div class="form-row mt-3">
                <div class="form-group col-md-9 mx-auto">
                    <label for="trailer">UPLOAD TRAILER</label>
                    <input type="text" name="trailer" id="trailer" class="form-control" required>
                </div>
            </div>
            <div class="form-row mt-4">
                <div class="form-group col-md-9 mx-auto">
                    <div class="custom-file">
                        <label for="image" class="custom-file-label">UPLOAD IMAGE</label>
                        <input type="file" name="image" id="image" class="custom-file-input" required>
                    </div>
                </div>
            </div>
            <div class="form-row mt-4">
                <div class="form-group col-md-12">
                    <textarea name="message" cols="30" rows="10" class="form-control" placeholder="MESSAGE" required></textarea>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-12">
                    <button type="submit" name="add" class="button">Add</button>
                </div>
            </div>
        </form>
    </div>
</body>
</html>