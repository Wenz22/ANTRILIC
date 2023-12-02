`<?php
include("includes/connectiondb.php");
include("function/all-common-function.php");
session_start();
if(isset($_GET['order_number'])){
    $invoice_number = $_GET['order_number'];
    $get_data = "select * from `user_order` where `invoice_number` = $invoice_number";
    $data_result = mysqli_query($conn,$get_data);
    $row_fetch = mysqli_fetch_assoc($data_result);
    $user_id = $row_fetch['user_id'];
    $inv_number = $row_fetch['invoice_number'];
    $price =  $row_fetch['amount_due' ];
    $order_id=$row_fetch['order_id' ];
    $_SESSION ['invoice_number']= $row_fetch['invoice_number'];
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/f32ff935f8.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="CSS/style.css">
    <link rel="shortcut icon" href="Img/ant.png" type="image/x-icon">
    <title>ANT RELIC</title>

</head>
<body>

<div class = "row">
    <div class="col-md-3  my-3 border-end pe-3">
    <a class="ms-5 " href="index.php"><img class = "img-logo  " src="Img/ant-relic-logo.png" alt="ant relic llogo"></a>

    </div>
    <div  class = "col-md-4 my-4 ms-5 border-end">
        <h2 class = "fw-bold">Confirm Payment</h2>
    </div>
    <div class="col">
      <ul class=" d-flex list-inline my-4 mx-2 ">
        <li class="nav-item">
          <a class="nav-link fs-5 mx-2"  href="#">About us</a>
        </li>
        <li class="nav-item">
          <a class="nav-link fs-5 mx-2" href="#">Contact us</a>
        </li>
        <li class="nav-item">
          <a class="nav-link fs-5 mx-2" href="#" >Help & support</a>
        </li>
      </ul>
    </div>
</div>
<form action="" method="post">
 <div class= "row">
    <div class="col-md-5  " style = "margin-left: 200px; margin-top:80px;">
        <div>
        <h1 class = "my-3">Confirm and pay</h1>
        </div>
    
        <div class = "d-flex justify-content-between border-top">
            <h3 class = "my-3">Pay with</h3>
            <div class="dropdown mt-3 ">
            <p class="text-black dropdown-toggle fw-bold" type="button" id="dropdownMenuDark" data-bs-toggle="dropdown" aria-expanded="false">
               Choose Payment
            </p>

            <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="dropdownMenuDark">
            <li class="nav-link "><a class="nav-link dropdown-item m-2 " href='payment.php?card=<?php echo$inv_number;?>'>Card</a></li>
            <li class="nav-link "><a class="nav-link dropdown-item m-2 " href='payment.php?paypal=<?php echo$inv_number;?>'>Paypal</a></li>
            <li class="nav-link "><a class="nav-link dropdown-item m-2 " href='payment.php?cod=<?php echo$inv_number;?>'>Cash on delivery</a></li>
            </ul>   

        </div>
            
        </div>
      
        <?php
    if(isset($_GET['paypal'])){
        include('paypal.php');
    }
    if(isset($_GET['cod'])){
            include('cod.php');

    }
    if(isset($_GET['card'])){
            include('card.php');
            

    }
    ?>
     </form>
    </div>
    <div class = "col-md-3" style = "margin-top:130px; margin-left:80px;">
        <h4 class="my-4">Price details</h4>
        <div class="d-flex justify-content-between">
            <p class = "text-black-50 fw-bold">Merchandise Price</p>
            <p class = "text-black-50">₱ <?php echo $price; ?> </p>
        </div>
        <div class="d-flex justify-content-between">
            <p class = "text-black-50 fw-bold">Shipping</p>
            <p class = "text-black-50">₱ 120</p>
        </div>
        <div class="d-flex justify-content-between">
            <p class = "text-black-50 fw-bold" >Total (PHP)</p>
            <p class = "text-black-50">₱<?php echo $price + 120; ?></p>
        </div>

    </div>






 </div>

    
  
    
    



    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    
</body>
