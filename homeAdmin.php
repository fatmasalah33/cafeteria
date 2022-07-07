 <?php  
 session_start();
 if (!empty($_SESSION['admin'])) {
    

 
 ?>
 <html>

<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "icon" href ="images/coffee-cup.png" type = "image/x-icon">
  <title>Cafetiria | Home </title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"  integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="css/main.css">
   <!-- Bootstrap JavaScript Libraries -->
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
 <style>
  img[alt="adminimage"]{
    width:4rem;
  }
  input[type="search"]:focus , input[type="number"] , input[type="number"]:focus , textarea {
            color: #9b6349 !important;
            border-bottom-color: #9b6349 !important;
        }
        
        input[type="number"] , input[type="number"]:focus , textarea , select:focus{
            border-color:#9b6349  !important;
            resize: none !important;
        }

        select:focus{
            border-color: #9b6349;
        }
         .navcol{
            background-color: #eae7e5;
         }
        .fa-magnifying-glass , label , .navbar-brand{
            color: #9b6349 !important;
        }
        .input-group-text{
            background-color: transparent !important;
        }
        button[id="plus"],button[id="minus"],button[id="delete"]{
            background-color: transparent;
            color: #9b6349;
        }
        main div aside{
            border:2px solid  #9b6349 !important;
            border-radius: 11px;
        }
        /* .products{
            margin-top: 9rem !important;
        }
        .products div{
            width: 8rem;
            
        } */
       
        .sticky-lg-top{
            top: 10rem;
        }
        
        #myDIV{
        height: 12rem !important;
        overflow-y: auto !important;
       }

       .custom-margin{
        margin-bottom: 1rem;
       }

      .mainsection{
        margin-top: 4rem !important;
      }
      .productname{
        color: #9b6349;
        width: 3.5rem;
      }
      .image{
            max-width: 100%;
            opacity: 0.8;
            transition: all 1s;
            border-radius: 50%;
            width: 100px;
            height: 100px;

        }
        .image:hover{
            opacity: 1;
            cursor: pointer !important;
            transform: scale(1.1) rotate(-5deg);
        }
      .productprice{
        color: #9b6349;
        width: 3.5rem;
      }
      .bg-light{
        background-color: transparent !important;
        border: 2px solid #9b6349 !important;
      }
 </style>
</head>

<body>
<?php
    
    require 'connection.php';
    require 'adminnavbar.php';
    ?>
  
 
    <main class="container mainsection">
   
<div class="row  flex-column-reverse flex-lg-row mt-2 justify-content-between  align-items-start">
     <!--cart (left Aside section)-->
<aside class="col-10 col-md-5 col-lg-3 border-3 mx-auto mb-5 sticky-lg-top p-3 ">
    <form action="" id="addorder" method="post" onsubmit="setorder()">
       <div id="myDIV" class="border border-secondary p-1 mb-2">

       <!-- <div class="d-flex justify-content-between align-items-center mb-2">
                <span for="product" id="productname"></span>
                <input type="number" class="form-control w-25 border text-center" onchange="myfun(productPrice,event)" name="quantity" value="1" id="product" min="1" max="15">
                <span id="price"></span>
                <i id="close" class="fa-solid fa-xmark"></i>
               </div> -->

       </div>
        <input type="hidden" class="form-control w-25  border text-center" name="price" value="" id="totalprice" min="1" max="15">
       <!--Notes-->
       <label for="notes" class="form-label mb-0">Notes</label>
       <textarea id="notes" name="notes" class="form-control bg-light me-2 border p-1 border-secondary" placeholder="Any comment about your order" rows="3"></textarea>
       <!--select-->
       <label for="roomno" class="form-label mb-0">Room</label>
       <select name="noroom" id="roomno" class="w-100 mb-4 bg-light border-0 p-1 px-3" placeholder="Any comment about your order" rows="5">
        <option disabled selected >where to deliver the order</option>
            <option value="1">room 1</option>
            <option value="2">room 2</option>
            <option value="3">room 3</option>
            <option value="4">room 4</option>
            <option value="5">room 5</option>
       </select>
       <div class="divider text-center mt-3"><img src="images/title-separator.png" alt=""></div>
       <div class="text-end"><span id="tottal" class="title"></span></div>
       <div class="text-end"><input type="submit" class="btn" value="Confirm"></div>
    </form>
</aside>
   
