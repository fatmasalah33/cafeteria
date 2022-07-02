<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link rel = "icon" href ="images/coffee-cup.png" type = "image/x-icon">
    <!-- Main CSS-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="css/main.css" rel="stylesheet" media="all">
    <style>
          .page-wrapper {
            padding-top: 1rem;
            padding-bottom: 1rem;
        }
       
    </style>
    <title>Cafetiria | Add user</title>
</head>
<body>
<?php
session_start();




?>

    <div class="page-wrapper ps-5 pe-5">
        <div class="mt-0 mb-0 ms-auto me-auto custom-width">
            <div class="card card-format d-flex flex-row row">
                <div class="card-body col-6">
                    <h2 class="title">Add User</h2>
                    <form method="POST" action="controller.php" enctype="multipart/form-data">
                        <div class="input-group">
                            <input class="form-control mb-4" type="text" placeholder="name" name="name" id="name" onfocusout="validationofname()">
                            <!-- <p id="emptyname">the name can not be empty</p>
                            <p id="notchar" >the name  must be character only</p> -->
                            <span><?php echo (isset($_SESSION['errors']['name'])?$_SESSION['errors']['name']:'');?></span> 
                           
                           
                        </div>
                        <div class="input-group">
                            <input class="form-control mb-4" type="email" placeholder="email" name="email" id="email"  onfocusout="validationofmail()">
                            <span><?php echo (isset($_SESSION['errors']['email'])?$_SESSION['errors']['email']:'');?></span> 

                            <!-- <p id="emptymail">the email can not be empty</p>
                            <p id="notmail" >the email  must be  invalid form</p> -->
                            

                        </div>
                        <div class="input-group">
                            <input class="form-control mb-4" type="password" placeholder="password" name="password" id="pass"  onfocusout="validationofpass()">
                            <!-- <p id="emptypass">the password can not be empty</p> -->
                           <span><?php echo (isset($_SESSION['errors']['password'])?$_SESSION['errors']['password']:'');?></span> 


                        </div>
                        <div class="input-group">
                            <input class="form-control mb-4" type="password" placeholder="confirm password" name="confirmpassword" id="cpass"  onfocusout=" confirmpass()">
                            <!-- <p id="emptycpass">the ConfirmPassword can not be empty</p>
                             <p id="cpas">The password not the same</p> -->
                             <span><?php echo (isset($_SESSION['errors']['confirmpassword'])?$_SESSION['errors']['confirmpassword']:'');?></span> 

                        </div>
                        <div class="input-group">
                            <input class="form-control mb-4" type="number" placeholder="Room number" name="roomnumber" min="1" max="5" id="roomnumber"  onfocusout=" validationofroomno()">
                            <span><?php echo (isset($_SESSION['errors']['roomnumber'])?$_SESSION['errors']['roomnumber']:'');?></span> 

                            <!-- <p id="emptyroomno">the RoomNo can not be empty</p> -->

                        </div>
                        <div class="input-group">
                            <input class="form-control mb-4" type="number" placeholder="Ext." name="ext" min="1" max="5000" id="ext"  onfocusout=" validationofext()">
                            <span><?php echo (isset($_SESSION['errors']['ext'])?$_SESSION['errors']['ext']:'');?></span> 

                            <!-- <p id="emptyext">the Ext can not be empty</p> -->

                        </div>
                        <div class='input-group'>
                            <input class="form-control mb-4" type="file" placeholder="choose image" name="imageuser" >
                            <span><?php echo (isset($_SESSION['errors']['img'])?$_SESSION['errors']['img']:'');?></span> 

                            
                        </div>
                        <div class="mt-2 d-inline-block me-3">
                            <input class="btn ps-4 pe-4 pt-1 pb-1 " type="submit" name="adduser" value="Add User">
                        </div>
                        <div class="mt-2 d-inline-block">
                            <input class="btn ps-4 pe-4 pt-1 pb-1 " type="reset">
                        </div>
                        <!--for testing-->
                        <div class="mt-3">
                            <a class="link" href="allusers.php">Show All users</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
     <!-- <script src="js.js" charset="utf-8"></script> -->
</body>
</html>