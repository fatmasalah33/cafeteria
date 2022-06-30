<?php
 require 'connection.php';
if(isset($_POST['adduser'])){

    $name           =   $_POST['name'];
    $email          =   $_POST['email'];
    $password       =   $_POST['password'];
    $confirmpassword =   $_POST['confirmpassword'];
    $roomnumber=        $_POST['roomnumber'];
    $ext=               $_POST['ext'];
    // $image          =   $_FILES['imageuser'] ;
    $errors=[];
    
    if(!empty($name) && !empty($email) && !empty($password) && !empty($confirmpassword) && !empty($_FILES['imageuser']) && !empty($roomnumber) && !empty($ext)){


      //--------------------------------Upload Image -------------------------

      // Get file info 
      $fileName = basename($_FILES["imageuser"]["name"]); 
      $fileType = pathinfo($fileName, PATHINFO_EXTENSION); 
      
      // Allow certain file formats 
      $allowTypes = array('jpg','png','jpeg','gif'); 

      if(in_array($fileType, $allowTypes)){ 

      $image = $_FILES['imageuser']['tmp_name']; 
      $imgContent = addslashes(file_get_contents($image)); 

      }
      // Move Image To Folder
      move_uploaded_file($_FILES["imageuser"]["tmp_name"],"./userphotos/".$_FILES["imageuser"]["name"]);


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

      $email = filter_var($email,FILTER_VALIDATE_EMAIL);

      if(!$email){

        $errors["email"]= "email Not Valid";
        

      }

      if(strlen($name) < 3) {

        $errors["name"]= "Name Not Valid";
        
      }

      if(strlen($password) < 3) {

        $errors["password"]= "password Not Valid";
        
      }

      if($password !== $confirmpassword) {

        $errors["confirmpassword"]= "Password Not Valid";
        

      }

      if(count($errors) > 0){

        header("Location:adduser.php?errors=$errors");
      }else{
       // echo "succesfull data";
        $connection->query("INSERT INTO `users`(`name`, `email`, `password`,`room_no`,`ext`,`img`) VALUES ('$name','$email','$password','$roomnumber','$ext','$imgContent')");

        header("Location:allusers.php");    

      }

    }else{

      $errors["required"]= "Please Enter All Fields";
      $errors = json_encode($errors);
     
      header("Location:adduser.php?errors=$errors");

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