<div class="col-md-9" >
   <!--search bar-->
   <div>
   <nav class="navbar navbar-light ">
  <div class="container pt-3">
    <a class="navbar-brand"></a>
    <form class="d-flex">
    <div class="input-group">
      <span class="input-group-text border-0" id="basic-addon1"><i class="fa-solid fa-magnifying-glass"></i></span>
      <input class="form-control me-2 border-bottom border-secondary" onkeyup="getchar(this.value)" aria-describedby="basic-addon1" type="search" placeholder="Search" aria-label="Search">
     
         
        
    </div>
    </form>
  </div>
</nav>
    </div>
            <div class="container">
            <h2 class="title">Add to user</h2>
            <div class="d-flex justify-content-center f-div custom-margin">
                 
            <select name="users" id="users" class="w-25 mb-4 bg-light border-0 p-1 px-3" onchange="getid(this.value)">

            <option value="">select user</option>
        <?php
							$queryString=$connection->prepare('SELECT DISTINCT id,name FROM users');
							$queryString->execute();
							$users=$queryString->fetchAll();
								foreach ($users as $user){?>
            <option value="<?= $user['id']?>"><?= $user['name']?></option><?php }?>
            <input type="hidden" id="idofuser">
        </select>
        
               
            </div>
            <hr>
         
                <div id="allproduct" class="row">
              


                <?php
							$queryString=$connection->prepare('SELECT * FROM products');
							$queryString->execute();
							$products=$queryString->fetchAll();
								foreach ($products as $product){
                                    $myId=$product['id'];
                                    $productName=$product['name'];
                                    $productPrice=$product['price'];?>
                    <div class="col-md-3 col-6">
                    <div class="text-center products">
  <img onclick="getDetails(<?= $myId ?>,'<?= $productName ?>',<?=$productPrice?>,event)"  id="<?= $myId ?>"  src="<?='productphoto/'.$product['img']?>" class="mb-2 mt-2 image" alt="...">
  <div class="text-center">
    <p class="card-text"><?= $product['name']?></p>
<span>LE. </span><span><?= $product['price']?></span>  
    
</div>
</div>
                        
                    </div><?php }?>
                </div>
            </div>
        </div>
    </div>
</div>
    </main>
<script>
   function getchar(char){
 
 
 const xhttp = new XMLHttpRequest();
 xhttp.onload = function() {

   document.getElementById("allproduct").innerHTML= this.responseText;
    
 }
 xhttp.open("GET", "matchproduct.php?c="+char);
 xhttp.send();

       }
   function getid(id){
                document.getElementById("idofuser").value=id;
                console.log(id)
                document.getElementById('addorder').action="setproductdb.php?id="+id;

                
            }
   let total=0
  var i=0
   var z=0
   let sum=0
   var arrtotal=[]
var arryproductName=[]
    function getDetails(id,productName,productPrice,event){
        if(arryproductName.includes(productName)){
                
                alert('The item is already in the cart')
      
            }else{
                arryproductName.push(productName)
            
       

        var para5=document.createElement("div");
        para5.setAttribute('class','cont  justify-content-between align-items-center mb-2')
        para5.style.display="flex";
        let para = document.createElement("span")
        para.innerText =productName;
        para.setAttribute("class","productname")
        
        para5.appendChild(para);
        let para3 = document.createElement("input");
        para3.setAttribute("class","form-control w-25 border text-center")
        para3.value =1
        para3.type="number"
        para3.min="1"
        para3.max="5"
        para3.onchange=(e)=>{
            // console.log(e.target.value) 
            // console.log(e.target.previousSibling)
            // console.log(e.target.nextSibling)
            e.target.nextSibling.innerHTML="EGP "+productPrice*e.target.value
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
    
    document.getElementById('tottal').innerHTML="EGP "+sum;
  
}
console.log(sum)
        }
       para5.appendChild(para3);
       para2 = document.createElement("span");
       para2.setAttribute("class","productprice")
       para2.innerHTML=("EGP "+productPrice);
       arrtotal[productName]=productPrice
       sum += productPrice
       document.getElementById('totalprice').value=sum;
       console.log(sum)
       document.getElementById('tottal').innerHTML="EGP "+sum;
        // console.log(arrtotal)
       para5.appendChild(para2);
   

       let para7 = document.createElement("i");
       para7.setAttribute("class","fa-solid fa-xmark")
       para7.setAttribute("style","color:darkred;cursor: pointer;")
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
    if (arryproductName[b] === theproductName){
        arryproductName.splice(b, 1);
    } else {
      ++b;
    }
  }
  if(arryproductName.length==0){
  document.getElementById('tottal').innerHTML=0;
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
document.getElementById('addorder').append(ipt1)
}
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