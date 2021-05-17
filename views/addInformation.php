<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Information</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5 w-50">
        <h1>Add Information and Offers</h1>
        <form action="../actions/addInformation.php" method="POST" enctype = "multipart/form-data">
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="title">TITLE</label>
                    <input type="text" name="title" id="title" class="form-control">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="date">Date</label>
                    <input type="text" name="date" id="date" class="form-control">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label for="image">Upload Image</label>
                    <input type="file" name="photo" id="image" class="form-control">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-12">
                    <textarea name="message" cols="30" rows="10" class="border border-top-0 border-left-0 border-right-0 form-control" placeholder="MESSAGE"></textarea>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-12">
                    <button type="submit" name="add" class="btn btn-success">Add</button>
                </div>
            </div>
        </form>
    </div>
</body>
</html>