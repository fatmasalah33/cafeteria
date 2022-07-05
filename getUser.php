<?php

$mysqli = new mysqli("localhost", "root", "", "cafeteria");
if($mysqli->connect_error) {
  exit('Could not connect');
}
// require "connection.php";
$idUser=$_GET['q'];
// $sql = "SELECT *
// FROM users WHERE id = ?";

if(!empty($idUser)){


$sql="SELECT  users.name ,sum(orders.total_price) FROM users,orders WHERE users.id=orders.user_id and users.id=? GROUP by users.id;";
$stmt = $mysqli->prepare($sql);
$stmt->bind_param("s", $_GET['q']);
$stmt->execute();
$stmt->store_result();
// $stmt->bind_result($id,$name,$email,$password,$room_no,$ext,$img);
$stmt->bind_result($name,$total_price);
$stmt->fetch();

$stmt->close();


echo "<table border='2'>";
echo "<tr>";
echo "<th>order_date </th>";
echo "<th>total_price</th>";
echo "</tr>";
  echo "<tr>";
  echo "<td><button onclick='showOrder($idUser,event)'>+</button>" . $name. "</td>";
  echo "<td>" .$total_price. "</td>";
  echo "</tr>";


echo "</table>";
}else{
  $query="SELECT users.id, users.name ,sum(orders.total_price) FROM users,orders WHERE users.id=orders.user_id  GROUP by users.id;";
  $row=$mysqli->query($query) ; 
  $orderdetails=$row->fetch_all();
    // var_dump($orderdetails[0]);
    echo "<table border='2'>";
    echo "<tr>";
    echo "<th>order_date </th>";
    echo "<th>total_price</th>";
    echo "</tr>";
    
    foreach($orderdetails as $order ){
      $id=$order[0];
      echo "<tr>";
  echo "<td><button onclick='showOrder($id,event)'  >+</button>" . $order[1]. "</td>";
  echo "<td>" .$order[2]. "</td>";
  echo "</tr>";
  
    }



echo "</table>";

}
?>

