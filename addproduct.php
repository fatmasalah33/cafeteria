<?php
require "connection.php";
 $connection->query("insert into products(name,price,img,cat_id)values('{$_POST['name']}','{$_POST['price']}',{$_FILES['imageuser']['name']},'{$_POST['cat_id']}')");



header("Location:allproduct.php");

?>
