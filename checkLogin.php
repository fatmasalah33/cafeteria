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

     if(!empty($adm_emails)) { 
         var_dump($adm_emails["email"]);  
         if(!empty($admin_passwords))  
         { header("Location: home.php");
            $_SESSION['password']=""; 
            $_SESSION['email']="";
        }
         else {
            $_SESSION['password'] =" incorrect password "; 
            $_SESSION['email']="";  
            header("Location: login.php?email={$adm_emails["email"]}& table=admins "); 
         }
    }
    else{ 
        if(!empty($user_emails)) { 
            var_dump($user_emails["email"]);  
            if(!empty($user_passwords))  
            { header("Location: home.php");
                $_SESSION['password']=""; 
                $_SESSION['email']="";
            }
            else {
               $_SESSION['password'] ="incorrect password";   
               $_SESSION['email']="";  
               header("Location: login.php?email={$user_emails["email"]}& table=users ");
            }
       }
      else {
      header("Location: login.php ");
      $_SESSION['email'] ="Please insert youe email"; 
      $_SESSION['password']=""; 
    }  
}
 }
?>