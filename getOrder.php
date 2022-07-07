<head>
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
<?php

$mysqli = new mysqli("localhost", "root", "", "cafeteria");
if($mysqli->connect_error) {
  exit('Could not connect');
}
// foreach(mysqli_query($db_connect, 'SELECT * FROM exampletable') as $row)
// {
//     echo $row['exampleitem'];
// }
// require "connection.php";
$idUser=$_GET['id'];
$datefrom=$_GET['datefrom'];
$dateto=$_GET['dateto'];
// $sql = "SELECT *
// FROM users WHERE id = ?";
if(!strtotime($datefrom)&&!strtotime($dateto)){
$query = "SELECT orders.id,  orders.order_date ,orders.total_price FROM orders WHERE orders.user_id=$idUser;"; 

$row=$mysqli->query($query) ; 
$orderdetails=$row->fetch_all();
  // var_dump($orderdetails[0]);
  echo "<table class='text-center table table-bordered mx-auto w-75'>";
  echo "<tr class='table-havan'>";
  echo "<th>order_date </th>";
  echo "<th>total_price</th>";
  echo "</tr>";
  foreach($orderdetails as $order ){
    $orderId=$order[0];
    echo "<tr class='text-center table-secondary'>";
    echo "<td> <button class='btn' onclick='showProduct($orderId,event)' >+</button>" .$order[1]. "</td>";
    echo "<td>" .$order[2]. "</td>";
    echo "</tr>"; 
    echo "<tr>"; 
    echo "<td> <div id='order_".$orderId."'> </div>   </td>";
    echo "</tr>";
  }
  echo "</table>";}
 else{
    $query2 = "SELECT orders.id, order_date ,total_price FROM orders WHERE user_id=$idUser and order_date between '$datefrom' and '$dateto' ;"; 

$row2=$mysqli->query($query2) ; 
$orderdetails2=$row2->fetch_all();
  // var_dump($orderdetails[0]);
  echo "<table class='text-center table table-bordered mb-1 mx-auto w-50''>";
  echo "<tr class='table-havan'>";
  echo "<th>order_date </th>";
  echo "<th>total_price</th>";
  echo "</tr>";
  foreach($orderdetails2 as $order2 ){
    $orderId=$order2[0];
    echo "<tr>";
    echo "<td> <button onclick='showProduct($orderId,event)'>+</button>" .$order2[1]. "</td>";
    echo "<td>" .$order2[2]. "</td>";
    echo "</tr>"; 
    echo "<tr>"; 
    echo "<td> <div id='order_".$orderId."'> </div>   </td>";
    echo "</tr>"; 

  }
  echo "</table>";
  }

?>