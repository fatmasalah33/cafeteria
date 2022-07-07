<?php 
   session_start(); 
   if(!empty($_SESSION ["update_id"]) && !empty($_SESSION ["table_update"])) {
  
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel = "icon" href ="images/coffee-cup.png" type = "image/x-icon">
    <!-- Title Page-->
    <title>Cafetiria | updating password</title>
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Main CSS-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="css/main.css" rel="stylesheet" media="all">
</head>

<body>
    <div class="page-wrapper ps-5 pe-5">
        <div class="mt-0 mb-0 ms-auto me-auto custom-width">
            <div class="card card-format d-flex flex-row row">
                <div class="card-heading col-6 d-none d-md-block"></div>
                <div class="card-body col-6">
                    <h2 class="title">Change your password</h2>
                    <form method="POST" action="confirmpass.php">
        
                        <div class="input-group">
                            <input class="form-control mb-4" type="password" placeholder="enter new password" name="password">
                        </div>
                        <div class="input-group d-flex">
                            <input class="form-control w-100 mb-1" type="password" placeholder="confirm password" name="conf-password">
                            <span class="mb-3"><?php echo (isset($_SESSION['error'])?$_SESSION['error']:'');?></span> 
                           


                        </div>
                        <div class="mt-2">
                            <button class="btn ps-4 pe-4 pt-1 pb-1" type="submit">Confirm</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
   
</body>
</html>
<!-- end document--> 
<?php 

}  

else {
    echo "<h1> please login first to know if your password is not correct </h1>"; 
    header("Refresh: 3;URL=index.php");
   } 
?>