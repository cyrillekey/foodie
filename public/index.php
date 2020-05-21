<?php 
    session_start();
    include('../conf/conf.php');
    if(isset($_SESSION['cart'])){
    $items=$_SESSION['cart'];
    $cartitems=explode(",",$items);
    $total=0;
}
else{
    $items=array();
    $cartitems=array();
    $total=0;
}
  ?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Foodie</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css"  media="screen and (min-width:600px)">
    <link rel="stylesheet" media="screen and (max-width:600px)" href="css/media.css" >
    <script src="js/jquery.js"></script>
    <script>
        
        function myFunction(){
            var doc=document.getElementById('mainbar');
            if(doc.style.display=="block"){
                doc.style.display="none";
               
            }
            else{
                doc.style.display="block";
                
            }
        }
        function myFunction1(){
            var doc=document.getElementById('cart_click');
            if(doc.style.display=="block"){
                doc.style.display="none";
               
            }
            else{
                doc.style.display="block";
                
            }
        }
        
    </script> 
</head>
<body>
    <div class="navsect">
        <nav>
            <div class="logo">
                <img src="img/icons/nf1_(4).jpg" alt="">
            </div>
                
            <div id="mainbar">
                <ul>
                    <li><a href="">Home</a></li>
                    <li><a href="">Account</a></li>
                    <li><a href="">Order</a></li>
                    <li><a href="">Contact Us</a></li>
                </ul>
            </div>
            <div class="cart">
                <a href="javascript:void(0);" onClick="myFunction1()"><i class="fa fa-shopping-cart cart-icon"></i><span class="badge"><?php echo count(array_filter($cartitems));?></a>
            </div>
            <div id="hambur">
                <a href="javascript:void(0);" onClick="myFunction()"><i class="far fa-bars"></i></a>
            </div>
        </nav>
    </div>
    
    <div class="container">
        <div class="shopping-cart" id="cart_click">
            <div class="shopping-cart-header">
                <i class="fa fa-shopping-cart cart-icon"></i><span class="badge"><?php echo count(array_filter($cartitems));?></span>
                <div class="shopping-cart-total">
                    <!--<span class="lighter-text">Total</span>
                    <span class="main-color-text">$<?php echo $_SESSION['total']?></span>-->
                </div>
            </div>
                <ul class="shopping-cart-items">
                    <?php
                        if(count(array_filter($cartitems))){
                        foreach($cartitems as $key=>$pid){
                        $sql = "SELECT * FROM product_table where product_id='$pid'";
                        $stmt = mysqli_stmt_init($conn);
                        if (!mysqli_stmt_prepare($stmt, $sql)) {
                            echo "failed to prepare";
                        } else {
                            #mysqli_stmt_execute($stmt);
                                mysqli_stmt_execute($stmt);
                                $result = mysqli_stmt_get_result($stmt);
                                $row=mysqli_fetch_assoc($result);
                                echo'
                                <li class="clearfix">
                                <img class="pdimg" src="img/'.$row['product_image'].'" alt="product image">
                                <span class="item-name">'.$row['product_name'].'.</span>
                                <span class="item-price">$ '.$row['product_unit_price'].'.00</span>
                                <span class="item-quantity">Quantity:01</span>
                                <a href="handle/delfrom.php?remove='.$row['product_id'].'" class="item-quantity">Remove</a>
                        
                    </li>
                                ';      
                            $total+=$row['product_unit_price'];
                        }
                    
                    }
                
                echo"
                    <p class='total'>Total $$total</p>
                ";
            }
                    else{
                        echo'
                        <li class="clearfix">
                        Start shopping
                        </li>
                        ';
                    }
                    ?>
                    
                </ul>
                <a href="html/checkout.html" class="button">Checkout</a>  
        </div>
    </div>
    
    
    
    <div id="landing">
        <h1>Lorem restaraunt</h1>
        <p>Get your food easily with the click of a button</p>
        <a href="html/product.php" class="btn">Order Now</a>
    </div>
    <div class="menu">
        <h1>What we serve</h1>
        
        <div class='row'>

             <?php
             $sql = "SELECT * FROM product_table limit 4";
             $stmt = mysqli_stmt_init($conn);
             if (!mysqli_stmt_prepare($stmt, $sql)) {
                 echo "failed to prepare";
             } else {
                 mysqli_stmt_execute($stmt);
                 $result = mysqli_stmt_get_result($stmt);
                 while ($row1 = mysqli_fetch_assoc($result)) {
                         echo'
                 <div class="product--blue">
               <div class="product_inner">
                 <img src="img/'.$row1['product_image'].'" width="300">
                 <p>'.$row1['product_name'].'</p>
                 <p>' . $row1['product_desc'] . '</p>
                 <p>Price '.$row1['product_unit_price'].'</p>
                 <a href="handle/addtocart.php?pdid='.$row1['product_id'].'">
                 <button>Add to basket</button>
                 </a>
               </div>
               <div class="product_overlay">
                 <h2>Added to basket</h2>
                 <i class="fa fa-check"></i>
               </div>
             </div>';
                 }
                }
             ?>     
        </div>
        <div class="viewall">
        <a href="html/product.php">View all products</a>
        </div>
        
    </div>
</body>
</html>