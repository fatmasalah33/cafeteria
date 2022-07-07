<?php
 
require "connection.php";  
session_start();  

$_SESSION['error']="";
$password=$_POST['password'];
$confpassword=$_POST['conf-password'];
if ($password==$confpassword)
{ 
    $updatepass=$connection->prepare("UPDATE  {$_SESSION ["table_update"]} SET password=?  WHERE id=? ");
    $updatepass->execute([ $_POST ["password"],$_SESSION ["update_id"] ]); 
    $_SESSION['password']="";
    header("Location: index.php");
}
else if($password!=$confpassword)
{
    $_SESSION['error']="Password dosen't match";
    header("Location: updatepassword.php"); 
    $_SESSION['password']="";
}

?>