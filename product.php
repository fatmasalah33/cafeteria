<?php  
require "connection.php";
?>





<!DOCTYPE html>
<html lang="en">

<head>
    <title>products</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container">
    <nav class="navbar navbar-expand-lg navbar-light bg-light justify-content-between">
  <div class="container-fluid col-md-6">
  <i class="fa-solid fa-circle-user fs-3"> <a class="navbar-brand" href="#">ADMIN</a></i>
    <!-- <a class="navbar-brand" href="#">admin</a> -->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    </div>
    <div class="collapse navbar-collapse col-md-6" id="navbarNavAltMarkup ">
      <div class="navbar-nav">
        <a class="nav-link active ps-4" aria-current="page" href="#">Home</a>
        <a class="nav-link  ps-4" href="#">products</a>
        <a class="nav-link  ps-4" href="#">Users</a>
        <a class="nav-link  ps-4 "href="#">manual orders</a>
        <a class="nav-link ps-4 "href="#">checks</a>
      </div>
    </div>
 
</nav>

        <h2>Add user</h2>

<main>

                <form action="procontroller.php" method="post" enctype="multipart/form-data">

        

                    <div class="form-group">
                        <label for="exampleInputName"> products</label>
                        <input type="text" class="form-control" id="exampleInputName" name="name" aria-describedby=""
                            placeholder="Enter Name">
                    </div>


                    <div class="form-group">
                        <label for="exampleInputEmail">price </label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="price"
                            aria-describedby="emailHelp" placeholder="Enter price">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputName">Image</label>
                        <input type="file" name="imageuser">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword">catagoery_id</label>
                        <input type="text" class="form-control" id="exampleInputPassword1" name="cat_id"
                            placeholder="catogery id">
                    </div>
                    <input class="btn ps-4 pe-4 pt-1 pb-1 " type="submit" name="addproduct" value="Add Product">
                       
                    <!-- <button type="submit" class="btn btn-primary" value="Add Product">Save</button> -->
                    <a href="allusers.php">show all users</a>
                    <button  type="reset" class="btn btn-primary">Cancel</button>
                    <a href="allusers.php">show all users</a>
                </form>


</main>

</div>
</body>

</html>
