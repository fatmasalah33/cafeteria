<?php  
require "connection.php";
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <title>cafetiria | Add product</title>
    <meta charset="utf-8">
    <link rel = "icon" href ="images/coffee-cup.png" type = "image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
<link rel="stylesheet" href="css/main.css">
<style>
         
        .page-wrapper {
  min-height: fit-content;
  padding-bottom: 5rem;
 
}
        img[alt="adminimage"]{
            width: 4rem;
        }
        .navcol{
            background-color: #eae7e5;
         }
    </style>
</head>

<body>

<!--navbar-->
<div class="container-fluid text-center fixed-top  navcol">
    <nav class="navbar navbar-expand-lg navbar-light ">
    <div class="container pt-2">
    <a class="navbar-brand" href="homeAdmin.php">Home</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
            <span class="nav-link d-lg-block d-none">|</span>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="allproduct.php">Products</a>
        </li>
        <li class="nav-item">
            <span class="nav-link d-lg-block d-none">|</span>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="allusers.php">Users</a>
        </li>
        <li class="nav-item">
            <span class="nav-link d-lg-block d-none">|</span>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">orders</a>
        </li>
        <li class="nav-item">
            <span class="nav-link d-lg-block d-none">|</span>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Checks</a>
        </li>
      </ul>
      <div>
      <span class="navbar-text me-2" id="username">
        <img src="images/coffee-cup.png" class="rounded-circle border" alt="adminimage" id="userimage">
      </span> 
      <span class="navbar-text me-auto" id="Adminname">
        Admin
      </span>
      </div>
    </div>
   </div>
 </nav>
</div>


   
<div class="page-wrapper ps-5 pe-5">
    <div class="mt-0 mb-0 ms-auto me-auto custom-width">
        <div class="card card-format d-flex flex-row row">
            <div class="card-body col-6">
                <h2 class="title">Add Product</h2>
                <form method="POST" action="procontroller.php" enctype="multipart/form-data">
                    <div class="input-group">
                        <input class="form-control mb-4" type="text" placeholder="Product Name" name="name">
                    </div>
                    <div class="input-group">
                        <input class="form-control mb-4" type="text" placeholder="Price" name="price">
                    </div>

                    <!--i replaced the input tag text type with a select tag-->
                    <div class="input-group">
                        <select class="form-control mb-4 " type="text" name="cat_id">
                          <option disabled selected>choose a category</option>
                          <option value="1">Hot drinks</option>
                          <option value="2" >Cold drinks</option>
                        </select>
                        <div class="ms-4 mt-3">
                        <a class="link" href="#">Add category</a>
                        </div>
                    </div>
                    <div class="input-group">
                        <input class="form-control mb-4" type="file" placeholder="Image" name="imageuser">
                    </div>
                    <div class="mt-2 d-inline-block me-3">
                        <input class="btn ps-4 pe-4 pt-1 pb-1 " type="submit" name="addproduct" value="Add Product">
                    </div>
                    <div class="mt-2 d-inline-block">
                        <input class="btn ps-4 pe-4 pt-1 pb-1 " type="reset">
                    </div>
                    <!--for testing-->
                    <div class="mt-3">
                        <a class="link" href="allproduct.php">Show All Products</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

</div>
</body>

</html>
