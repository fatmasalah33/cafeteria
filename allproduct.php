<!doctype html>
<html lang="en">
  <head>
    <title>Cafetira | All products</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel = "icon" href ="images/coffee-cup.png" type = "image/x-icon">

    <!-- Bootstrap CSS v5.0.2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"  integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/main.css">


  </head>
  <body>
    <section class="section mt-5">
        <div class="container">
          <div class="row justify-content-center">
          </div>
            <div class="row">
                <div class="col-md-12">
                  <div class=" d-flex  row">
                    <h1 class=" text-center justify-content-center title fs-1">All Products</h1>
                    <h5> <a href="product.php" class="btn">Add product</a></h5>
                   
                  </div>
                  <div class="table-wrap">
                        <table class="table">
                            <thead class="thead-primary">
                                <tr class="text-center">
                                  <th>ID</th>
                                  <th>name</th>
                                  <th>price</th>
                                  <th>Image</th>
                                  
                                  <th colspan="3">Action</th>
                                </tr>
                            </thead>
                    
    <?php
    
      require 'connection.php';
      
    
      $queryString=$connection->prepare('SELECT * FROM products');
      $queryString->execute();
      $products=$queryString->fetchAll();
          foreach ($products as $product){?>


            <tr class="text-center">
                <th ><?= $product['id']?></th>
                <td><?= $product['name']?></td>
                <td><?= $product['price']?> L.E</td>
               
               
                <td><img style="width:50px ; height:50px;" src="<?='productphoto/'.$product['img']?>"></td>
               
                <td>
                  <?php
                      echo "<td> <a href='editproduct.php?id={$product['id']}'>
                      <i class='fa-solid fa-pencil'></i>
                      </a></td>";
                echo "<td> <a href='procontroller.php?id={$product['id']}&deleteproduct'>
                <i class='fa-solid fa-trash text-danger'></i>  
                </a></td>";
           ?>
            </tr>
    
    
   <?php }
       echo "</table>";
                echo "</div>";
                echo "</div>";
                echo "</div>";
                echo "</div>";
                echo "</section>"; 
    
?>

      
        <!-- Bootstrap JavaScript Libraries -->
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
        <script src="js/main.js"></script>

      </body>
    </html>