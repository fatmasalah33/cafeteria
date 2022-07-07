<?php  
require "connection.php"; 
session_start();
 if (!empty($_SESSION['admin'])) {
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
         
        .section {
  min-height: fit-content;
  padding-bottom: 5rem;
  padding-top: 3rem !important;
 
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


    <?php require"adminnavbar.php"?>
   
<div class="section ps-5 pe-5">
    <div class="mt-0 mb-0 ms-auto me-auto custom-width">
        <div class="card card-format d-flex flex-row row">
            <div class="card-body col-6">
                <h2 class="title">Add Product</h2>
                <form method="POST" action="productcontroller.php" enctype="multipart/form-data">
                    <div class="input-group d-flex flex-column">
                        <input class="form-control w-100 mb-1" type="text" placeholder="Product Name" name="name">
                       
                            <span><?php echo (isset($_SESSION['errors']['namepro'])?$_SESSION['errors']['namepro']:'');?></span> 
                    </div>
                    <div class="input-group d-flex flex-column">
                        <input class="form-control mb-1 mt-3 w-100" type="text" placeholder="Price" name="price">
                          
                   <span><?php echo (isset($_SESSION['errors']['price'])?$_SESSION['errors']['price']:'');?></span> 
                    </div>

                 
                    <div class="input-group d-flex flex-column">
                        <?php
                   $queryString=$connection->prepare('SELECT * FROM cats');
                   $queryString->execute();
                  $catogerys=$queryString->fetchAll();
                      echo " <select class='form-control mb-1 mt-3 w-100' name='cat_id'>"."<br>
                            <option disabled selected >Select a category</option>
                      ";
                    foreach ($catogerys as $catogery){?>
                      <option  value=<?= $catogery['id']?>><?= $catogery['name']?></option>
    
                      <?php }
                      echo "</select>";
                     
                          ?>
                            <span><?php echo (isset($_SESSION['errors']['cat_id'])?$_SESSION['errors']['cat_id']:'');?></span>
                     
                          <div class="mb-2 mt-2"> 
                        <a class="link" href="catogery.php">Add category</a>
                         </div> 
                    </div>
                    <div class="input-group d-flex flex-column">
                        <input class="form-control mb-1 mt-3 w-100" type="file" placeholder="Image" name="imageuser">
                       
                           <span class="mb-3"><?php echo (isset($_SESSION['errors']['imgpro'])?$_SESSION['errors']['imgpro']:'');?></span> 
                    </div>
                    <div class="mt-2 d-inline-block me-3">
                        <input class="btn ps-4 pe-4 pt-1 pb-1 " type="submit" name="addproduct" value="Add Product">
                    </div>
                    <div class="mt-2 d-inline-block">
                        <input class="btn ps-4 pe-4 pt-1 pb-1 " type="reset">
                    </div>
                  
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
<?php 
 }
 else {
  header("Location:index.php");
 } 
 ?>