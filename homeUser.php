<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "icon" href ="images/coffee-cup.png" type = "image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"  integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/main.css">
    <title>Cafetiria | Home </title>
    <style>

        img[alt="userimage"]{
            width: 4rem;
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
        .products{
            margin-top: 9rem !important;
        }
        .products div{
            width: 8rem;
            
        }
        .products div img{
            max-width: 100%;
            opacity: 0.8;
            transition: all 1s;
        }
        .products div img:hover{
            opacity: 1;
            cursor: pointer !important;
            transform: scale(1.1) rotate(-5deg);
        }
        .sticky-lg-top{
            top: 10rem;
        }
        
       #card-products{
        height: 12rem !important;
        overflow-y: auto !important;
       }

       .custom-margin{
        margin-bottom: 1rem;
       }
    </style>
</head>
<body>

    <?php
    require 'connection.php';
    ?>

   <!--navbar-->
    <div class="container-fluid text-center fixed-top navcol">
    <nav class="navbar navbar-expand-lg navbar-light ">
    <div class="container pt-2">
    <a class="navbar-brand" href="homeUser.php">Home</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
            <span class="nav-link d-lg-block d-none">|</span>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">My Orders</a>
        </li>
      </ul>
      <div>
      <span class="navbar-text me-2" id="username">
        <img src="images/coffee-cup.png" class="rounded-circle border" alt="userimage" id="userimage">
      </span> 
      <span class="navbar-text me-auto" id="username">
        User name
      </span>
      </div>
    </div>
   </div>
 </nav>

  <!--search bar-->
    <nav class="navbar navbar-light ">
  <div class="container pt-3">
    <a class="navbar-brand"></a>
    <form class="d-flex">
    <div class="input-group">
      <span class="input-group-text border-0" id="basic-addon1"><i class="fa-solid fa-magnifying-glass"></i></span>
      <input class="form-control me-2 border-bottom border-secondary" aria-describedby="basic-addon1" type="search" placeholder="Search" aria-label="Search">
      </div>
    </form>
  </div>
</nav>
    </div>


    
    <main class="container">
        <div class="row  flex-column-reverse flex-lg-row mt-2 justify-content-between  align-items-start">
             <!--cart (left Aside section)-->
        <aside class="col-10 col-md-5 col-lg-3 border-3 mx-auto mb-5 sticky-lg-top p-3 ">
            <form >
                <!--one row(product) in the cart-->
               <div id="card-products">
               <div class="d-flex justify-content-between align-items-center mb-2">
                <span for="product" id="productname">Tea</span>
                <input type="number" class="form-control w-25 border text-center" name="quantity" value="1" id="product" min="1" max="15">
                <div class="d-flex flex-column">
                <button class="border-0" id="plus"><i class="fa-solid fa-plus"></i></button>
                <button class="border-0" id="minus"><i class="fa-solid fa-minus "></i></button>
                </div>
                <span id="price">EGP 25</span>
                <button class="border-0" id="delete"><i class="fa-solid fa-xmark"></i></button>
               </div>
               <div class="d-flex justify-content-between align-items-center mb-2">
                <span for="product" id="productname">Cola</span>
                <input type="number" class="form-control w-25 border text-center" name="quantity" value="1" id="product" min="1" max="15">
                <div class="d-flex flex-column">
                <button class="border-0" id="plus"><i class="fa-solid fa-plus"></i></button>
                <button class="border-0" id="minus"><i class="fa-solid fa-minus "></i></button>
                </div>
                <span id="price">EGP 25</span>
                <button class="border-0" id="delete"><i class="fa-solid fa-xmark"></i></button>
               </div>
               <div class="d-flex justify-content-between align-items-center mb-2">
                <span for="product" id="productname">Cola</span>
                <input type="number" class="form-control w-25 border text-center" name="quantity" value="1" id="product" min="1" max="15">
                <div class="d-flex flex-column">
                <button class="border-0" id="plus"><i class="fa-solid fa-plus"></i></button>
                <button class="border-0" id="minus"><i class="fa-solid fa-minus "></i></button>
                </div>
                <span id="price">EGP 25</span>
                <button class="border-0" id="delete"><i class="fa-solid fa-xmark"></i></button>
               </div>
               <div class="d-flex justify-content-between align-items-center mb-2">
                <span for="product" id="productname">Cola</span>
                <input type="number" class="form-control w-25 border text-center" name="quantity" value="1" id="product" min="1" max="15">
                <div class="d-flex flex-column">
                <button class="border-0" id="plus"><i class="fa-solid fa-plus"></i></button>
                <button class="border-0" id="minus"><i class="fa-solid fa-minus "></i></button>
                </div>
                <span id="price">EGP 25</span>
                <button class="border-0" id="delete"><i class="fa-solid fa-xmark"></i></button>
               </div>

               </div>

               <!--Notes-->
               <label for="notes" class="form-label mb-0">Notes</label>
               <textarea id="notes" class="form-control me-2 border p-1 border-secondary" placeholder="Any comment about your order" rows="3"></textarea>
               <label for="room" class="form-label mb-0">Room</label>
               <select id="room" class="form-control me-2 border p-1 border-secondary" placeholder="Any comment about your order" rows="5">
                <option disabled selected >where to deliver the order</option>
                <option value="1">1</option>
                <option value="1">2</option>
                <option value="1">3</option>
               </select>
               <div class="divider text-center mt-3"><img src="images/title-separator.png" alt=""></div>
               <div class="text-end"><span id="totalprice" class="title">EGP 55</span></div>
               <div class="text-end"><input type="submit" class="btn" value="Confirm"></div>
            </form>
        </aside>

        <!--products-->
        <section class="products row col-10 col-md-12 col-lg-9  p-3 ps-5 mx-auto">
            <h2 class="title">Latest Order</h2>
            <div class="text-center custom-margin">
                <img class="mb-2" src="productphoto/apple-juice.png" alt="apple">
                <span id="productname">Tea</span><br>
                <span id="productprice">5 LE</span>
            </div>
            <hr class="title mt-4 opacity-0">
            <!--all products-->
             <div class="text-center custom-margin">
                <img class="mb-2" src="productphoto/cake-slice.png" alt="apple">
                <span id="productname">Tea</span><br>
                <span id="productprice">5 LE</span>
            </div>
             <div class="text-center custom-margin">
                <img class="mb-2" src="productphoto/cake-slice.png" alt="apple">
                <span id="productname">Tea</span><br>
                <span id="productprice">5 LE</span>
            </div>
             <div class="text-center custom-margin">
                <img class="mb-2" src="productphoto/cake-slice.png" alt="apple">
                <span id="productname">Tea</span><br>
                <span id="productprice">5 LE</span>
            </div>
             <div class="text-center custom-margin">
                <img class="mb-2" src="productphoto/cake-slice.png" alt="apple">
                <span id="productname">Tea</span><br>
                <span id="productprice">5 LE</span>
            </div>
           

        </section>

        
    </main>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    
</body>
</html>