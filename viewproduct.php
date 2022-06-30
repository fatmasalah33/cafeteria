<html>
    <head></head>
    <body>
        <ul>
            <?php
            require "connection.php";
        if(isset($_GET['id'])){
            $id=$_GET['id'];
            $oldString=$connection->prepare('SELECT * FROM products WHERE id=?');
            $oldString->execute([$id]);
            $product=$oldString->fetch(PDO::FETCH_ASSOC);}
        
            ?>
           
                <!-- <ul> -->
                    <li>id:<?= $product['id']?></li>
                    <li>productname:<?= $product['name']?></li>
                   <li>price:<?= $product['price']?></li>
                   <li>image:<?= $product['img']?></li>
                   <li>cat_id:<?= $product['cat_id']?></li>

              
        <!-- </ul> -->
        
        
        
 </ul>









    </body>
</html>