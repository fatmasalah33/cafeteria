<?php 
session_start();
require "connection.php";   
$error=[];
 if (isset($_POST["login"])){
$adminEmails=$connection->prepare('SELECT * FROM admins where email=? ');
$adminEmails->execute([$_POST["email"]]);  
$adm_emails= $adminEmails -> fetch();  
$userEmails=$connection->prepare('SELECT * FROM users where email=? ');
$userEmails->execute([$_POST["email"]]);  
$user_emails= $userEmails -> fetch(); 
$admin_passwords=$connection->prepare('SELECT * FROM admins where password=? ');
$admin_passwords->execute([$_POST["password"]]);  
$admin_passwords= $admin_passwords-> fetch(); 
$userpasswords=$connection->prepare('SELECT * FROM users where password=? ');
$userpasswords->execute([$_POST["password"]]);  
$user_passwords= $userpasswords -> fetch();  
// $adminIds=$connection->prepare('SELECT * FROM admins where email=?');
// $adminIds->execute([$adm_emails["email"]]);  
// $adm_id= $adminIds -> fetch();
// $userIds=$connection->prepare('SELECT * FROM admins where email=?');
// $userIds->execute([$user_emails["email"]]);  
// $user_id= $userIds -> fetch(); 

     if(!empty($adm_emails)) { 
         var_dump($adm_emails["email"]);  
         if(!empty($admin_passwords))  
         { header("Location: admintesthome.php");
            $_SESSION['password']=""; 
            $_SESSION['email']=""; 
            $_SESSION['admin']=$adm_emails["id"]; 
            $_SESSION['user']="";
        }
         else {
            $_SESSION['password'] =" incorrect password "; 
            $_SESSION['email']="";     
            header("Location: index.php?id={$adm_emails["id"]} & table=admins "); 
         }
    }
    else{ 
        if(!empty($user_emails)) { 
            var_dump($user_emails["email"]);  
            if(!empty($user_passwords))  
            { header("Location: home.php");
                $_SESSION['password']=""; 
                $_SESSION['email']=""; 
                $_SESSION['user']=$user_emails["id"]; 
                $_SESSION['admin']="";
            }
            else {
               $_SESSION['password'] ="incorrect password";   
               $_SESSION['email']="";  
               header("Location: index.php?id={$user_emails["id"]} & table=users ");
            }
       }
      else {
      header("Location: index.php ");
      $_SESSION['email'] ="Please insert youe email"; 
      $_SESSION['password']=""; 
    }  
}
 }
?>