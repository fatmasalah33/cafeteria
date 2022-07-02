<?php
 require 'connection.php';



if(isset($_POST['addcatogery'])){
 
  $name= $_POST['name']; 
  $connection->query("insert into cats(name)values('$name')");
  header("Location:allcatogery.php");   }
  
//   $errors=[];
    
//   if(!empty($name)){


    
//     -
    
//     // Validation Inputs
//     function validation($data){

//                                         // Remove Spaces From Start Or The End OF The Word.
//       $data = str_replace(' ', '', $data);         // Remove All Spaces From Any Place Of The Word.
//       $data = htmlspecialchars($data);
//       return $data;

//     }

//     $name           = validation($name);
  
   
//     }

//     if(strlen($name) < 3) {

//       $errors["name"]= "Name Not Valid";
      
//     }

//     if(strlen($password) < 3) {

//       $errors["password"]= "password Not Valid";
      
//     }

   
//     if(count($errors) > 0){

//       header("Location:adduser.php?errors=$errors");
//     }else{
//      // echo "succesfull data";
//       $connection->query("INSERT INTO `users`(`name`, `email`, `password`,`room_no`,`ext`,`img`) VALUES ('$name','$email','$password','$roomnumber','$ext','$imageName')");

//       header("Location:allcatogery.php");    

//     }

//   }else{

//     $errors["required"]= "Please Enter All Fields";
//     $errors = json_encode($errors);
   
//     header("Location:adduser.php?errors=$errors");

//   }

// }
 
 
  



      



  //Delete
  if(isset($_GET['id'])){

    if(isset($_GET['deletecatogery'])){

    
        echo  $_GET['id'];
        
      $data=$connection->query("delete from cats where id={$_GET['id']}");
     header("location:allcatogery.php");
    }
  }

  //Edit
  if(isset($_POST['edit']))
  {


    $result=  $connection->query("select * from  cats where id='{$_POST['id']}'");

    $row   = $result->fetch(PDO::FETCH_ASSOC);

    $name  =   $_POST['name'];
   
  
    $quuery = "UPDATE cats set name='$name' where id = '{$_POST['id']}'";

   $connection->query($quuery);
   echo "success uPdate";


    header("Location:allcatogery.php");

    }
    

 
 

?>
