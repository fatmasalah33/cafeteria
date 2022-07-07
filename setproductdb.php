<?php    
session_start(); 

$servername = "localhost";
$username = "root";
$password = "";
$dbname= "cafeteria";
$arr=$_POST; 
$array1 = array_slice($arr, 0, 3);
// var_dump($array1);
$totalPrice=$array1["price"];
$notes=$array1["notes"];
$roomNum=$array1["noroom"];
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname); 
$id=$_GET["id"];
$sql = "INSERT into orders (user_id,total_price,room_no,notes) values($id,$totalPrice,$roomNum,'$notes') ";

if ($conn->query($sql) === TRUE) {
  $last_id = $conn->insert_id; 
  
}
// var_dump($last_id);

$array2=array_slice($arr, 3);
$array2 = array_chunk($array2, 1);


for ($i=0;$i<count($array2);$i++){
 foreach($array2[$i] as $item){
    
    $cleanData = json_decode($item); 

    echo $cleanData->name; 
    $query = "select id from products where name='$cleanData->name' "; 

    $row=$conn->query($query) ; 
    $prod_id=$row->fetch_assoc();
    $qty= $cleanData->quantity ;   
    $idprod= $prod_id["id"]  ; 

    $query1 = "INSERT into order_details(product_id,order_id,qty  ) values($idprod,$last_id,$qty)";

    $conn->query($query1);
      
    
  }
} 
if (!empty($_SESSION["user"]))   header("Location:homeUser.php"); 
else if(!empty($_SESSION["admin"]))    header("Location:homeAdmin.php"); 
  

?>