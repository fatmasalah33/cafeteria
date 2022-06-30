<?php
require "connection.php";  
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
     header("Location: login.php?id={$id}&table={$table}"); 
      
 }
}  
else { 
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
         header("Location: login.php?id={$id}&table={$table}"); 
          
     }   
 } 

}  



?>