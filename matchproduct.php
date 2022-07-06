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
$charp=$_GET['c'];

$query = "SELECT  products.name ,products.price ,products.img ,products.id from products WHERE products.name LIKE '%$charp%';"; 

$row=$mysqli->query($query) ; 
$orderdetails=$row->fetch_all();
  // var_dump($orderdetails[0]);
 
  foreach($orderdetails as $order ){
  
  

 ?>
<div class="col-md-3 col-6">
<div class="text-center products">
<img onclick="getDetails(<?= $order[3]?>,'<?= $order[0] ?>',<?=$order[1]?>,event)"  id="<?= $order[3] ?>"  src="<?='productphoto/'.$order[2]?>" class="mb-2 mt-2 image" alt="...">
<div class="text-center">
<p class="card-text"><?= $order[0]?></p>
<span>LE. </span><span><?= $order[1]?></span>  
</div>
</div>

</div>
<?php }?>


