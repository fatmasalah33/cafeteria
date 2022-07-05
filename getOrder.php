<?php

$mysqli = new mysqli("localhost", "root", "", "cafeteria");
if($mysqli->connect_error) {
  exit('Could not connect');
}
$idUser=$_GET['id'];
$datefrom=$_GET['datefrom'];
$dateto=$_GET['dateto'];
// foreach(mysqli_query($db_connect, 'SELECT * FROM exampletable') as $row)
// {
//     echo $row['exampleitem'];
// }
// require "connection.php";

// $sql = "SELECT *
// FROM users WHERE id = ?";

if(!strtotime($datefrom)&& !strtotime($dateto)){
  $query = "SELECT orders.order_date ,orders.total_price FROM orders WHERE orders.user_id=$idUser;"; 

$row=$mysqli->query($query) ; 
$orderdetails=$row->fetch_all();
  // var_dump($orderdetails[0]);
  echo "<table border='2'>";
  echo "<tr>";
  echo "<th>order_date </th>";
  echo "<th>total_price</th>";
  echo "</tr>";
  foreach($orderdetails as $order ){
    echo "<tr>";
    echo "<td>" .$order[0]. "</td>";
    echo "<td>" .$order[1]. "</td>";
    echo "</tr>";

  }
  echo "</table>";
}

 else {
 

    $query2 = "SELECT order_date ,total_price FROM orders WHERE user_id=$idUser and order_date between '$datefrom' and '$dateto' ;"; 

$row2=$mysqli->query($query2) ; 
$orderdetails2=$row2->fetch_all();
  // var_dump($orderdetails[0]);
  echo "<table border='2'>";
  echo "<tr>";
  echo "<th>order_date </th>";
  echo "<th>total_price</th>";
  echo "</tr>";
  foreach($orderdetails2 as $order2 ){
    echo "<tr>";
    echo "<td>" .$order2[0]. "</td>";
    echo "<td>" .$order2[1]. "</td>";
    echo "</tr>";

  }
  echo "</table>";
  }

?>