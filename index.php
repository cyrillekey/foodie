<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Foodie</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css"  media="screen and (min-width:900px)">
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
                <a href="javascript:void(0);" onClick="myFunction1()"><i class="fa fa-shopping-cart cart-icon"></i></a>
            </div>
            <div id="hambur">
                <a href="javascript:void(0);" onClick="myFunction()"><i class="far fa-bars"></i></a>
            </div>
        </nav>
    </div>
    
    <div class="container">
        <div class="shopping-cart" id="cart_click">
            <div class="shopping-cart-header">
                <i class="fa fa-shopping-cart cart-icon"></i><span class="badge">3</span>
                <div class="shopping-cart-total">
                    <span class="lighter-text">Total</span>
                    <span class="main-color-text">$125.27</span>
                </div>
            </div>
                <ul class="shopping-cart-items">
                    <li class="clearfix">
                        <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/195612/cart-item1.jpg" alt="">
                        <span class="item-name">Banana chips</span>
                        <span class="item-price">$12.99</span>
                        <span class="item-quantity">Quantity:01</span>
                        
                    </li>
                    <li class="clearfix">
                        <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/195612/cart-item1.jpg" alt="">
                        <span class="item-name">Banana chips</span>
                        <span class="item-price">$12.99</span>
                        <span class="item-quantity">Quantity:01</span>
                        
                    </li>
                    <li class="clearfix">
                        <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/195612/cart-item1.jpg" alt="">
                        <span class="item-name">Banana chips</span>
                        <span class="item-price">$12.99</span>
                        <span class="item-quantity">Quantity:01</span>
                        
                    </li>
                    <li class="clearfix">
                        <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/195612/cart-item1.jpg" alt="">
                        <span class="item-name">Banana chips</span>
                        <span class="item-price">$12.99</span>
                        <span class="item-quantity">Quantity:01</span>
                        
                    </li>
                    <li class="clearfix">
                        <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/195612/cart-item1.jpg" alt="">
                        <span class="item-name">Banana chips</span>
                        <span class="item-price">$12.99</span>
                        <span class="item-quantity">Quantity:01</span>
                        
                    </li>
                </ul>
                <a href="" class="button">Checkout</a>  
        </div>
    </div>
    
    
    
    <div id="landing">
        <h1>Lorem restaraunt</h1>
        <p>Get your food easily with the click of a button</p>
        <a href="" class="btn">Order Now</a>
    </div>
    <div class="menu">
        <h1>What we serve</h1>
        <!--
        <div class="products">
            <div class="product-card">
                <div class="product-image">
                    <img src="img/Anil_Chips_Pouch2032_1_1024x1024@2x.png" alt="">
                </div>
                <div class="product-info">
                    <h5>tomato puree</h5>
                    <h6>$12.99</h6>
                    <a href="" class="addto">Add</a>
                </div>
            </div>
            <div class="product-card">
                <div class="product-image">
                    <img src="img/Anil_Chips_Pouch2032_1_1024x1024@2x.png" alt="">
                </div>
                <div class="product-info">
                    <h5>tomato puree</h5>
                    <h6>$12.99</h6>
                    <a href="" class="addto">Add</a>
                </div>
            </div>
            <div class="product-card">
                <div class="product-image">
                    <img src="img/Anil_Chips_Pouch2032_1_1024x1024@2x.png" alt="">
                </div>
                <div class="product-info">
                    <h5>tomato puree</h5>
                    <h6>$12.99</h6>
                    <a href="" class="addto">Add</a>
                </div>
            </div>
            <div class="product-card">
                <div class="product-image">
                    <img src="img/Anil_Chips_Pouch2032_1_1024x1024@2x.png" alt="">
                </div>
                <div class="product-info">
                    <h5>tomato puree</h5>
                    <h6>$12.99</h6>
                    <a href="" class="addto">Add</a>
                </div>
            </div>
            <div class="product-card">
                <div class="product-image">
                    <img src="img/Anil_Chips_Pouch2032_1_1024x1024@2x.png" alt="">
                </div>
                <div class="product-info">
                    <h5>tomato puree</h5>
                    <h6>$12.99</h6>
                    <a href="" class="addto">Add</a>
                </div>
            </div>
            <div class="product-card">
                <div class="product-image">
                    <img src="img/Anil_Chips_Pouch2032_1_1024x1024@2x.png" alt="">
                </div>
                <div class="product-info">
                    <p class='title'>tomato puree</p>
                    <p>$12.99</p>
                    <a href="" class="addto">Add</a>
                </div>
            </div>
        -->
        <div class='row'>
            <div class='product--blue'>
              <div class='product_inner'>
                <img src='img/Anil_Chips_Pouch2032_1_1024x1024@2x.png' width='300'>
                <p>Nike Air (Women)</p>
                <p>Size 7</p>
                <p>Price £199.99</p>
                <button>Add to basket</button>
              </div>
              <div class='product_overlay'>
                <h2>Added to basket</h2>
                <i class='fa fa-check'></i>
              </div>
            </div>
            <div class='product--blue'>
                <div class='product_inner'>
                  <img src='img/Anil_Chips_Pouch2032_1_1024x1024@2x.png' width='300'>
                  <p>Nike Air (Women)</p>
                  <p>Size 7</p>
                  <p>Price £199.99</p>
                  <button>Add to basket</button>
                </div>
                <div class='product_overlay'>
                  <h2>Added to basket</h2>
                  <i class='fa fa-check'></i>
                </div>
              </div>
              <div class='product--blue'>
                <div class='product_inner'>
                  <img src='img/Anil_Chips_Pouch2032_1_1024x1024@2x.png' width='300'>
                  <p>Nike Air (Women)</p>
                  <p>Size 7</p>
                  <p>Price £199.99</p>
                  <button>Add to basket</button>
                </div>
                <div class='product_overlay'>
                  <h2>Added to basket</h2>
                  <i class='fa fa-check'></i>
                </div>
              </div>
              <div class='product--blue'>
                <div class='product_inner'>
                  <img src='img/Anil_Chips_Pouch2032_1_1024x1024@2x.png' width='300'>
                  <p>Nike Air (Women)</p>
                  <p>Size 7</p>
                  <p>Price £199.99</p>
                  <button>Add to basket</button>
                </div>
                <div class='product_overlay'>
                  <h2>Added to basket</h2>
                  <i class='fa fa-check'></i>
                </div>
              </div>
          
        
        
        </div>
    </div>
</body>
</html>
