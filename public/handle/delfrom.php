
<?php
session_start();
$items = $_SESSION['cart'];
$cartitems = explode(",", $items);
if(isset($_GET['remove']) & !empty($_GET['remove'])){
    $pdid = $_GET['remove'];
    $delitem=array_search($pdid,$cartitems);
    echo ("\n");
    print_r($cartitems);
    echo"\n";
    unset($cartitems[$delitem]);
    print_r($cartitems);
	$itemids = implode(",", $cartitems);
    $_SESSION['cart'] = $itemids;
}
header('location:../index.php');