<?php

require "connection.php";  
session_start(); 
$_SESSION['error']="";
$password=$_POST['password'];
$confpassword=$_POST['conf-password'];
if ($password==$confpassword)
{ 
    $updatepass=$connection->prepare("UPDATE  {$_SESSION ["table_update"]} SET password=?  WHERE email=? ");
    $updatepass->execute([ $_POST ["password"],$_SESSION ["email_data"] ]); 
    $_SESSION['password']="";
    header("Location: login.php");
}
else if($password!=$confpassword)
{
    $_SESSION['error']="not the same";
    header("Location: updatepassword.php"); 
    $_SESSION['password']="";
}

?>