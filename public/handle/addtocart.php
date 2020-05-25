<?php
session_start();
if(isset($_GET['loca'])){
    $loca=1;
}else{
    $loca=0;
}
if(isset($_SESSION['cart']) & !empty($_SESSION['cart'])){
    $items=$_SESSION['cart'];
    $cartitems=explode(",",$items);
    if (in_array($_GET['pdid'],$cartitems)) {
        if($loca==0){
        header("Location:../index.php?status=incart");
    }
        else{
            header("Location:../html/product.php?status=incart");
        }
    }
    else{
        $items .=",".$_GET['pdid'];
        $_SESSION['cart']=$items;
        if($loca==0){
        header("Location:../index.php?status=success");
        }
        else{
            header("Location:../html/product.php?status=success");  
        }
    }
}else{
        $items =$_GET['pdid'];
        $_SESSION['cart']=$items;
        if($loca==0){
        header("Location:../index.php?status=success");
        }
        else{
            header("Location:../html/product.php?status=success");  
        }
}