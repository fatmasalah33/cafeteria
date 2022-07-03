<?php
 require 'connection.php';



if(isset($_POST['addcatogery'])){
 
  $name= $_POST['name']; 
  $errors=[];
    
  
  // Validation Inputs
  function validation($input){

                        
    $input = str_replace(' ', '', $input);        
    $input= htmlspecialchars($input);
    return $input;

  }

  $name = validation($name);
  if(empty($name))
  {$errors["name"]= "Name is arequired field";

  }

  elseif(strlen($name) < 3) {

    $errors["name"]= "Name length must be more than 3 character";
    // $_SESSION['name']= "Name length must be more than 3 character";
    
  }
  
  

  if(count($errors) > 0 ){
    session_start();
    $_SESSION['errors']= $errors;

    header("Location:catogery.php");
  }else{
   echo "succesfull data";
    $connection->query("insert into cats(name)values('$name')");
  header("Location:allcatogery.php");
  

  }

}
  

 
  



      



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
