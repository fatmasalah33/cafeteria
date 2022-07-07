<?php
   session_start();
 if (!empty($_SESSION['admin'])) {
  ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cafetiria | Orders</title>
    <?php require "headerlinks.php"?>
  <style>
       img[alt="adminimage"]{
            width: 4rem;
        }
        .navcol{
            background-color: #eae7e5;
         }
         .table-havan{
          background-color: #bf9e8b;
         }
         table{
          width: 50rem !important;
         }
     </style>
</head>
<body>
  
<?php require 'adminnavbar.php'; ?>
<section class="section mt-5">
        <div class="container">
          <div class="row justify-content-center">
          </div>
            <div class="row">
                <div class="col-md-12">
                  <div class=" d-flex  row">
                    <h1 class=" text-center mt-5 justify-content-center title fs-1">Orders</h1>
                
<?php
require  "connection.php";
// SELECT users.*,orders.order_date FROM users,orders WHERE users.id=orders.user_id;
$queryString=$connection->prepare('SELECT users.id, users.ext,orders.room_no,users.name,orders.order_date ,orders.status ,orders.id as orderID ,orders.total_price FROM users,orders WHERE users.id=orders.user_id');
$queryString->execute();
$orders=$queryString->fetchAll();
// var_dump($orders);

foreach($orders as $order){
   $id=$order['id'];
   $orderId=$order['orderID'];
   echo "<table class='text-center table table-bordered mx-auto '>
   <tr class='table-havan'>
     <th>Order Date</th>
     <th>Name </th>
     <th>Room</th>
     <th>Ext.</th>
     <th>Action</th>
     <tr class='table-secondary'><td>";
   echo $order['order_date'];
   echo "</td><td>";
   echo $order['name'];
   echo "</td><td>";
   echo $order['room_no'];                                                
   echo "</td><td>";
   echo $order['ext']."</td>";
   echo "<td>". $order['status']."</td>"; 
   echo"<td><button onclick='update(event)'> Update status</button> <select  style='display:none;' class='selectStatus' name'updated_status' onchange='setnewstatus(this.value,$orderId)'>
   <option> select new status</option>
   <option value='out for delivery'> out for delivery</option> 
             <option value='done'>done</option>
   
   </td>";
   echo "</tr>";

  

$queryString=$connection->prepare("SELECT DISTINCT products.img,products.name,products.price ,order_details.qty FROM
products,order_details,orders,users WHERE products.id=order_details.product_id 
AND orders.id=order_details.order_id AND users.id=orders.user_id AND users.id=$id  AND orders.id=$orderId;");
$queryString->execute();
$orderspecfic=$queryString->fetchAll();
echo "<tr>";
foreach($orderspecfic as $orderdeta){
  echo "<td>";
  echo "<img style='width:50px ; height:50px' src=productphoto/".$orderdeta['img']."><br>";
  echo $orderdeta['name'].'<br>';
  echo  $orderdeta['price'].' LE<br>';
  echo $orderdeta['qty'].'</td>';
}
echo "</tr>";

echo "<tr class='text-end'><td colspan='5'><h4 class='title fs-5 p-0 m-0 pe-2 fw-bold'> Total: EGP ".$order['total_price']."<h4></td></tr>";
echo "</table><hr>";
// echo "<pre>";
// var_dump($orderspecfic);
// echo "</pre>";

}
// SELECT DISTINCT products.img,products.name,products.price ,order_details.qty FROM
//  products,order_details,orders,users WHERE products.id=order_details.product_id 
//  AND orders.id=order_details.order_id AND users.id=orders.user_id AND users.id=1;


?>


                    </div>
                </div>
            </div>
        </div>
</section>

 <!-- Bootstrap JavaScript Libraries --> 
 <script> 
       function update(e){  
        console.log(e) ; 
       
       e.target.nextElementSibling.style.display="inline"; 
        console.log("helllo");
       }  
       function setnewstatus(newStatus,id_order){
        console.log(newStatus); 
        const xhttp = new XMLHttpRequest(); 
       
        xhttp.open("GET", "updateStatus.php?newStatus="+newStatus+"&id_order="+id_order);
         xhttp.send();  
         location.reload()

       } 
       

</script>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html> 
<?php 
 }
 else {
  header("Location:index.php");
 } 
 ?>