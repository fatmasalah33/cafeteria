<?php
session_start();
 if (!empty($_SESSION['admin'])) {
?>
<!DOCTYPE html>
<html>
<style>
th,td {
  padding: 5px;
}
</style>
<body>  <?php require "connection.php"?>

<h2>The XMLHttpRequest Object</h2>
<input type="date" id="fromDate" name="fromDate" onchange="getDatefrom(this.value)">
<input type="date" id="toDate" name="toDate" onchange="getDateto(this.value)">
<form action=""> 
  <select name="users"  onchange="showUser(this.value)">
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
  <table border="2">
    <tr>
    <th>Name</th>
    <th>total_price</th>
                </tr>
<?php
							$queryString=$connection->prepare('SELECT users.id, users.name ,sum(orders.total_price) FROM users,orders WHERE users.id=orders.user_id  GROUP by users.id');
							$queryString->execute();
							$users=$queryString->fetchAll();
								foreach ($users as $user){
                  $idn=$user['id'];?>
               
               <tr> <td><button  onclick="showOrder('<?= $idn ?>',event)" >+</button><?= $user['name']?></td>
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
  echo " <h1>  not allowed to anyone except admin </h1>"; 
  header("Refresh: 3;URL=index.php");
 } 
 ?>