<?php
require  "connection.php";
// SELECT users.*,orders.order_date FROM users,orders WHERE users.id=orders.user_id;
$queryString=$connection->prepare('SELECT users.*,orders.order_date ,orders.status ,orders.id as orderID ,orders.total_price FROM users,orders WHERE users.id=orders.user_id');
$queryString->execute();
$orders=$queryString->fetchAll();
// var_dump($orders);

foreach($orders as $order){
   $id=$order['id'];
   $orderId=$order['orderID'];
   echo "<table>
   <tr>
     <th>order data</th>
     <th>name </th>
     <th>Room</th>
     <th>Ext</th>
     <th>status</th>
     <tr><td>";
   echo $order['order_date'];
   echo "</td><td>";
   echo $order['name'];
   echo "</td><td>";
   echo $order['room_no'];
   echo "</td><td>";
   echo $order['ext']."</td>";
   echo "<td>". $order['status']."</td>";
   echo "</tr>";

$queryString=$connection->prepare("SELECT DISTINCT products.img,products.name,products.price ,order_details.qty FROM
products,order_details,orders,users WHERE products.id=order_details.product_id 
AND orders.id=order_details.order_id AND users.id=orders.user_id AND users.id=$id  AND orders.id=$orderId;");
$queryString->execute();
$orderspecfic=$queryString->fetchAll();
foreach($orderspecfic as $orderdeta){
    echo " <tr>
    <th>name of product</th>
    <th>price</th>
    <th>quntity</th>
    <th>img</th></tr>
    <tr><td>";
  echo $orderdeta['name'];
  echo "</td><td>";
  echo  $orderdeta['price'];
  echo "</td><td>".$orderdeta['qty']."</td>";
  echo "<td><img style='width:50px ; height:50px' src=prouductphotos/".$orderdeta['img']."></td></tr>";

    
}

echo "<tr><td><h4> total price:".$order['total_price']."<h4></td></tr>";
echo "</table><hr>";
// echo "<pre>";
// var_dump($orderspecfic);
// echo "</pre>";

}
// SELECT DISTINCT products.img,products.name,products.price ,order_details.qty FROM
//  products,order_details,orders,users WHERE products.id=order_details.product_id 
//  AND orders.id=order_details.order_id AND users.id=orders.user_id AND users.id=1;


?>