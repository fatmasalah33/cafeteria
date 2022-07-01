<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link rel = "icon" href ="images/coffee-cup.png" type = "image/x-icon">
    <!-- Main CSS-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="css/main.css" rel="stylesheet" media="all">
    <style>
          .page-wrapper {
            padding-top: 1rem;
            padding-bottom: 1rem;
        }
    </style>
    <title>Cafetiria | Add user</title>
</head>
<body>
<?php

if(isset($_GET['errors'])){
    $errors = (array)json_decode($_GET['errors']);
    // echo $errors["required"];
   // var_dump($errors);
    if(isset($errors["required"])) echo "<h3 style='text-align:center;color:Red'>{$errors['required']}</h3>";

}
?>

    <div class="page-wrapper ps-5 pe-5">
        <div class="mt-0 mb-0 ms-auto me-auto custom-width">
            <div class="card card-format d-flex flex-row row">
                <div class="card-body col-6">
                    <h2 class="title">Add User</h2>
                    <form method="POST" action="controller.php" enctype="multipart/form-data">
                        <div class="input-group">
                            <input class="form-control mb-4" type="text" placeholder="name" name="name">
                        </div>
                        <div class="input-group">
                            <input class="form-control mb-4" type="email" placeholder="email" name="email">
                        </div>
                        <div class="input-group">
                            <input class="form-control mb-4" type="password" placeholder="password" name="password">
                        </div>
                        <div class="input-group">
                            <input class="form-control mb-4" type="password" placeholder="confirm password" name="confirmpassword">
                        </div>
                        <div class="input-group">
                            <input class="form-control mb-4" type="number" placeholder="Room number" name="roomnumber" min="1" max="5">
                        </div>
                        <div class="input-group">
                            <input class="form-control mb-4" type="number" placeholder="Ext." name="ext" min="1" max="5000">
                        </div>
                        <div class="input-group">
                            <input class="form-control mb-4" type="file" placeholder="choose image" name="imageuser">
                        </div>
                        <div class="mt-2 d-inline-block me-3">
                            <input class="btn ps-4 pe-4 pt-1 pb-1 " type="submit" name="adduser" value="Add User">
                        </div>
                        <div class="mt-2 d-inline-block">
                            <input class="btn ps-4 pe-4 pt-1 pb-1 " type="reset">
                        </div>
                        <!--for testing-->
                        <div class="mt-3">
                            <a class="link" href="allusers.php">Show All users</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>