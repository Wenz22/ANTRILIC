<?php

include("includes/connectiondb.php");
include("function/all-common-function.php");
@session_start();


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

<?php
//calling add to cart function
 add_to_cart();
?>
<?php
        global $conn;
        $user_ip = getIPAddress();
        $get_user = "select * from `user` where `user_ip` = '$user_ip'";
        $get_result = mysqli_query($conn,$get_user);
        $get_row = mysqli_fetch_assoc($get_result);
        $user_id = $get_row['user_id'];
?>
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
          <a class="nav-link fs-5 mx-2"  href="about-us.php">About us</a>
        </li>
        <li class="nav-item">
          <a class="nav-link fs-5 mx-2" href="contact-us.php">Contact us</a>
        </li>
        <li class="nav-item">
          <a class="nav-link fs-5 mx-2" href="help-and-support.php" >Help & support</a>
        </li>
      </ul>
    </div>
</div>
<div class = "container">
    <div class ="d-flex justify-content-center align-items-center" style ="margin-top:120px;">
        <img  class = "me-4"src="Img/delivery-truck 1.png" alt="">
        <div>
            <p class = "fw-bold">Order successful</p>
            <h1 clas = "fw-bold">Thank you for your order!</h1>
            <p class = "fs-3">Order number is: <b> <?php echo$_SESSION ['invoice_number']; ?></b></p>
            <p class = "fs-6 text-black-50">You can track your order in “My Order” section</p>
            <div class = "row">
                <div class = "col-md-5">
                    <a href="profile.php?myorder" class = "btn btn-dark fw-bold rounded-pill p-2 w-100">Track my order</a>
                </div>
                <div class = "col-md-5">
                    <a href="index.php" class = "btn btn-outline-dark fw-bold rounded-pill p-2 w-100 ">Continue shopping</a>
                </div>
            </div>

        </div>
    </div>

</div>

  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    
</body>
