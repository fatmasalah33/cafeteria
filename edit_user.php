<?php
session_start();
if (!empty($_SESSION['admin'])) {


if(isset($_GET['id'])){

  require_once 'connection.php';
 

      $result=  $connection->query("select * from users where id='{$_GET['id']}'");

      $row   = $result->fetch(PDO::FETCH_ASSOC);


}
?>
<!doctype html>
<html lang="en">
  <head>
    <title>Cafetiria | Edit user</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel = "icon" href ="images/coffee-cup.png" type = "image/x-icon">
    <!-- Main CSS-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="css/main.css" rel="stylesheet" media="all">
    <style>
          .page-wrapper {
            padding-top: 5rem;
            padding-bottom: 5rem;
        }
    </style>
  </head>
  <body>
    <div class="page-wrapper ps-5 pe-5">
        <div class="mt-0 mb-0 ms-auto me-auto custom-width">
            <div class="card card-format d-flex flex-row row">
                <div class="card-body col-6">
                    <h2 class="title">Edit User</h2>
                    <form method="POST" action="testcontroller.php" enctype="multipart/form-data">
                        <input type="hidden" class="form-control" value="<?php echo $row['id']?>" id="inputAddress"  name="id">
                        <div class="input-group">
                            <input class="form-control mb-4" type="text" value="<?php echo $row['name']?>" placeholder="name" name="name">
                        </div>
                        <div class="input-group">
                            <input class="form-control mb-4" value="<?php echo $row['email']?>" type="email" placeholder="email" name="email">
                        </div>
                        <div class="input-group">
                            <input class="form-control mb-4" value="<?php echo $row['password']?>" type="password" placeholder="password" name="password">
                        </div>
                        <div class="input-group">
                            <input class="form-control mb-4" value="<?php echo $row['room_no']?>" type="number" placeholder="Room number" name="roomnumber" min="1" max="5">
                        </div>
                        <div class="input-group">
                            <input class="form-control mb-4" value="<?php echo $row['ext']?>" name="ext" type="number" placeholder="Ext." min="1" max="5000">
                        </div>
                        <div class="mt-2 d-inline-block me-3">
                            <input class="btn ps-4 pe-4 pt-1 pb-1" name="edit" type="submit" value="Edit">
                        </div>
                        <div class="mt-2 d-inline-block">
                            <a href="allusers.php" class="btn ps-4 pe-4 pt-1 pb-1">Cancel</a> 
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
  </body>
</html> 
<?php 
 }
 else {
    header("Location:index.php");
 } 
 ?>