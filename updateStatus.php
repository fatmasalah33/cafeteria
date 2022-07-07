
<?php
require  "connection.php";
$idOrder=$_GET['id_order'];
$newstatus=$_GET['newStatus'];
echo $newstatus;
echo $idOrder;
$queryString=$connection->prepare("update  orders set status ='$newstatus' where id=$idOrder");
							$queryString->execute();
				 	  	
  header("location:ordersall.php"); 

// echo $orderstaus['status'];
?>
