<html>

<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/style.css">
  <script src="js/jquery-3.5.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>

  <link rel="stylesheet" href="css/all.min.css">
</head>

<body>
<?php
    
    require 'connection.php';?>
<div class="container">
    <div class="row">
        
        <div class="col-md-3" >
       
          <div id="myDIV">

          </div>
          <form action=<?="setproductdb.php?id=2"?> method="post" onsubmit="setorder()">
        <input type="hidden" name="price" value="" id="totalprice">
        <input type="text" name="notes" placeholder="notes" ><br>

        <select name="noroom" id="roomno">
        <?php
							$queryString=$connection->prepare('SELECT DISTINCT room_no FROM users');
							$queryString->execute();
							$users=$queryString->fetchAll();
								foreach ($users as $user){?>
            <option value="<?= $user['room_no']?>"><?= $user['room_no']?></option><?php }?>
            </div>
        </select>
        <input type="submit" value="confirm">
        </form>
        <span id="tottal"></span>
        </div>
        <div class="col-md-9" >
            <div class="container">
                <div class="row">
                <?php
							$queryString=$connection->prepare('SELECT * FROM products');
							$queryString->execute();
							$products=$queryString->fetchAll();
								foreach ($products as $product){
                                    $myId=$product['id'];
                                    $productName=$product['name'];
                                    $productPrice=$product['price'];?>
                    <div class="col-md-4">
                    <div class="card" style="width: 18rem;">
  <img onclick="getDetails(<?= $myId ?>,'<?= $productName ?>',<?=$productPrice?>,event)"  id="<?= $myId ?>" style='width:50px ; height:50px;'  src="<?='productphoto/'.$product['img']?>" class="card-img-top" alt="...">
  <div class="card-body">
    <p class="card-text"><?= $product['name']?></p>
<p><?= $product['price']?></p>  
</div>
</div>
                        
                    </div><?php }?>
                </div>
            </div>
        </div>
    </div>
</div>
<script>

   let total=0
  var i=0
   var z=0
   let sum=0
   var arrtotal=[]
var arryproductName=[]
    function getDetails(id,productName,productPrice,event){
        if(arryproductName.includes(productName)){
                
                alert('The item is already in the order')
      
            }else{
                arryproductName.push(productName)
            
       

        var para5=document.createElement("div");
        para5.setAttribute('class','cont')
        let para = document.createElement("span")
        para.innerText =productName;
        
        para5.appendChild(para);
        let para3 = document.createElement("input");
        para3.value =1
        para3.type="number"
        para3.min="1"
        para3.max="5"
        para3.onchange=(e)=>{
            // console.log(e.target.value) 
            // console.log(e.target.previousSibling)
            // console.log(e.target.nextSibling)
            e.target.nextSibling.innerHTML=productPrice*e.target.value
            total=0
           z=productPrice*e.target.value
        //    console.log(z)
           total+=z
        //    console.log(total)
           arrtotal[productName]=total
        //    console.log(arrtotal)
        //  sum += arrtotal.reduce((a, b) => a + b, 0);
sum=0;
         for (var key in arrtotal) {
    sum+=arrtotal[key]
    document.getElementById('totalprice').value=sum;
    
    document.getElementById('tottal').innerHTML=sum;
  
}
console.log(sum)
        }
       para5.appendChild(para3);
       para2 = document.createElement("span");
       para2.innerHTML=productPrice;
       arrtotal[productName]=productPrice
       sum += productPrice
       document.getElementById('totalprice').value=sum;
       console.log(sum)
       document.getElementById('tottal').innerHTML=sum;
        // console.log(arrtotal)
       para5.appendChild(para2);
   

       let para7 = document.createElement("i");
       para7.setAttribute("class","fa-solid fa-xmark")
       para5.appendChild(para7);
       para7.onclick=(e)=>{
        // console.log(e.target.parentElement)
        e.target.parentElement.style.display="none"
        // console.log(e.target.parentElement.firstChild.innerHTML)
        var theproductName=e.target.parentElement.firstChild.innerHTML;
        console.log(theproductName)
       
    delete arrtotal[theproductName]
    var b = 0;
  while (b< arryproductName.length) {
    if (arryproductName[b] === theproductName) {
        arryproductName.splice(b, 1);
    } else {
      ++b;
    }
  }
    //  arryproductName.remove("Tea")
    console.log(arryproductName)
    console.log(arrtotal)
    sum=0;
    
         for (var key in arrtotal) {
    sum+=arrtotal[key]
    document.getElementById('totalprice').value=sum;
    
    document.getElementById('tottal').innerHTML=sum;
}
console.log(sum)
    }
  
       document.getElementById("myDIV").appendChild(para5);

       
    }

         
    }
 

    function setorder(){
  
  let prod_arr=[]; 
   total_price=0;
containr_arr= document.getElementsByClassName("cont")
for(i=0;i<containr_arr.length;i++){ 
prod_name=containr_arr[i].children[0].innerHTML;
prod_quantity=containr_arr[i].children[1].value;
prod_arr.push({
  name:prod_name,
  quantity:prod_quantity
}); 

}   

for(i=0;i<prod_arr.length;i++){
ipt1=document.createElement("input"); 
ipt1.name=prod_arr[i].name;
ipt1.type="hidden";
ipt1.value=JSON.stringify(prod_arr[i]); 
document.forms[0].append(ipt1)
}
}
    

</script>
</body>

</html>