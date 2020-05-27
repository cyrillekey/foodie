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
    ////"../handle/transact.php?status="+details.status+"& id="+id+"&amount="+amount+"&finalc="+capture;
    $tranid=$_GET['id'];
    $amount=$_GET['amount'];
    $capture=$_GET['finalc'];
    $username = $_SESSION['username'];
    $orderid = uniqid();
    $receipt = uniqid();
    $orderkey=rand(100,999);
    if (count(array_filter($cartitems))>0) {
        $hasedpw=password_hash($orderkey,PASSWORD_DEFAULT);
        try{
        $pdo->beginTransaction();
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
                    $sql="INSERT INTO payment_table(payment_id,order_id,payment_amount,payment_status,payment_final_capture) VALUES(?,?,?,?,?)";
                    $stmt=$pdo->prepare($sql);
                    $stmt->execute(array(
                        $tranid,
                        $orderid,
                        $amount,
                        $status,
                        $capture
                    ));
                $pdo->commit();
                }catch(Exception $e){
                    echo $e->getMessage();
                    //Rollback the transaction.
                    $pdo->rollBack();
                    exit();
                }

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
                    $pdo->beginTransaction();
                    

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
                    


                    $sql="INSERT INTO payment_table(payment_id,order_id,payment_amount,payment_status,payment_final_capture) VALUES(?,?,?,?,?)";
                    $stmt=$pdo->prepare($sql);
                    $stmt->execute(array(
                        $tranid,
                        $orderid,
                        $amount,
                        $status,
                        $capture
                    ));

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
                    exit();
                }
            }
        }
        unset($_SESSION['cart']);
        header("location:../html/send_invoice.php?ord=$orderid&conf=$orderkey");
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
