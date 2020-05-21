<?php
session_start();
include('../../conf/conf.php');
?>
  <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/style.css"  media="screen and (min-width:600px)">
    <link rel="stylesheet" media="screen and (max-width:600px)" href="../css/media.css" >
</head>

<body>
    <div class='row'>
        
    <?php
             $sql = "SELECT * FROM product_table";
             $stmt = mysqli_stmt_init($conn);
             if (!mysqli_stmt_prepare($stmt, $sql)) {
                 echo "failed to prepare";
             } else {
                 mysqli_stmt_execute($stmt);
                 $result = mysqli_stmt_get_result($stmt);
                 while ($row1 = mysqli_fetch_assoc($result)) {
                         echo'
                 <div class="product--blue">
               <div class="product_inner">
                 <img src="../img/'.$row1['product_image'].'" width="300">
                 <p>'.$row1['product_name'].'</p>
                 <p>' . $row1['product_desc'] . '</p>
                 <p>Price '.$row1['product_unit_price'].'</p>
                 <a href="../handle/addtocart.php?loca=produc & pdid='.$row1['product_id'].'">
                 <button>Add to basket</button>
                 </a>
               </div>
               <div class="product_overlay">
                 <h2>Added to basket</h2>
                 <i class="fa fa-check"></i>
               </div>
             </div>';
                 }
                }
             echo'
            </div>
            </body>
            
            </html>';
        ?>





