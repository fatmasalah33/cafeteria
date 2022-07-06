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
$idOrder=$_GET['id'];

$query = "SELECT order_details.qty ,products.name,products.img FROM order_details,products WHERE products.id=order_details.product_id AND order_details.order_id=$idOrder;"; 

$row=$mysqli->query($query) ; 
$orderdetails=$row->fetch_all();
  // var_dump($orderdetails[0]);
  echo "<table class='text-center table table-bordered mx-auto w-75'>";
  echo "<tr class='table-havan'>";
  echo "<th>qty </th>";
  echo "<th>name</th>";
  echo "<th>img</th>";
  echo "</tr>";
  foreach($orderdetails as $order ){
  
    echo "<tr class='text-center table-secondary'>";
    echo "<td> " .$order[0]. "</td>";
    echo "<td>" .$order[1]. "</td>";
    echo "<td> <img src='productphoto/$order[2] ' style='width:50px;height:50px'/> </td>";
    echo "</tr>";

  }
  echo "</table>";


?>