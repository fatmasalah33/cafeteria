<?php
session_start();
if (!empty($_SESSION['admin'])) {  
require "connection.php";
// session_start();
// echo $_SESSION['emptyname']; 


 
 ?>



<!DOCTYPE html>
<html lang="en">

<head>
    <title>cafetiria | Add  catogery</title>
    <meta charset="utf-8">
    <!-- <link rel = "icon" href ="images/coffee-cup.png" type = "image/x-icon"> -->
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
          .section {
            padding-top: 10rem;
            padding-bottom: 5rem;
        }
        span{
            color: red;
        }
        img[alt="adminimage"]{
            width: 4rem;
        }
    </style>
</head>
<body>
    <?php require "adminnavbar.php"?>
   
<div class="section ps-5 pe-5">
    <div class="mt-0 mb-0 ms-auto me-auto custom-width">
        <div class="card card-format d-flex flex-row row">
            <div class="card-body col-6">
                <h2 class="title">Add catogery</h2>
                <form method="POST" action="catcontroller.php" enctype="multipart/form-data">
                    <div class="input-group d-flex">
                        <input class="form-control w-100 mb-1" type="text" placeholder="catogery Name" name="name">
                         <span class="mb-5"><?php echo (isset($_SESSION['errors']['name'])?$_SESSION['errors']['name']:'');?></span> 
                    </div>
                   
                    <div class="mt-2 d-inline-block me-3">
                       
                    <input class="btn ps-4 pe-4 pt-1 pb-1 " type="submit" name="addcatogery" value="Add catogery" require>
                   
                    </div>
                    <div class="mt-2 d-inline-block">
                        <input class="btn ps-4 pe-4 pt-1 pb-1 " type="reset">
                    </div>
                    <!--for testing-->
                    <div class="mt-3">
                        <a class="link" href="allcatogery.php">Show All catogery</a>
                    </div>
                </form>
            </div>
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