<?php
session_start();
$items = $_SESSION['cart'];
$cartitems = explode(",", $items);
$total = 0;
$shippin = 0;
$tax = 0;
session_destroy();
header("location:../index.php");
exit();