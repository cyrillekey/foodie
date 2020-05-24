
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
if(isset($_GET['loca'])){
    $loca=$_GET['loca'];
    if($loca==2){
        header('location:../html/checkout.php');
    }
    elseif($loca==3){
        header("location:../html/product.php");
    }
}else{

header('location:../index.php');
}