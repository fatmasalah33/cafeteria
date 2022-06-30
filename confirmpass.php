<?php

require "connection.php";  
session_start();
$updatepass=$connection->prepare("UPDATE  {$_SESSION ["table_update"]} SET password=?  WHERE id=? ");
$updatepass->execute([ $_POST ["password"],$_SESSION ["id_update"] ]);
 echo $_SESSION["table_update"] , $_POST["password"] ,$_SESSION["id_update"]; 
 header("Location: login.php");
?>