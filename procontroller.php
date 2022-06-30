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

    

    

 $connection->query("insert into products(name,price,cat_id,img)values('$name' ,$price,$cat_id,'$imageName' )");


 header("Location:allproduct.php");     

      
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
