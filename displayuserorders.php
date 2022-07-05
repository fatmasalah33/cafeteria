<!doctype html>
<html lang="en">
  <head>
    <title>Cafetira | user orders</title>
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
  <!-- <form action="displayuserorder.php" method="post">
  
  <input type="date" id="start" name="start" placeholder="Date from">
  <input type="date" id="end" name="end" placeholder="Date TO">
  <button type="submit" class="btn btn-primary" name="fillter">Fillter</button> 
</form> -->


    <section class="section mt-5">
        <div class="container">
          <div class="row justify-content-center">
          </div>
            <div class="row">
                <div class="col-md-12">
                  <div class=" d-flex  row">
                    <h1 class=" text-center justify-content-center title fs-1">My Orders</h1>
                   
                   
                  </div>
                  <div class="table-wrap">
                        <table class="table">
                            <thead class="thead-primary">
                                <tr class="text-center">
                                  <th>Order ID</th>
                                  <th>User ID</th>
                                  <th>Order date</th>
                                  <th>Order Status</th>
                                  <th>Total Price</th>
                                  <th colspan="3">Action</th>
                                </tr>
                            </thead>
      <?php
       require 'connection.php';
      // if(isset($_POST['fillter']))
      // {

    
        $queryString=$connection->prepare("SELECT * from orders WHERE order_date BETWEEN '2022-06-29' and '2022-07-05' and user_id=2");
        $queryString->execute();
        $orders=$queryString->fetchAll();

        foreach ($orders as $ord){?>


          <tr class="text-center">
              <th ><?= $ord['id']?></th>
              <td><?= $ord['user_id']?></td>
              <td><?= $ord['order_date']?></td>
              <td><?= $ord['status']?> </td>
              <td><?= $ord['total_price']?> L.E</td>
              <?php
                if($ord['status']==='processing')
                {
                    ?>
                    <?php
                  
                    echo "<td><a href='controller.php?or_id={$ord['id']}&deleteorder'>
                    <i class='fa-solid fa-trash text-danger'></i>  
                    </a></td>";
               
                        ?>
                        <?php
                }
                else{
                    echo "<td> </td>";
                }
                ?>
                  


            </tr>
    
        <?php 
           }
     // }
      
      
      ?>              
   
    
    
     
      
        <!-- Bootstrap JavaScript Libraries -->
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
        <script src="js/main.js"></script>

      </body>
    </html>