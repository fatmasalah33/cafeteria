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
     <!--navbar-->
     <div class="container-fluid text-center navcol">
    <nav class="navbar navbar-expand-lg navbar-light ">
    <div class="container pt-2">
    <a class="navbar-brand" href="homeUser.php">Home</a>
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

                      echo "<td> <a href='controller.php?id={$user['id']}&deleteuser'>
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