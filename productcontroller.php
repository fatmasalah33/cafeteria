<?php
 require 'connection.php';
if(isset($_POST['addproduct'])){

    $name           =   $_POST['name'];
    $price          =   $_POST['price']; 
    $cat_id          = $_POST['cat_id'];
    $imageName=$_FILES['imageuser']['name'];
    $strToArr=explode('.',$imageName);
          $extension=end($strToArr);
          $allowedExt=["jpg","jpeg","png","gif"];
          $tmp=$_FILES['imageuser']['tmp_name'];
          $fileSize=$_FILES['imageuser']['size'];
          if(in_array($extension,$allowedExt)&&$fileSize<=2097152){
              move_uploaded_file($tmp,'productphoto/'.$imageName);
            }
      $errors=[];
    

      
      function validation($input){

                              
        $input = str_replace(' ', '', $input);  
        $input = htmlspecialchars($input);
        return $input;

      }

      $name           = validation($name);
      $price          = validation($price);
      $cat_id      = validation($cat_id);
      if(empty($name)) {

        $errors["namepro"]= "name is Required filed";
        // $_SESSION['price']= "name is required filed";
        
      }
     elseif(strlen($name) < 3) {

        $errors["namepro"]= "name length must be more than 3character";
        // $_SESSION['name']= "name length must be more than 4character";
        
      }
      $pattern = '/^\d+(\.\d{2})?$/';
      if(empty($price)) {

        $errors["price"]= "price is Required filed";
        // $_SESSION['price']= "Price is required filed";
        
      }
      else  if (preg_match($pattern, $price) == '0') {
        $errors["price"]= "price must be only interger";
        
     }
     
      if(empty($cat_id)) {

        $errors["cat_id"]= "catogery is Required filed";
        // $_SESSION['cat_id']= "cat_id is required filed"
        
      }
    
      if(empty($_FILES['imageuser']['name'])) {

        $errors["imgpro"]= "Image  is Required filed";
        // $_SESSION['img']="Image  is Required filed ";
        
      }
      

      if(count($errors) > 0 ){
        session_start();
        $_SESSION['errors']= $errors;

        header("Location:product.php");
      }else{
       echo "succesfull data";
        $connection->query("insert into products(name,price,cat_id,img)values('$name' ,$price,$cat_id,'$imageName' )");


 header("Location:allproduct.php");     

        

      }

    }



  //Delete
  if(isset($_GET['id'])){

    if(isset($_GET['deleteproduct'])){

    
        echo  $_GET['id'];
        
      $data=$connection->query("delete from products where id={$_GET['id']}");
     header("location:allproduct.php");
    }
  }

  //Edit
  if(isset($_POST['edit']))
  {


    $result=  $connection->query("select * from products where id='{$_POST['id']}'");

    $row   = $result->fetch(PDO::FETCH_ASSOC);

    $name           =   $_POST['name'];
    $price         =   $_POST['price'];
   
    $cat_id           = $_POST['cat_id'];
  
    $quuery = "UPDATE products set name='$name', price='$price',cat_id='$cat_id' where id = '{$_POST['id']}'";

   $connection->query($quuery);
   echo "success uPdate";


    header("Location:allproduct.php");

    }
    

 
 

?>
