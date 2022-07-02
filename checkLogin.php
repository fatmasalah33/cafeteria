<?php
require "connection.php";  
session_start();

$allAdmins=$connection->prepare('SELECT * FROM admins');
$allAdmins->execute();  
$admins= $allAdmins -> fetchAll();

$allUsers=$connection->prepare('SELECT * FROM users');
$allUsers->execute(); 
$users= $allUsers->fetchAll(); 

foreach($admins as $admin){

if ($_POST["email"]==$admin["email"]) {
 if($_POST["password"]==$admin["password"]) {
     header("Location: homeAdmin.php");
 } 
 else {
     $id=$admin["id"]; 
     $table="admins" ; 
     $_SESSION['password']= "Password is not valid";
     header("Location: login.php?id={$id}&table={$table}"); 
      
 }
}  
else { 
    $_SESSION['email']= "Email is not valid";

    header("Location: login.php");

} 
}
foreach($users as $user) {

 if($_POST["email"]==$user["email"]){
     if($_POST["password"]==$user["password"]) {
        
         header("Location: homeUser.php");
     } 
     else {
         $id=$user["id"]; 
         $table="users"; 
         $_SESSION['password']= "Password is not valid";

         header("Location: login.php?id={$id}&table={$table}"); 
          
     }   
 } 
 


}  



?>