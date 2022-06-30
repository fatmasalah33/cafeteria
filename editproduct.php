<?php

if(isset($_GET['id'])){

  require_once 'connection.php';
 

      $result=  $connection->query("select * from products where id='{$_GET['id']}'");

      $row   = $result->fetch(PDO::FETCH_ASSOC);


}
?>
<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.0.2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"  integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  </head>
  <body>
<div class="container">
    <form class="row g-3" method="post" action="procontroller.php">
    <div class="col-md-6">
    <input type="hidden" class="form-control" value="<?php echo $row['id']?>" id="inputAddress"  name="id">
                        
        <label for="inputEmail4" class="form-label">Name</label>
        <input type="text" class="form-control" value="<?php echo $row['name']?>" id="inputEmail4" name="name">
    </div>
    <div class="col-md-6">
        <label for="inputPassword4" class="form-label">price</label>
        <input type="text" class="form-control" value="<?php echo $row['price']?>" id="inputPassword4" name="price">
    </div>
    
    
    <div class="col-12">
        <label for="inputAddress" class="form-label">catagoery_id</label>
        <input type="text" class="form-control" value="<?php echo $row['cat_id']?>" id="inputAddress"  name="cat_id">
    </div>
    <div class="d-flex justify-content-center  mb-3 mb-lg-4 col-4 m-auto mt-3">
        <input type="submit" class="btn btn-primary btn-lg mx-3 w-50"  name="edit" value="Edit">
        <a class="text-decoration-none text-white btn btn-primary btn-lg mx-3 w-50" href="product.php">Cancel</a>
    </div>

    </form>

</div>
      
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
  </body>
</html>