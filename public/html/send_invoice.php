<?php
require_once '../../vendor/autoload.php';
$transport=(new Swift_SmtpTransport('smtp.gmail.com',456,"ssl") )
->setUSername('cyrilleotieno7@gmail.com'
->setPassword('STACYM456'));
$mailer=new Swift_Mailer($transport);
$message=(new Swift_Message("Invoice"))
    ->setFrom(array('cyrilleotieno7@gmail.com'=>'Cyrille'))
    ->setTo(array('cyrilleotieno83@gmail.com'))
    ->setBody("hello it worked");
    $result=$mailer->send($message);
    if($result){
        echo"sent";
    }else{
        echo"failed";
    }

;