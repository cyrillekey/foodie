<?php
session_start();
$items = $_SESSION['cart'];
$cartitems = explode(",", $items);
$total = 0;
$shippin = 0;
$tax = 0;
echo $_SESSION['username'];
echo $_SESSION['usermail'];
 session_destroy();
 echo"everything destroyed";