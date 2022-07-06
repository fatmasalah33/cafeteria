<?php
//Delete order
require "connection.php";
if(isset($_GET['or_id'])){

    if(isset($_GET['deleteorder'])){

    
        //echo  $_GET['or_id'];
        
      $data=$connection->query("delete from orders where id={$_GET['or_id']}");
      $data1=$connection->query("delete from order_details where order_id={$_GET['or_id']} ");


     header("location:myOrders.php");
    }
  }
?>