<?php
$pdo = new PDO('mysql:host=localhost;dbname=foodie', 'cyrille', '123456', array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_EMULATE_PREPARES => false
));