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
  echo "<table border='2'>";
  echo "<tr>";
  echo "<th>order_date </th>";
  echo "<th>total_price</th>";
  echo "</tr>";
  foreach($orderdetails as $order ){
    $orderId=$order[0];
    echo "<tr>";
    echo "<td> <button onclick='showProduct($orderId,event)' >+</button>" .$order[1]. "</td>";
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
  echo "<table border='2'>";
  echo "<tr>";
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