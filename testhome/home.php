<html>

<head>
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
            <form action="<?=$_SERVER['PHP_SELF']?>" method="post">
        <input type="hidden" name="pricex" value="" id="test">
        
        </form>
        
          <div id="myDIV">

          </div>
          <!-- <input type="text" name="qty" id="qty" oninput="myFunction()"> -->
          <span id="proname"></span>
        <span id="qtyfprice"></span>
          <!-- <button>-</button> -->
           <div id="demo"></div>
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
  <img onclick="getDetails(<?= $myId ?>,'<?= $productName ?>',<?=$productPrice?>,event)" id="myimg"   src="<?='prouductphotos/'.$product['img']?>" class="card-img-top" alt="...">
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
    
  
  
//    function test(e){
//     // #1:nth-child(1)
// var thediv =document.getElementById(`${i}`)
// console.log(thediv)
//     // var x = document.querySelector(`#myDIV #${i} input`).value;
//      var x=thediv.querySelector("input").value
//     x++;
//     thediv.querySelector("input").value=x
   
//         para2.innerText = (document.getElementById("test").value)*thediv.querySelector("input").value
//         // para2.setAttribute("id", productPrice)

    
//    }
   i=0;
   var para2;
   var productList = [];
   var product ;
   let para4;
   let total=0
   var z=0
   var arrtotal=[]
    function getDetails(id,productName,productPrice,event){
        console.log(event)
        // if(arrtotal[productName]){
        //     console.log("hi")
        // }
//          product = {
//     id: id,
//     name: productName,
//      price:productPrice
//   };
 
//   productList.push(product);
  var para5=document.createElement("div");
//   para5.setAttribute("class","outerdiv")
 
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
           console.log(z)
           total+=z
           console.log(total)
           arrtotal[productName]=total
           console.log(arrtotal)

        }
        
        
      
        // para3.setAttribute("oninput", "myFunction(5)")
       para5.appendChild(para3);
     
        // para4= document.createElement("button")
        // // para4.setAttribute("id",productList[i].id)
        // para4.onclick=(e)=>{
        //     console.log(e.target.previousSibling.value)
        //    var qty= e.target.previousSibling.value
        //    qty++
        //    e.target.previousSibling.value=qty
        //    console.log(productPrice*qty)
        //    e.target.nextSibling.innerHTML=productPrice*qty

        // }
        // // para4.setAttribute("onclick", "test()")
        // para4.innerHTML ="+"
        // // para4.setAttribute("id", productList[i].id)
        // para5.appendChild(para4);
        // para6= document.createElement("button")
        // // para4.setAttribute("id",productList[i].id)
        // para6.onclick=(e)=>{
        //     console.log(e.target.previousSibling.value)
        //    var qty2= e.target.previousSibling.value
        //    qty2--
        //    e.target.previousSibling.value=qty2
        // //    console.log(productPrice*qty)
        // //    e.target.nextSibling.innerHTML=productPrice*qty

        // }
       
        // para6.innerHTML ="-"
        // // para4.setAttribute("id", productList[i].id)
        // para5.appendChild(para6);
      
         para2 = document.createElement("span");
        para2.innerHTML=productPrice;
        arrtotal[productName]=productPrice
        // console.log(arrtotal)
       para5.appendChild(para2);
       para5.setAttribute("id",i)
        document.getElementById("myDIV").appendChild(para5);
  
        i++;
    // i++
        // productList = [];

        // document.getElementById("test").value=productPrice
        // console.log(productList)
        // localStorage.setItem('ourproduct', JSON.stringify(productList));
        
       

         console.log(arrtotal)
         
    }
    //  , {once : true});

   
    // console.log(productList)
//     var List;
// List = JSON.parse(localStorage.getItem("ourproduct"));
//     console.log(List)
//  function x(){

//  }
//     function myFunction(productPrice) {
//   var x = document.getElementsByTagName("input")[0].value;
//   console.log()
//   document.getElementById("demo").innerHTML = "mush: " + x*productPrice ;
// }

    

</script>
</body>

</html>