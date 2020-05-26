<?php
/*
include('sendmail/vendor/autoload.php');
require('vendor/phpmailer/phpmailer/src/PHPMailer.php');
*/
session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require '../../sendmail/vendor/phpmailer/phpmailer/src/Exception.php';
require '../../sendmail/vendor/phpmailer/phpmailer/src/PHPMailer.php';
require '../../sendmail/vendor/phpmailer/phpmailer/src/SMTP.php';
require('../../sendmail/vendor/autoload.php');
if(1){
  try{
  include('../../conf/pdo_conf.php');
  $total=0;
  $order=$_GET['ord'];
  $username=$_SESSION['username'];
  $number=$_GET['conf'];
  $sql="SELECT order_table.order_id, order_table.user_id, users_table.user_email, order_table.order_created, product_order_table.product_id, product_order_table.quantity,product_table.product_unit_price,product_table.product_name
  FROM users_table INNER JOIN (order_table INNER JOIN (product_table INNER JOIN product_order_table ON product_table.product_id = product_order_table.product_id) ON order_table.order_id = product_order_table.order_id) ON users_table.user_id = order_table.user_id
  WHERE (((order_table.order_id)=?))";
    $stmt=$pdo->prepare($sql);
    $stmt->execute([$order]);
    while($row=$stmt->fetch(PDO::FETCH_OBJ)){
      $total+=$row->product_unit_price;
    }
    $shippin = 0.03 * $total;
        $tax = 0.015 * $total;
    
        $sql="SELECT order_table.order_id, order_table.user_id, users_table.user_email, order_table.order_created, product_order_table.product_id, product_order_table.quantity,product_table.product_unit_price,product_table.product_name,product_table.product_desc
        FROM users_table INNER JOIN (order_table INNER JOIN (product_table INNER JOIN product_order_table ON product_table.product_id = product_order_table.product_id) ON order_table.order_id = product_order_table.order_id) ON users_table.user_id = order_table.user_id
        WHERE (((order_table.order_id)=?))";
          $stmt=$pdo->prepare($sql);
          $stmt->execute([$order]);
          $row=$stmt->fetch(PDO::FETCH_OBJ);
          $resp=$_SESSION['usermail'];
$mail = new PHPMailer();
$mail->IsSMTP();
$mail->Mailer = "smtp";
$mail->SMTPDebug  = 1;  
$mail->SMTPAuth   = TRUE;
$mail->SMTPSecure = "tls";
$mail->Port       = 587;
$mail->Host       = "smtp.gmail.com";
$mail->Username   = "cyrilleotieno7@gmail.com";
$mail->Password   = "STACYM456";
$mail->IsHTML(true);
$mail->AddAddress('cyrilleotieno83@gmail.com', "hello");
$mail->SetFrom('cyrilleotieno83@gmail.com', $username);
/*$mail->AddReplyTo("reply-to-email@domain", "reply-to-name");
$mail->AddCC("cc-recipient-email@domain", "cc-recipient-name");*/
$mail->Subject = "Test is Test Email sent via Gmail SMTP Server using PHP Mailer";

$content = "hello world";
$mail->MsgHTML($content); 
if(!$mail->Send()) {
  echo "Error while sending Email.";
  var_dump($mail);
} else {
  echo "Email sent successfully";
}}
catch(Exception $e){
  echo"error",$e->getMessage();
}}else{
  header("location:../index.php");
}
?>