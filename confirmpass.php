<?php

require "connection.php";  
session_start();
$password=$_POST['password'];
$confpassword=$_POST['conf-password'];
if ($password==$confpassword)
{
    $updatepass=$connection->prepare("UPDATE  {$_SESSION ["table_update"]} SET password=?  WHERE id=? ");
    $updatepass->execute([ $_POST ["password"],$_SESSION ["id_update"] ]);
    echo $_SESSION["table_update"] , $_POST["password"] ,$_SESSION["id_update"]; 
    header("Location: login.php");
}
else
{
    // echo " The Password and Confirm Password is not the same";
    header("Location: updatepassword.php");

}

?>