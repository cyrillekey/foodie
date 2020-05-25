<?php
session_start();
$itemaded=$_POST['pdid'];
if(isset($_GET['loca'])){
    $loca=1;
}else{
    $loca=5;
}
if(isset($_SESSION['cart']) & !empty($_SESSION['cart'])){
    $items=$_SESSION['cart'];
    $cartitems=explode(",",$items);
    if (in_array($itemaded,$cartitems)) {
      echo'failed';
    }
    else{
        $items .=",".$itemaded;
        $_SESSION['cart']=$items;
        echo'success';
    }
}else{
        $items =$itemaded;
        $_SESSION['cart']=$items;
        echo'success';
       }