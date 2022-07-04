<?php  
$servername = "localhost";
$username = "root";
$password = "";
$dbname= "cafeteria";
$arr=$_POST; 
$array1 = array_chunk($arr, 3);
$totalPrice=$array1[0][0];
$notes=$array1[0][1];
$roomNum=$array1[0][2];
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname); 
$id=$_GET["id"];
$sql = "INSERT into orders (user_id,total_price,room_no,notes) values($id,$totalPrice,$roomNum,'$notes') ";

if ($conn->query($sql) === TRUE) {
  $last_id = $conn->insert_id; 
  
}
// var_dump($last_id);


 foreach($array1[1] as $item){
    
    $cleanData = json_decode($item); 
 
    // echo $cleanData->name; 
    $query = "select id from products where name='$cleanData->name' "; 

    $row=$conn->query($query) ; 
    $prod_id=$row->fetch_assoc();
    $qty= $cleanData->quantity ;   
    $idprod= $prod_id["id"]  ; 

    $query1 = "INSERT into order_details(product_id,order_id,qty  ) values($idprod,$last_id,$qty)";

    $conn->query($query1);
      
    


 }
 header("Location:home.php");

?>