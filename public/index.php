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
if(isset($_GET['status'])){
    $message=$_GET['status'];
}else{
    $message=null;
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
<?php
    if($message=="success"){
        echo'<script>
        alert("Added to cart");
    </script> ';
    }elseif($message=="incart"){
        echo'<script>
        alert("Already added to cart");
    </script> ';
    }

?>    
</head>
<body>
    <div class="navsect">
        <nav>
            <div class="logo">
            <a href="" class="logop">Foodie</a>
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
                <a href="javascript:void(0);" onClick="myFunction()"></i></a>
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
                                <span class="item-price">$ '.$row['product_unit_price'].'</span>
                                <span class="item-quantity">Quantity:01</span>
                                <a href="handle/delfrom.php?remove='.$row['product_id'].'" class="item-quantity">Remove</a>
                        
                    </li>
                                ';      
                            $total+=$row['product_unit_price'];
                        }
                    }
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
                <a href="html/checkout.php" class="button">Checkout</a>  
        </div>
    </div>
    
    
    
    <div id="landing">
        <h1>Foodie restaraunt</h1>
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
                 <p style="text-transform:capitalize;">'.$row1['product_name'].'</p>
                 <!--<p>' . $row1['product_desc'] . '</p>-->
                 <p>Price $ '.$row1['product_unit_price'].'</p>
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
    <footer class="footer-section" style="margin-top: 2vh">
        <div class="container">
            <div class="footer-cta pt-5 pb-5">
                <div class="row">
                    <div class="col-xl-4 col-md-4 mb-30">
                        <div class="single-cta">
                            <i class="fas fa-map-marker-alt"></i>
                            <div class="cta-text">
                                <h4>Find us</h4>
                                <span>1010 Avenue, sw 54321, Eldoret</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-4 mb-30">
                        <div class="single-cta">
                            <i class="fas fa-phone"></i>
                            <div class="cta-text">
                                <h4>Call us</h4>
                                <span>+254776494275</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-4 mb-30">
                        <div class="single-cta">
                            <i class="far fa-envelope-open"></i>
                            <div class="cta-text">
                                <h4>Mail us</h4>
                                <span>Cyrilleotieno83@gmail.com</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-content pt-5 pb-5">
                <div class="row">
                    <div class="col-xl-4 col-lg-4 mb-50">
                        <div class="footer-widget">
                            <div class="footer-logo">
                                <a href="index.html" class="logop" style="color:white">Foodie</a>
                            </div>
                            <div class="footer-text">
                                <p>Foodie is your one stop shop for home made meals made by dedicated bakes and chefs.The destanation for all the sweet tooths.</p>
                            </div>
                            <div class="footer-social-icon">
                                <span>Follow us</span>
                                <a href="#"><i class="fab fa-facebook-f facebook-bg"></i></a>
                                <a href="#"><i class="fab fa-twitter twitter-bg"></i></a>
                                <a href="#"><i class="fab fa-google-plus-g google-bg"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6 mb-30">
                        <div class="footer-widget">
                            <div class="footer-widget-heading">
                                <h3>Useful Links</h3>
                            </div>
                            <ul>
                                <li><a href="#">Home</a></li>
                                <li><a href="#">about</a></li>
                                <li><a href="#">Menu</a></li>
                                <li><a href="#">Contact</a></li>
                                <li><a href="#">About us</a></li>
                                <li><a href="#">Our Services</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6 mb-50">
                        <div class="footer-widget">
                            <div class="footer-widget-heading">
                                <h3>Subscribe</h3>
                            </div>
                            <div class="footer-text mb-25">
                                <p>Don’t miss to subscribe to our new feeds, kindly fill the form below.</p>
                            </div>
                            <div class="subscribe-form">
                                <form action="#">
                                    <input type="text" placeholder="Email Address">
                                    <button style="margin-top:4vh"><i class="fab fa-telegram-plane"></i></button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyright-area">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 col-lg-6 text-center text-lg-left">
                        <div class="copyright-text">
                            <p>Copyright &copy; <script>document.write(new Date().getFullYear())</script>, All Right Reserved</p>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 d-none d-lg-block text-right">
                        <div class="footer-menu">
                            <ul>
                                <li><a href="#">Home</a></li>
                                <li><a href="#">Terms</a></li>
                                <li><a href="#">Contact</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>