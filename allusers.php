<?php
session_start();
 if (!empty($_SESSION['admin'])) {
 
 ?>
<!doctype html>
<html lang="en">
  <head>
    <title>Cafetira | All users</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- add icon link -->
    <link rel = "icon" href ="images/coffee-cup.png" type = "image/x-icon">

    <!-- Bootstrap CSS v5.0.2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"  integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/main.css">

    <style>

           img[alt="adminimage"]{
            width: 4rem;
        }
              
    </style>

  </head>
  <body>
    <?php require"adminnavbar.php"?>
    <section class="section mt-5" >
        <div class="container">
          <div class="row justify-content-center">
          </div>
            <div class="row">
                <div class="col-md-12">
                  <div class=" d-flex  row">
                    <h1 class=" text-center justify-content-center title fs-1">All Users</h1>
                    <h5 class="text-start mb-2" > <a href="adduser.php" class="btn">Add User</a></h5>
                   
                  </div>
                  <div class="table-wrap">
                        <table class="table">
                            <thead class="thead-primary">
                                <tr class="text-center">
                                  <th>ID</th>
                                  <th>Name</th>
                                  <th>Room</th>
                                  <th>Image</th>
                                  <th>Ext At</th>
                                  <th colspan="3">Action</th>
                                </tr>
                            </thead>
                    
    <?php
    
      require 'connection.php';
      
    

      // session_start();
      // $email = $_SESSION['email'];

      //     if(isset($email)){

           

           
        $queryString=$connection->prepare('SELECT * FROM users');
        $queryString->execute();
        $users=$queryString->fetchAll();
            foreach ($users as $user){?>


              <tr class="text-center">
                  <th ><?= $user['id']?></th>
                  <td><?= $user['name']?></td>
                  <td><?= $user['room_no']?></td>
                 
                 
                  <td><img style="width:50px ; height:50px;" src="<?='userphotos/'.$user['img']?>"></td>
                  <td><?= $user['ext']?></td>
                  <!-- <td> -->
                    <?php
                        // echo "<td> <a href='view.php?id={$result['id']}'>View</a></td>";
                  echo "<td> <a href='edit_user.php?id={$user['id']}'>
                  <i class='fa-solid fa-pencil'></i>
                  </a></td>";

                      echo "<td> <a href='testcontroller.php?id={$user['id']}&deleteuser'>
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
      

      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
      </body>
    </html>

    <?php 
 }
 else {
  header("Location:index.php");
 } 
 ?>