<?php
require "connection.php";   
$error=[];
 if (isset($_POST["login"])){
$adminEmails=$connection->prepare('SELECT * FROM admins where email=? ');
$adminEmails->execute([$_POST["email"]]);  
$adm_emails= $adminEmails -> fetchAll();  
$userEmails=$connection->prepare('SELECT * FROM users where email=? ');
$userEmails->execute([$_POST["email"]]);  
$user_emails= $userEmails -> fetchAll(); 
$admin_passwords=$connection->prepare('SELECT * FROM admins where password=? ');
$admin_passwords->execute([$_POST["password"]]);  
$admin_passwords= $admin_passwords-> fetchAll(); 
$userpasswords=$connection->prepare('SELECT * FROM users where password=? ');
$userpasswords->execute([$_POST["password"]]);  
$user_passwords= $userpasswords -> fetchAll();  
     if(!empty($adm_emails)) { 
         var_dump($adm_emails);  
         if(!empty($admin_passwords))   header("Location: homeAdmin.php");
         else {
            $_SESSION['password'] ="password is not valid";  
            header("Location: login.php?email={$adm_emails}& table=admins ");
         }
    }
    else{ 
        if(!empty($user_emails)) { 
            var_dump($user_emails);  
            if(!empty($user_passwords))   header("Location: homeuser.php");
            else {
               $_SESSION['password'] ="password is not valid";  
               header("Location: login.php?email={$user_emails}& table=users ");
            }
       }
        $_SESSION['email'] ="email is not valid";
    } 
}
?>