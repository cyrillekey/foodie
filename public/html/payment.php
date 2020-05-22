<?php
$total=0;
$tax=0;$shippin=0;
include_once('../../conf/pay-conf.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css"  media="screen and (min-width:600px)">
    <link rel="stylesheet" media="screen and (max-width:600px)" href="../css/media.css" >
    <title>Payment</title>
</head>
<body>
<div class="progress">
        <ul class="progressbar">
            <li class="activeprog">Review Order</li>
            <li class="activeprog">Make Payment</li>
            <li>Submit order</li>
        </ul>
    </div>
    <div class="paysumary">
        <ul>
            <li>
                <span class="paylabel">Subtotal</span>
                <span class="payvalue">$25</span>
            </li>
            <li>
                <span class="paylabel">Shipping</span>
                <span class="payvalue">$25</span>
            </li>
            <li>
                <span class="paylabel">Tax</span>
                <span class="payvalue">$25</span>
            </li>
            <li>
                <span class="paylabel">Total</span>
                <span class="payvalue">$25</span>
            </li>
        </ul>

    </div>
    <div class="shiping">

    </div>
    <div class="payment">
    </div>
</body>
</html>