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
    <title>Payment</title>
</head>

<body>
    <?php
    if (count(array_filter($cartitems))) {
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
    }
    ?>
    <div class="progress">
        <ul class="progressbar">
            <li class="activeprog">Review Order</li>
            <li class="activeprog">Shipping details</li>
            <li class="activeprog">Submit order</li>
        </ul>
    </div>
    <div class="paysumary">
        <ul>
            <li>
                <span class="paylabel">Subtotal</span>
                <span class="payvalue">$<?php echo $total ?></span>
            </li>
            <li>
                <span class="paylabel">Shipping</span>
                <span class="payvalue">$<?php echo $shippin ?></span>
            </li>
            <li>
                <span class="paylabel">Tax</span>
                <span class="payvalue">$<?php echo $tax ?></span>
            </li>
            <li>
                <span class="paylabel">Total</span>
                <span class="payvalue">$<?php echo $shippin + $tax + $total ?></span>
            </li>
        </ul>

    </div>
    <div class="shiping">
        <form action="" method="post">
            
        </form>
    </div>
    <div class="payment">
    </div>
</body>

</html>