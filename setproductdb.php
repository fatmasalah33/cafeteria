<?php  
$servername = "localhost";
$username = "root";
$password = "";
$dbname= "cafeteria";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname); 
$id=$_GET["id"];
$sql = "INSERT into orders (user_id,status,total_price,room_no,notes)
           values($id,'processing',1900,6,'no notes') ";

if ($conn->query($sql) === TRUE) {
  $last_id = $conn->insert_id; 
  var_dump($last_id);
}
// require 'connection.php'; 
var_dump($_GET["id"]); 

// $order_insert=$connection->prepare('INSERT into orders (user_id,status,total_price,room_no,notes) values(?,"processing",1900,6,"no notes") ');
// $order_insert->execute([$_GET["id"]]);  
// $stmt = $connection->prepare("...");
// $stmt->execute();
// $id = $connection->lastInsertId();
// var_dump($id);
$arr=$_POST;  
echo"<pre>";
//  var_dump($arr); 
 echo"</pre>"; 
 foreach($arr as $item){
    $tempData = str_replace("\\", "",$item);
    $cleanData = json_decode($item); 
    // echo $cleanData->name; 
    $query = "select id from products where name='$cleanData->name' "; 

    $row=$conn->query($query) ; 
    $prod_id=$row->fetch_assoc();
    // echo $cleanData->quantity ;   
    echo $prod_id["id"]  ;  
    // $sql = "INSERT into order_details( ) values(5,3,2)";
     // $product_insert=$connection->prepare('INSERT into order_details values(5,3,2)');
     // $product_insert->execute();  


 }

?>