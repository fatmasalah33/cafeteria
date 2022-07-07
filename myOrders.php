<?php
session_start();
 if (!empty($_SESSION['user'])) {
    $iduserin=$_SESSION['user'];
    require 'connection.php';
    $queryString=$connection->prepare('SELECT name , img FROM `users` WHERE id=?;');
    $queryString->execute([$_SESSION['user']]);
    $user_data=$queryString->fetch();
    $user_name=$user_data['name'];
    $user_image=$user_data['img'];
?>
<!DOCTYPE html>
<html>
<head>
  <title>Cafeteia | My orders</title>
  <?php require "headerlinks.php"?>
  <style>
     img[alt="userimage"]{
            width: 4rem;
        }
        .table-havan{
          background-color: #bf9e8b;
         }
         .form-control{
          border: 2px solid #bf9e8b;
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
          <a class="nav-link active" aria-current="page" href="myOrders.php">My Orders</a>
        </li>
      </ul>
      <div>
      <span class="navbar-text me-2" id="username">
        <img src="<?='userphotos/'.$user_image ?>" class="rounded-circle border" alt="userimage" id="userimage">
      </span> 
      <span class="navbar-text me-auto" id="username">
    <?= $user_name ?>
      </span>
      </div>
      <a class=" active" aria-current="page" style="text-decoration: none; color:#9b6349;" href="logout.php"> | Logout</a>
    </div>
   </div>
 </nav>
   </div> 

        
<div class="container mt-5">
<h2 class="title">My Orders</h2>
<div class="d-flex w-100 mx-auto mb-4">
<input type="date" class="form-control w-25 text-dark ps-2 me-4" id="fromDate" name="fromDate" onchange="getDatefrom(this.value)">
<input type="date" class="form-control w-25 ps-2 text-dark" id="toDate" name="toDate" onchange="getDateto(this.value,<?= $iduserin ?>)">
</div>

<div id="orders">
<table  class="text-center table table-bordered mb-1 mx-auto ">
<tr class='table-havan' >
        <th>Order ID</th>
        <th>User ID</th>
       <th>Order date</th>
       <th>Order Status</th>
       <th>Total Price</th>
         <th >Action</th>
                                </tr>
                                <?php
       require 'connection.php';
     $queryString=$connection->prepare("SELECT * from orders WHERE   user_id=?");
        $queryString->execute([$_SESSION['user']]);
        $orders=$queryString->fetchAll();

        foreach ($orders as $ord){
          $idneed= $ord['id']; ?>


          <tr  class="text-center table-secondary">
              <th ><button class='btn me-2' onclick="showProduct(<?= $idneed ?>,event)">+</button><?= $ord['id']?></th>
              <td><?= $ord['user_id']?></td>
              <td><?= $ord['order_date']?></td>
              <td><?= $ord['status']?> </td>
              <td><?= $ord['total_price']?> L.E</td>
              <?php
                if($ord['status']==='processing')
                {
                  
                    echo "<td><a class='text-danger' href='deleteorder.php?or_id={$ord['id']}&deleteorder'>
                    <i class='fa-solid fa-trash '></i>
                    </a></td>";
               
                        ?>
                        <?php
                }
                else{
                    echo "<td> </td>";
                }
                ?>
                </tr><?php }?>
</table>
</div>
<div id="products">

</div>
</div>


<script>
var date1;
  var date2;
  function getDatefrom(value){

    date1=value;
  }
  function getDateto(valueto,str){

  date2=valueto;
  
  let newdiv;
  let i=0
  const xhttp = new XMLHttpRequest();
  xhttp.onload = function() {
  
    
    document.getElementById("orders").innerHTML = this.responseText; 
    document.getElementById("products").innerHTML="";

  }
  xhttp.open("GET", "getOrder.php?id="+str+"&datefrom="+date1+"&dateto="+date2);
  xhttp.send();
  } 
  function showProduct(orderId,event){
//    event.target.innerHTML="-"
  const xhttp = new XMLHttpRequest();
  xhttp.onload = function() { 
    if(event.target.innerHTML=="+"){
       btn=document.getElementsByTagName('button')
        for(i=0;i<btn.length;i++){
            btn[i].innerHTML='+'
        }
        event.target.innerHTML="-"
    document.getElementById("products").innerHTML = this.responseText; 
 
  } else{
      event.target.innerHTML="+"
      document.getElementById("products").innerHTML = ""; 
      
    }
}
  xhttp.open("GET", "getProduct.php?id="+orderId);
  xhttp.send();

}

</script>
</body>
</html>
<?php 
 }
 else {
  header("Location:index.php");
 } 
 ?>