<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--<link rel="stylesheet" href="../css/style.css" media="screen and (min-width:600px)">
    <link rel="stylesheet" media="screen and (max-width:600px)" href="../css/media.css">
--><link rel="stylesheet" href="../css/check.css">
    <title>Shipping</title>
</head>
<body>
<div class="wrap">
  <div class="gov"> 
<!--  Checkout Flow    -->
<div class="progress">
        <ul class="progressbar">
            <li class="activeprog">Review Order</li>
            <li class="activeprog">Shipping details</li>
            <li>Submit order</li>
        </ul>
    </div>
  <div class="forms cf">
    <h3 class="sectionHead cf"><span>1</span>Shipping Information</h3>
    <form action="handle.php" method="post">
    <ul id="shippingInfo" class="shippingInfo cf">
      <li><label for="first Name" class="active">First Name</label>
        <input type="text" /></li>
      <li><label for="Last Name">Last Name</label>
        <input type="text" />
      </li>
      <li><label for="Company">Company <span>(optional)</span></label>
        <input class="optional" type="text" />
      </li>
      <li><label for="country">Country</label>
        <input type="text" />
      </li>
      <li><label for="Address Line 1">Address Line 1</label>
        <input type="text" />
      </li>
      <li><label for="Address Line 2">Address Line 2</label>
        <input type="text" />
      </li>
      <li><label for="City"> City</label>
        <input type="text" />
      </li>
      <li><label for="State">State</label>
        <input type="text" />
      </li>
       <li><label for="Zip Code">Zip Code</label>
         <input type="text" />
      </li>
       <li><label for="Phone Number">Phone Number<span class="example">XXX-XXX-XXXX</span></label>
         <input type="text" />
      </li>
      <li> 
         <input type="submit" value="Continue" class="btn"> 
      </li>
    </ul>
    </form>
    
<!-- Billing Info -->
    
  </div>
</div>
  </div>
</body>
</html>