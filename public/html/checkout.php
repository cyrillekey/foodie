<?php
session_start();
    include('../../conf/conf.php');
    if(isset($_SESSION['cart'])){
    $items=$_SESSION['cart'];
    $cartitems=explode(",",$items);
    $total=0;
    $shippin=0;
    $tax=0;
}
else{
    $items=array();
    $cartitems=array();
    $total=0;
    $shippin=0;
    $tax=0;
}
?>
<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css"  media="screen and (min-width:600px)">
    <link rel="stylesheet" media="screen and (max-width:600px)" href="../css/media.css" >
    <title>Checkout</title>
</head>
<body><div class="review">
 <div class="progress">
        <ul class="progressbar">
            <li class="activeprog">Review Order</li>
            <li>Shipping details</li>
            <li>Submit order</li>
        </ul>
    </div>

    <div class="wrap cf">
        <div class="heading cf">
            <h1>Review Cart</h1>
            <a href="product.php" class="continue">Continue Shopping</a>

        </div>
        <div class="cartrev">
            <ul class="cartWrap">
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
                             <li class="items odd">
                             <div class="infoWrap">
                                 <div class="cartSection">
                                     <img src="../img/'.$row['product_image'].'" alt="" class="itemImg">
                                     <h3>'.$row['product_name'].'</h3>
                                     <p><Input type="text" class="qty" placeholder="1">x $'.$row['product_unit_price'].'</Input></p>
                                     <p class="stockStatus">In Stock</p>
                                 </div>
                                     <div class="prodTotal cartSection">
                                         <p>$'.$row['product_unit_price'].'</p>
                                     </div>
                                     <div class="cartSection removeWrap">
                                         <a href="../handle/delfrom.php?loca=2 & remove='.$row['product_id'].'" class="remove">X</a>
                                     </div>   
                                 </div>
                         </li>
                             ';      
                         $total+=$row['product_unit_price'];
                     }
                 
                 }
                 
                 $shippin=0.03*$total;
                 $tax=0.015*$total;
                }else{
                    echo'
                    <li class="items">Shop first
                    </li>';
                }
                ?>

                
            </ul>
        </div>
        <div class="promocode">
            <label for="promo">Have a promo code?</label>
            <input type="text" name="promo" placeholder="Enter code">
            <a href="" class="btn"></a>
        </div>
        <div class="subtotal cf">
            <ul>
                <li class="totalRow">
                    <span class="label">Subtotal</span>
                    <span class="value"><?php echo "$$total.00"?></span>

                </li>
                <li class="totalRow">
                    <span class="label">Shipping</span>
                    <span class="value">$<?php echo "$shippin"?></span>
                </li>
                <li class="totalRow">
                    <span class="label">Tax</span>
                    <span class="value">$<?php echo "$tax"?></span>
                </li>
                <li class="totalRow final">
                    <span class="label">Total</span>
                    <span class="value">$<?php echo ($total+$shippin+$tax);?></span>

                </li>
                <li class="totalRow"><?php
                    if(isset($_SESSION['username'])){
                    echo'<a href="../html/payment.php" class="btn continue">Checkout</a>';
                    exit();
                    }else{
                        echo'<a href="../html/login.php" class="btn continue">Checkout</a>';
                        exit();
                    }
                ?></li>
            </ul>
        </div>
    </div>
</div>
</body>
</html>