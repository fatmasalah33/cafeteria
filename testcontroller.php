<?php
 require 'connection.php';
 session_start();

if(isset($_POST['adduser'])){

    $name           =   $_POST['name'];
    $email          =   $_POST['email'];
    $password       =   $_POST['password'];
    $confirmpassword =   $_POST['confirmpassword'];
    $roomnumber=        $_POST['roomnumber'];
    $ext=               $_POST['ext'];
    $errors=[];
    


      //--------------------------------Upload Image -------------------------

      $imageName=$_FILES['imageuser']['name'];
      $strToArr=explode('.',$imageName);
      $extension=end($strToArr);
      $allowedExt=["jpg","jpeg","png","gif"];
      $tmp=$_FILES['imageuser']['tmp_name'];
      $fileSize=$_FILES['imageuser']['size'];
      if(in_array($extension,$allowedExt)&&$fileSize<=2097152){
          move_uploaded_file($tmp,'userphotos/'.$imageName);
        }
     


      //------------------------------End Upload And Move Image-------------------------
      
      // Validation Inputs
      function validation($data){

        //$data = trim($data);                         Remove Spaces From Start Or The End OF The Word.
        $data = str_replace(' ', '', $data);         // Remove All Spaces From Any Place Of The Word.
        $data = htmlspecialchars($data);
        return $data;

      }

      $name           = validation($name);
      $email          = validation($email);
      $password       = validation($password);
      $confirmpassword = validation($confirmpassword);
     

      $email1 = "/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix";
      $name1="/^[a-zA-Z\s]+$/";
      
      if(empty($email)) {

        $errors["email"]= "Email is Required";
        // $_SESSION['password']= "Password Not Valid";
        
      }

      else if(!preg_match($email1, $email)){

        $errors["email"]= "Email Not Valid";
        // $_SESSION['email']= "email Not Valid ";
        

      }
      if(empty($name)) {

        $errors["name"]= "Name is Required";
        // $_SESSION['password']= "Password Not Valid";
        
      }

      else if(strlen($name) < 3 ) {

        $errors["name"]= "Name Not Valid";
        // $_SESSION['name']= "Name Not Valid";
        
      }
      
      else if (!preg_match($name1, $name)) {

        $errors["name"]= "Name must  be a character only";
        // $_SESSION['name']= "Name Not Valid";
        
       

        
      }
      if(empty($password)) {

        $errors["password"]= "Password is Required";
        // $_SESSION['password']= "Password Not Valid";
        
      }

      if(strlen($password) < 3) {

        $errors["password"]= "password Not Valid";
        // $_SESSION['password']= "Password Not Valid";
        
      }
      
      if(empty($confirmpassword)) {

        $errors["confirmpassword"]= "ConfirmPassword is Required";
        // $_SESSION['password']= "Password Not Valid";
        
      }
      
      if($password !== $confirmpassword) {

        $errors["confirmpassword"]= "Password Not Valid";
        // $_SESSION['confirmpassword']= "The Password and ConfirmPassword not the same";
        

      }
      if(empty($roomnumber)) {

        $errors["roomnumber"]= "RoonNO is Required";
        // $_SESSION['password']= "Password Not Valid";
        
      }
      if(empty($ext)) {

        $errors["ext"]= "EXT is Required";
        // $_SESSION['password']= "Password Not Valid";
        
      }
      if(empty($_FILES['imageuser']['name'])) {

        $errors["img"]= "Image  is Required";
        // $_SESSION['password']= "Password Not Valid";
        
      }
      

      if(count($errors) > 0 ){
        $_SESSION['errors']= $errors;

        header("Location:adduser.php");
      }
      else{
        $row=$connection->query("SELECT email from users where email='$email'");
        $checkexist=$row->rowCount();
        if(!empty($checkexist)){
          // var_dump($checkexist);
          $errors["email"]= "Email is Exist";
          $_SESSION['errors']= $errors;
          header("Location:adduser.php");

        }
        else
        {
          echo "succesfull data";
          //$connection->query("INSERT INTO `users`(`name`, `email`, `password`,`room_no`,`ext`,`img`) VALUES ('$name','$email','$password','$roomnumber','$ext','$imageName')");
  
          //header("Location:allusers.php");
        }
          

      }

}
    
  


  //Delete
  if(isset($_GET['id'])){

    if(isset($_GET['deleteuser'])){

    
        //echo  $_GET['id'];
        
     $data=$connection->query("delete from users where id={$_GET['id']}");
     header("location:allusers.php");
    }
  }

  //Edit
  if(isset($_POST['edit']))
  {


    $result=  $connection->query("select * from users where id='{$_POST['id']}'");

    $row   = $result->fetch(PDO::FETCH_ASSOC);

    $name           =   $_POST['name'];
    $email          =   $_POST['email'];
    $password       =   $_POST['password'];
    $roomnumber=        $_POST['roomnumber'];
    $ext=               $_POST['ext'];
  
    $quuery = "UPDATE users set name='$name', email='$email', password='$password' , room_no='$roomnumber' ,ext='$ext' where id = '{$_POST['id']}'";

   $connection->query($quuery);
   //echo "success ubdate";
    header("Location:allusers.php");
    }
?>