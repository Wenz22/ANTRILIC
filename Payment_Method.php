<?php

include("includes/connectiondb.php");
include("function/all-common-function.php");
session_start();
$ip = getIPAddress();
$selec_query = "select * from `cart` where `ip_address` = '$ip'";
$resul = mysqli_query($conn, $selec_query);
$resul_count=mysqli_num_rows($resul);
if($resul_count > 0){
  
}else{
  echo '<script>window.location.href="/Anti_Relic/html/index.php"</script>';
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
    <style>
        body{
            overflow-x: hidden;
        }
    </style>

</head>
<body>



<!--nuv section-->
<div class = "row">
    <div class="col-md-3  my-3 border-end pe-3">
    <a class="ms-5 " href="index.php"><img class = "img-logo  " src="Img/ant-relic-logo.png" alt="ant relic llogo"></a>

    </div>
    <div  class = "col-md-4 my-4 ms-5 border-end">
        <h2 class = "fw-bold">SHOPPING CHECK OUT</h2>
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
<h1 class = "text-center my-5 fw-bold text-primary-emphasis">Choose Payment Method</h1>
<div class = "">
    <div class = "d-flex ms-3 mt-5">
        <div class = "mx-5 rounded-4  mt-5 border">
            <a href="http://www.paypal.com"> <img src="Img/paypal.jpg" class ="rounded-4 shadow object-fit-fill" style="width:380px; height:280px" alt=""></a>
        </div>
        <div class = "me-5 rounded-4 mt-5 border">
            <a href=""><img style="width:380px; height:280px"  src="Img/card.webp" class = "rounded-4 shadow object-fit-fill" alt=""></a>

        </div>
        <div class = "me-5 rounded-4 mt-5 border">
                    <a href="buying.php"><img style="width:380px; height:280px"  src="Img/ofline2.webp" class = " rounded-4  shadow object-fit-fill" alt=""></a>

         </div>
    </div>
</div>


    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    
</body>
