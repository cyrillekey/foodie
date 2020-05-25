<?php
  include('../../conf/pdo_conf.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/account.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-alpha.3/css/materialize.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins|Work+Sans|Ubuntu">
    <title>Account</title>
    <script src="../js/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-alpha.3/js/materialize.min.js"></script>
    <script>
      $(document).ready(function(){
    $('.tabs').tabs({
      swipeable: true
    });
    $('.review').on('click',function(){
      $('.review-information').slideToggle(500);
      $('.fa-angle-right').toggleClass('rotate');
    });
    $('.review1').on('click',function(){
      $('.review-information1').slideToggle(500);
      $('.fa-angle-right').toggleClass('rotate');
    });
    $('.sidenav').sidenav();
  });
    </script>
    <script>
        function myfunctionbacc(){
            window.history.back();
        }

    </script>
</head>
<body>
  <?php
    session_start();
    if(isset($_SESSION['username'])){
      echo'
      <div class="hide-on-large-only">
      <nav>
        <div class="container-fluid">
    
        <a href="Javascript:void(0)" onclick="myfunctionbacc();" style="margin-left:2vw;"><i class="fa fa-arrow-left"></i></a>
        <a href="../index.php" style="margin-top: 2vh;"><i class="material-icons right">home</i></a>
    
        </div>
    
      </nav>
      <Section class="profile-card">
        <div class="pro-picture">
       
        </div>
        <div class="center">
        <p>
        <span class="photo-name">'.$_SESSION['username'].'</span>
      <br>
      <span class="white-text" style="font-size:14px;"><i class="fa fa-map-marker white-text">&nbsp; &nbsp; </i>'.$_SESSION['usermail'].'</span>
      </p>
    </div >
    </p>
    </div >
   </Section>
    <ul id="tabs-swipe-demo" class="tabs">
      <li class="tab col s3 "><a href="#test-swipe-1"></i>&nbsp;Overview</a></li>
      <li class="tab col s3"><a class="active" href="#test-swipe-2"></i>&nbsp;Coupons</a></li>
      <li class="tab col s3"><a href="#test-swipe-3"></i>&nbsp;Reviews</a></li>
    </ul>
    <div id="test-swipe-1" class="col s12 hoverable">
      <br>
      <div class="container ">
        <div class="row">
           <p class="review col s12" style="font-weight:bolder; font-family: "Poppins", sans-serif;"> Profile <i class="fa fa-angle-right right" style="font-weight:bolder"></i><br><br></p>
        <p class="review-information">
            still under construction
          <br>
        </p>
        
        <p class="review1 col s12" style="font-weight:bolder; font-family: "Poppins", sans-serif;"> Orders <i class="fa fa-angle-right right" style="font-weight:bolder"></i><br><br></p>
        <div class="review-information1">
        <ul class="orders">
            <li style="font-weight:bold;border-bottom:solid 1px black;"><a href="">Order ID</a><span>Status</span></li>';

        $sql="SELECT * FROM order_table WHERE user_id=? ORDER BY order_created DESC";
        $stmt=$pdo->prepare($sql);
        $stmt->execute([$_SESSION['username']]);
        while($row=$stmt->fetch(PDO::FETCH_OBJ)){
            echo'<li ><a href="mail.php?ord='.$row->order_id.'">'.$row->order_id.'</a><span>'.$row->order_status.'</span></li>';
          }
          echo'<br>
          <br>
        </div>    
        <p class="col s12" style="font-weight:bolder;font-family: "Poppins", sans-serif;">My Reviews<i class="fa fa-angle-right right" style="font-weight:bolder"></i><br><br></p>
        
        <p class="col s12" style="font-weight:bolder;font-family: "Poppins", sans-serif;"><a href="../handle/clearcart.php">Logout</a> <i class="fa fa-angle-right right" style="font-weight:bolder"></i><br><br></p>
            
        
        
      </div>
    </div>

  </div>
    <div id="test-swipe-2" class="col s12 ">
      <div style="min-height:30vh; background-image:url("http://www.defundtheitu.org/wp-content/uploads/2014/08/HostGator-Coupons.png")" >
            <p>Hello world</p>
      </div>
   </div>
    <div id="test-swipe-3" class="col s12 ">Test 3</div>
   
</div>
      ';

    }
    else{
      header("location:login.php");
      exit();
    }
  
  ?>   
</body>
</html>