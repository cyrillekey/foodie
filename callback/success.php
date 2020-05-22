<?php 


//save Trasaction information form PayPal 

$item_number = $_GET['item_number'];  
    $txn_id = $_GET['tx']; 
    $payment_gross = $_GET['amt']; 
    $currency_code = $_GET['cc']; 
    $payment_status = $_GET['st'];
/*
//Get product price 

$productResult = $db->query("SELECT price FROM products WHERE id = ".$item_number); 

$productRow = $productResult->fetch_assoc(); 

$productPrice = $productRow['price']; 
*/
if(!empty($txn_id) && $payment_gross == 450){ 



?> 

<h1>Your payment has been successful.</h1> 

    <h1>Your Payment ID - <?php echo $txn_id; ?>.</h1> 

<?php 

}else{ 

?> 

<h1>Your payment has failed.</h1> 

<?php 

} 

?>