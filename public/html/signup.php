<?php
if(isset($_GET['error'])){
    $error=$_GET['error'];
}
else{
    $error="";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css"  media="screen and (min-width:600px)">
    <link rel="stylesheet" media="screen and (max-width:600px)" href="../css/media.css" >
 
    <title>Home</title>
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
                <img src="../img/icons/nf1_(4).jpg" alt="">
            </div>
                
            <div id="mainbar">
                <ul>
                    <li><a href="">Home</a></li>
                    <li><a href="">Account</a></li>
                    <li><a href="">Order</a></li>
                    <li><a href="">Contact Us</a></li>
                </ul>
            </div>
            <div id="hambur">
                <a href="javascript:void(0);" onClick="myFunction()"><i class="far fa-bars"></i>bar</a>
            </div>
        </nav>
    </div>
    <div class="loginpage">
    <h1 class="logitle">Login</h1>
    <form action="../handle/signup_handle.php" method="post">
        <label for="" class="logi">Username<input type="text" placeholder="Username" name="uname"required>
        <p class="error"><?php
            if($error=='invaluser'){
                echo"Invalid Username";
            }
            elseif($error=='usertaken'){    
                echo"User name already taken";
            }elseif($error=="missing"){
                echo"Field cannot be left empty";
            }
        
        ?></p>
        </label>
        <label for="" class="logi">Email<input type="text" placeholder="Email" name="umail" required>
        <p class="error"><?php
            if($error=='invalmail'){
                echo"Enter a valid email address";
            }
            elseif($error=='missing'){
                echo"This field connot be left empty";
            }
            elseif($error=='mailtaken'){
                echo"Email already registered to another accouunt";
            }
        
        ?></p>
        </label>
        <label for="" class="logi">Password<input type="password" placeholder="Password" name="pwd" required>
            <p class="error">
                <?php
                if($error=="pwdlen"){
                    echo"pasword must be more than 6 characters long";
                }
                elseif($error=='missing'){
                    echo"Field cannot be left empty";
                }
                ?>
            </p>
            </label>
        <button class="loginbut" name="loginbut">Login</button>
    </form>
    <ul class="accounta">
        <li><a href="">Forgot Password?</a></li>
        <li><a href="">Don't have an account.</a></li>
    </ul>
    <h2><span>or</span></h2>
    <div class="social">
        <h5>Login with your social media account</h5>
        <div class="socialcol">
        <a href="" class="socialicons">Facebook</a>
        <a href="" class="socialicons">Google</a>
        <a href="" class="socialicons">Twitter</a>
            </div>
    </div>
        
    </div>
</body>
</html>