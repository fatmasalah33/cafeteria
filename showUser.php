<?php
session_start();
 if (!empty($_SESSION['admin'])) {
?>
<!DOCTYPE html>
<html>
<head>
  <?php require "headerlinks.php"?>
  <style>
     img[alt="adminimage"]{
            width: 4rem;
        }
     .table-havan{
          background-color: #bf9e8b;
         }
         .form-control{
          border: 2px solid #bf9e8b !important;
          background-color: transparent !important;
         }
         .bg-light{
        background-color: transparent !important;
        border: 2px solid #9b6349 !important;
      }
        
  </style>
</head>

<body> 
<?php require "adminnavbar.php" ?>  
<div class="container">

<?php require "connection.php"?>

<h2 class="title">Checkout</h2>
<div class="d-flex mb-2">
<input type="date" class='form-control w-25 text-dark ps-2 me-4' id="fromDate" name="fromDate" onchange="getDatefrom(this.value)">
<input type="date" class='form-control w-25 text-dark ps-2 me-4' id="toDate" name="toDate" onchange="getDateto(this.value)">
</div>
<form action=""> 
  <select name="users" class='class="pe-5 mb-4 bg-light w-25  p-1 px-3"' onchange="showUser(this.value)">
    <option value="">Select a user:</option>
    <?php
							$queryString=$connection->prepare('SELECT DISTINCT id,name FROM users');
							$queryString->execute();
							$users=$queryString->fetchAll();
								foreach ($users as $user){?>
            <option value="<?= $user['id']?>"><?= $user['name']?></option><?php }?>
  </select>
</form>
<br>
<div id="users">
  <table  class='text-center table table-bordered mb-1 mx-auto' >
    <tr class='table-havan'>
    <th>Name</th>
    <th>total_price</th>
                </tr>
<?php
							$queryString=$connection->prepare('SELECT users.id, users.name ,sum(orders.total_price) FROM users,orders WHERE users.id=orders.user_id  GROUP by users.id');
							$queryString->execute();
							$users=$queryString->fetchAll();
								foreach ($users as $user){
                  $idn=$user['id'];?>
               
               <tr class="text-center table-secondary" > <td><button class='btn me-2 btn_' onclick="showOrder('<?= $idn ?>',event)" >+</button><?= $user['name']?></td>
               <td><?= $user['sum(orders.total_price)']?></td></tr><?php }?>
   
                </table>
</div>

<div id="user_order"> 
 <?php
     foreach ($users as $user){ 
      $idn=$user['id'];
        echo "<div class='usr_ordr' id= '$idn'> </div>" ;
     }
 ?>

</div> 
</div>


<script>
  var date1;
  var date2;
  function getDatefrom(value){

   date1=value;
  }
  function getDateto(valueto){

  date2=valueto;
  }
  let order_div;
function showUser(str) {
 
  const xhttp = new XMLHttpRequest();
  xhttp.onload = function() {
    
      //  document.getElementById("users").innerHTML = "";
    order_div=document.getElementsByClassName("usr_ordr");
    for(i=0;i<order_div.length;i++){ 
      
      order_div[i].innerHTML="";
    } 
    // showOrder(str,event);
    document.getElementById("users").innerHTML = this.responseText;
  }
  xhttp.open("GET", "getUser.php?q="+str);
  xhttp.send();
}

  function showOrder(str,event) {

  if (str == "") {
    document.getElementById(str).innerHTML = "";
    return;
  }

  const xhttp = new XMLHttpRequest();
  xhttp.onload = function() {

if(event.target.innerHTML=="+"){
  btns_=document.getElementsByClassName("btn_"); 
  for(j=0;j<btns_.length;j++){
    btns_[j].innerHTML="+";
  } 
  divs=document.getElementsByClassName("usr_ordr");
  for(k=0;k<divs.length;k++){
    divs[k].innerHTML="";
  }

  event.target.innerHTML="-"
  document.getElementById(str).innerHTML = this.responseText;  
   
    }else if(event.target.innerHTML=="-"){
      event.target.innerHTML="+"
      document.getElementById(str).innerHTML = "";
    }
    
  }
  xhttp.open("GET", "getOrder.php?id="+str+"&datefrom="+date1+"&dateto="+date2);
  xhttp.send();
} 


function showProduct(orderId,event){
  // event.target.innerHTML="-"
  const xhttp = new XMLHttpRequest();
  xhttp.onload = function() { 
  //  console.log(event.target.innerHTML) ;
   if(event.target.innerHTML=="+"){
  event.target.innerHTML="-"
    document.getElementById("order_"+orderId).innerHTML = this.responseText; 
    //  console.log(orderId,event);
  }
    else{
      event.target.innerHTML="+"
      document.getElementById("order_"+orderId).innerHTML = ""; 
     
    }
  }
  xhttp.open("GET", "getProduct.php?id="+orderId);
  xhttp.send();

}

</script>
</body>
</html>
<?php 
 }
 else {
  header("Location:index.php");
 } 
 ?>