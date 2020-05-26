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
$mail->SMTPDebug  = 0;  
$mail->SMTPAuth   = TRUE;
$mail->SMTPSecure = "tls";
$mail->Port       = 587;
$mail->Host       = "smtp.gmail.com";
$mail->Username   = "FOODIEKEN@gmail.com";
$mail->Password   = "WHYDOYOUCARE";
$mail->IsHTML(true);
$mail->AddAddress( $resp, "hello");
$mail->SetFrom('cyrilleotieno83@gmail.com', 'Foodie ');
/*$mail->AddReplyTo("reply-to-email@domain", "reply-to-name");
$mail->AddCC("cc-recipient-email@domain", "cc-recipient-name");*/
$mail->Subject = "Foodie";

/*****************formated mail */
    ob_start();
  session_start();
  include('../../conf/pdo_conf.php');
  $total=0;
  $order=$_GET['ord'];
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
          echo'
<!DOCTYPE html>
<html lang="en">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	
  <title>Invoice</title>
<style>
    /*
	 CSS-Tricks Example
	 by Chris Coyier
	 http://css-tricks.com
  */

  * { margin: 0; padding: 0; }
  body { font: 14px/1.4 Georgia, serif; }
  #page-wrap { width: 800px; margin: 0 auto; }

  textarea { border: 0; font: 14px Georgia, Serif; overflow: hidden; resize: none; }
  table { border-collapse: collapse; }
  table td, table th { border: 1px solid black; padding: 5px; }

  #header { height: 15px; width: 100%; margin: 20px 0; background: #222; text-align: center; color: white; font: bold 15px Helvetica, Sans-Serif; text-decoration: uppercase; letter-spacing: 20px; padding: 8px 0px; }

  #address { width: 250px; height: 150px; float: left; }
  #customer { overflow: hidden; }

  #logo { text-align: right; float: right; position: relative; margin-top: 25px; border: 1px solid #fff; max-width: 540px; max-height: 100px; overflow: hidden; }
  #logo:hover, #logo.edit { border: 1px solid #000; margin-top: 0px; max-height: 125px; }
  #logoctr { display: none; }
  #logo:hover #logoctr, #logo.edit #logoctr { display: block; text-align: right; line-height: 25px; background: #eee; padding: 0 5px; }
  #logohelp { text-align: left; display: none; font-style: italic; padding: 10px 5px;}
  #logohelp input { margin-bottom: 5px; }
  .edit #logohelp { display: block; }
  .edit #save-logo, .edit #cancel-logo { display: inline; }
  .edit #image, #save-logo, #cancel-logo, .edit #change-logo, .edit #delete-logo { display: none; }
  #customer-title { font-size: 20px; font-weight: bold; float: left; }

  #meta { margin-top: 1px; width: 300px; float: right; }
  #meta td { text-align: right;  }
  #meta td.meta-head { text-align: left; background: #eee; }
  #meta td textarea { width: 100%; height: 20px; text-align: right; }

  #items { clear: both; width: 100%; margin: 30px 0 0 0; border: 1px solid black; }
  #items th { background: #eee; }
  #items textarea { width: 80px; height: 50px; }
  #items tr.item-row td { border: 0; vertical-align: top; }
  #items td.description { width: 300px; }
  #items td.item-name { width: 175px; }
  #items td.description textarea, #items td.item-name textarea { width: 100%; }
  #items td.total-line { border-right: 0; text-align: right; }
  #items td.total-value { border-left: 0; padding: 10px; }
  #items td.total-value textarea { height: 20px; background: none; }
  #items td.balance { background: #eee; }
  #items td.blank { border: 0; }

  #terms { text-align: center; margin: 20px 0 0 0; }
  #terms h5 { text-transform: uppercase; font: 13px Helvetica, Sans-Serif; letter-spacing: 10px; border-bottom: 1px solid black; padding: 0 0 8px 0; margin: 0 0 8px 0; }
  #terms textarea { width: 100%; text-align: center;}

  textarea:hover, textarea:focus, #items td.total-value textarea:hover, #items td.total-value textarea:focus, .delete:hover { background-color:#EEFF88; }
  .logop{
    font-family: "Satisfy", cursive;
    font-size: 30px;
    font-weight: 400;
    color: black;
    text-decoration: none;

}
  .delete-wpr { position: relative; }
  .delete { display: block; color: #000; text-decoration: none; position: absolute; background: #EEEEEE; font-weight: bold; padding: 0px 3px; border: 1px solid; top: -6px; left: -22px; font-family: Verdana; font-size: 12px; }
    </style>

</head>

<body>

	<div id="page-wrap">

		<p id="header">INVOICE</p>
		
		<div id="identity">
		
            <p id="address">'. $_SESSION['username']
            .'
            <br>
123 Appleseed Street
Appleville, WI 53719

Phone: (555) 555-5555</p>

            <div id="logo">
            <a href="" class="logop">Foodie</a>
            </div>
		
		</div>
		
		<div style="clear:both"></div>
		
		<div id="customer">

            <p id="customer-title">Foodie Home of Happy Meals.</p>

            <table id="meta">
                <tr>
                    <td class="meta-head">Invoice #</td>
                    <td><p>'. $_GET['ord'].'</p></td>
                </tr>
                <tr>

                    <td class="meta-head">Date</td>
                    <td><p id="date">'.$row->order_created.'</p></td>
                </tr>
                <tr>
                    <td class="meta-head">Confirmation Key</td>
                    <td><div class="due">#'.$_GET['conf'].'</div></td>
                </tr>

            </table>
		
		</div>
		
		<table id="items">
		
		  <tr>
		      <th>Item</th>
		      <th>Description</th>
		      <th>Unit Cost</th>
		      <th>Quantity</th>
		      <th>Price</th>
      </tr>';
     
      
      while($row=$stmt->fetch(PDO::FETCH_OBJ)){
        echo'<tr class="item-row">
        <td class="item-name"><div class="delete-wpr"><p style="text-transform:capitalize">'.$row->product_name.'</p></div></td>
        <td class="description"><p style="text-transform:capitalize">'.$row->product_desc.'</p</td>
        <td><p class="cost">'.$row->product_unit_price.'</p></td>
        <td><p class="qty">1</p></td>
        <td><span class="price">'.$row->product_unit_price.'</span></td>
        </tr>';
      }
echo'
		  <tr id="hiderow">
		    <td colspan="5"></td>
		  </tr>
		  
		  <tr>
		      <td colspan="2" class="blank"> </td>
		      <td colspan="2" class="total-line">Subtotal</td>
		      <td class="total-value"><div id="subtotal">$'.$total.'</div></td>
		  </tr>
		  <tr>

		      <td colspan="2" class="blank"> </td>
		      <td colspan="2" class="total-line">Shipping</td>
		      <td class="total-value"><div id="total">$'.$shippin.'</div></td>
		  </tr>
		  <tr>
		      <td colspan="2" class="blank"> </td>
		      <td colspan="2" class="total-line">Tax</td>

		      <td class="total-value"><p id="paid">$'.$tax.'</p></td>
		  </tr>
		  <tr>
		      <td colspan="2" class="blank"> </td>
		      <td colspan="2" class="total-line balance">Grand Total</td>
		      <td class="total-value balance"><div class="due">$'.($total+$tax+$shippin).'</div></td>
		  </tr>
		
		</table>
		
		<div id="terms">
		  <h5>Terms</h5>
		  <p>I item is not delivered in one day please contact us to rectify.
			  Thank you for shopping at foodie.
		  </p>
		</div>
	
	</div>
	
</body>

</html>';
$code=ob_get_contents();ob_end_flush();
$content = $code;
$mail->MsgHTML($content); 
if(!$mail->Send()) {
  echo "Error while sending Email.";
  //var_dump($mail);
} else {
  echo "Email sent successfully";
}}
catch(Exception $e){
  echo"error",$e->getMessage();
}}else{
  header("location:../index.php");
}
?>