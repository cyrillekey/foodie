<?php
session_start();
include('../../conf/conf.php');
if (isset($_SESSION['cart'])) {
    $items = $_SESSION['cart'];
    $cartitems = explode(",", $items);
    $total = 0;
    $shippin = 0;
    $tax = 0;
} else {
    $items = array();
    $cartitems = array();
    $total = 0;
    $shippin = 0;
    $tax = 0;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css" media="screen and (min-width:600px)">
    <link rel="stylesheet" media="screen and (max-width:600px)" href="../css/media.css">
    <style>
        p{
            margin-bottom: 2vh;
            margin:2vh 4vw ;
        }
        #paypalbutton{
            margin-top: 12vh;
        }
        #loader{
            display: none;
            position: absolute;
            margin-left: 30vw;
            margin-top: 30vh;
            width: 100vw;
            height: 100vh;
        }
        #loader {
  border: 16px solid #f3f3f3; /* Light grey */
  border-top: 16px solid #3498db; /* Blue */
  border-radius: 50%;
  width: 120px;
  height: 120px;
  animation: spin 2s linear infinite;
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}
    </style>
    <title>Payment</title>
</head>
<?php 
if(isset($_SESSION['username'])){
    if (count(array_filter($cartitems))>0) {
        foreach ($cartitems as $key => $pid) {
            $sql = "SELECT * FROM product_table where product_id='$pid'";
            $stmt = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($stmt, $sql)) {
                echo "failed to prepare";
            } else {
                #mysqli_stmt_execute($stmt);
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);
                $row = mysqli_fetch_assoc($result);
                $total += $row['product_unit_price'];
            }
        }

        $shippin = 0.03 * $total;
        $tax = 0.015 * $total;
    } else {
        $tax=0;
        $shippin=0;

    }
    
    echo'
    <body>
    <div id="loader"></div>
    <div id="main">
    <div class="progress">
        <ul class="progressbar">
            <li class="activeprog">Review Order</li>
            <li class="activeprog">Shipping details</li>
            <li class="activeprog">Submit order</li>
        </ul>
    </div>
    <h1 style="text-align:center;margin-top:2vh;">Make Payments</h1>
    <div class="paysumary" style="margin-top: 8vh;border:solid 1px black;margin:8vh 2vw 0 2vw; border-radius:6px;">
        <ul>
            <li>
                <span class="paylabel">Subtotal</span>
                <span class="payvalue">$'.$total.'</span>
            </li>
            <li>
                <span class="paylabel">Shipping</span>
                <span class="payvalue">$'.$shippin .'</span>
            </li>
            <li>
                <span class="paylabel">Tax</span>
                <span class="payvalue">$'.$tax.'</span>
            </li>
            <li>
                <span class="paylabel">Total</span>
                <span class="payvalue">$'. ($shippin + $tax + $total) .'</span>
            </li>
        </ul>

    </div>
    <div id="paypalbutton">
<p>By clicking this button,you agree with our terms and condition</p>
<script src="https://www.paypal.com/sdk/js?client-id=AeVCaJobS538JCRWnROUJcaS6ymyl9sdRarKB8WYd1tzZ-Np4tXloec-Q_Z2-5rCeLxkJZUajix_2HEC"></script>
</div>
<script>paypal.Buttons({
    createOrder: function(data, actions) {
      // This function sets up the details of the transaction, including the amount and line item details.
      return actions.order.create({
        purchase_units: [{
          amount: {
            value:'.round(($total+$shippin+$tax),2).',
            currency:"EUR"
          }
        }]
      }
      );
    },onApprove: function(data, actions) {
        // This function captures the funds from the transaction.
        var load=document.getElementById("loader");
        load.style.display="block";
        var pay=document.getElementById("main");
        pay.style.display="none";
        var pay2=document.getElementById("paypalbutton");
        pay2.style.display="none";
        return actions.order.capture().then(function(details) {
          // This function shows a transaction success message to your buyer.
          var id=details.purchase_units[0].payments.captures[0].id;
            var status=details.purchase_units[0].payments.captures[0].status;
            var capture=details.purchase_units[0].payments.captures[0].final_capture;

             var amount=details.purchase_units[0].payments.captures[0].amount.value;

          window.location.href="../handle/transact.php?status="+status+"& id="+id+"&amount="+amount+"&finalc="+capture;
         
        });
      }
    }).render("#paypalbutton");
    </script>
    </div>
    </body>


    ';
}
else{
    header('location:../html/login.php');
    exit();
}
?>
</html>



