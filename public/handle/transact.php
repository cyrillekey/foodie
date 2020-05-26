<?php
include('../../conf/conf.php');
include('../../conf/pdo_conf.php');
session_start();
if(isset($_GET['status'])){
    $status=$_GET['status'];
}else{
    $status=null;
}
if(isset($_SESSION['username'])){
if ($status=="COMPLETED") {
    $items = $_SESSION['cart'];
    $cartitems = explode(",", $items);
    $total = 0;
    $shippin = 0;
    $tax = 0;
    $username = $_SESSION['username'];
    $status = 0;
    $orderid = uniqid();
    $receipt = uniqid();
    $orderkey=rand(100,999);
    if (count(array_filter($cartitems))>0) {
        $hasedpw=password_hash($orderkey,PASSWORD_DEFAULT);
        $sql = "INSERT into order_table values(?,?,NOW(),?,?,?)";
                    $stmt = $pdo->prepare($sql);
                    $stmt->execute(
                        array(
                            $orderid,
                            $username,
                            'shipped',
                            '',
                            $hasedpw

                        )
                    );
        foreach ($cartitems as $key => $pid) {
            $sql = "SELECT * FROM product_table where product_id='$pid'";
            $stmt = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($stmt, $sql)) {
                echo "failed to prepare";
            } else {
                #mysqli_stmt_execute($stmt);
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);
                
                try {
                    //We start our transaction.
                    $pdo->beginTransaction();/*
                    $sql = "INSERT into order_table values(?,?,NOW(),?,?)";
                    $stmt = $pdo->prepare($sql);
                    $stmt->execute(
                        array(
                            $orderid,
                            $username,
                            'shipped',
                            ''

                        )
                    );*/

                    $sql = 'SELECT * FROM product_table where product_id=?';
                    $stmt = $pdo->prepare($sql);
                    $stmt->execute(array(
                        $pid
                    ));

                    $sql = "insert into product_order_table(receipt_id,product_id,order_id,quantity) values(?,?,?,?)";
                    $stmt = $pdo->prepare($sql);
                    $stmt->execute(array(
                        $receipt,
                        $pid,
                        $orderid,
                        1
                    ));
                    //Query 2: Attempt to update the user's profile.
                    $sql = "UPDATE product_table SET product_stock = (product_stock-1) WHERE product_table.product_id = ?";
                    $stmt = $pdo->prepare($sql);
                    $stmt->execute(
                        array(
                            $pid
                        )
                    );

                    //We've got this far without an exception, so commit the changes.
                    $pdo->commit();
                }
                //Our catch block will handle any exceptions that are thrown.
                catch (Exception $e) {
                    //An exception has occured, which means that one of our database queries
                    //failed.
                    //Print out the error message.
                    echo $e->getMessage();
                    //Rollback the transaction.
                    $pdo->rollBack();
                }
            }
        }
        header("location:../html/mail.php?ord=$orderid & conf=$orderkey");
        exit();
    } else {
        header("location:../html/product.php");
        exit();
    }
} else {
    header("location:../html/payment.php");
    exit();
}}else{
    header("location:../html/login.php");
}
