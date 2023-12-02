<?php

include("includes/connectiondb.php");
include("function/all-common-function.php");
session_start();
$_SESSION['email'];
$email = $_SESSION['email'];
$get_user="select * from `user` where `email`= '$email'";
$get_result = mysqli_query($conn,$get_user);
$row_fetch = mysqli_fetch_assoc($get_result);
$user_id = $row_fetch['user_id'];
$getshop = "select * from `shop` where `user_id` = $user_id";
$shop = mysqli_query($conn,$getshop);
$num_row = mysqli_num_rows($shop);
$row_num=mysqli_fetch_assoc($shop);


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

<?php
//calling add to cart function
 add_to_cart();
?>

<!--nuv section-->
<nav class="navbar navbar-expand-xl" >
  <div class="container-fluid m-3">
    <!--logo -->
    <a class="navbar-brand " href="index.php"><img class = "img-logo  " src="Img/ant-relic-logo.png" alt="ant relic llogo"></a>
   <!--search and categories -->
    <form action = "Search.php" method ="Get" class="input-group w-50 border  rounded navbar-brand ms-5"  >
        <input type="search" name = "Serachinput" class="form-control border-0" aria-label="Search " placeholder = "Search Producs">

        <button type="button" class="btn btn-outline-secondary dropdown-toggle dropdown-toggle-split border-0 " data-bs-toggle="dropdown" aria-expanded="false">
          All Categories<span class="visually-hidden">Toggle Dropdown</span>
        </button>
        <!--dropdown menu -->
        <button type="submit" name = "Searchbtn" class="btn btn-outline-secondary border-0 border-start" value ="search"><i class="fa-solid fa-magnifying-glass" style="color: #000000;"></i></button>
        
        <ul class="dropdown-menu dropdown-menu-end p-3">
           <li class="nav-link "><a class="nav-link dropdown-item m-2 " href='all-product.php'>All Product</a></li>
            <?php
            // calling a dropdown_catigories fumction
              dropdown_catigories();
            ?>
          </ul> 
    </form>

    <!--for about us, contact,help support -->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarLight" aria-controls="navbarLight" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse show navbar-brand ms-5" id="navbarLight">
      <ul class="navbar-nav me-auto mb-2 mb-xl-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="about-us.php">About us</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="contact-us.php">Contact us</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="help-and-support.php" >Help & support</a>
        </li>
      </ul>
  
    </div>
  </div>
</nav>
 <!--second nav bar -->
    <div class="menu-bar1">
       <div class="dropdown ">
            <h2 class="text-white dropdown-toggle" type="button" id="dropdownMenuDark" data-bs-toggle="dropdown" aria-expanded="false">
            Categories
            </h2>

            <ul class="dropdown-menu dropdown-menu-dark p-3" aria-labelledby="dropdownMenuDark">
            <li class='nav-link '><a class='nav-link dropdown-item m-2 ' href='#'>All Product</a></li>
            <?php
            // calling a dropdown_catigories fumction
            dropdown_catigories();
            ?>
          </ul>   

        </div>
        <div class="dropdown">
            <p class="text-white dropdown-toggle" type="button" id="dropdownMenuDark" data-bs-toggle="dropdown" aria-expanded="false">
                PHP
            </p>
            <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="dropdownMenuDark">
                <li><a class="dropdown-item" href="#">Action</a></li>
                <li><a class="dropdown-item" href="#">Another action</a></li>
                <li><a class="dropdown-item" href="#">Something else here</a></li>
            </ul>
        </div>
        <div class="dropdown">
            <p class=" text-white dropdown-toggle" type="button" id="dropdownMenuDark" data-bs-toggle="dropdown" aria-expanded="false">
                English
            </p>
            <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="dropdownMenuDark">
                <li><a class="dropdown-item" href="#">Action</a></li>
                <li><a class="dropdown-item" href="#">Another action</a></li>
                <li><a class="dropdown-item" href="#">Something else here</a></li>
            </ul>
        </div>
        <div class = "coupons">
            <img src="Img/coupons.png" alt="">
            <div>
                <p>Weekly Antique Cuopons</p>
                <span>We exclusive discounts to our cutomers</span>
            </div>
        </div>
        <div class = "menu-bar1-2">
            <ul>
                <li> <a href="profile.php"><i class="fa-regular fa-user" style="color: #fafafa;"></i> Profile</a></li>
                <li> <a href="auction.php">Auction</a></li>
                <li> <a href="Wishlist.php"><i class="fa-regular fa-heart" style="color: #ffffff;"></i> Wishlist</a></li>
                <li> <a href="add_to_cart.php"><i class="fa-solid fa-cart-shopping" style="color: #fcfcfc;"></i> Cart<?php cart_item();?></li></a>
               
            </ul>
        </div>
    </div>
    <div>
      <div >
      <div class = "border rounded-3 shadow-lg position-absolute" style="margin-left: 160px; margin-top:80px; width:256px;  display:block; ">
          <a href="profile.php?myinfo" class="btn mx-4 my-2 fw-bold"><svg class = "me-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" width="16" height="16"><path d="M10.561 8.073a6.005 6.005 0 0 1 3.432 5.142.75.75 0 1 1-1.498.07 4.5 4.5 0 0 0-8.99 0 .75.75 0 0 1-1.498-.07 6.004 6.004 0 0 1 3.431-5.142 3.999 3.999 0 1 1 5.123 0ZM10.5 5a2.5 2.5 0 1 0-5 0 2.5 2.5 0 0 0 5 0Z"></path></svg> Personal info </a><br>
          <a href="profile.php?security" class="btn mx-4 my-2 fw-bold"><svg class = "me-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" width="16" height="16"><path d="m8.533.133 5.25 1.68A1.75 1.75 0 0 1 15 3.48V7c0 1.566-.32 3.182-1.303 4.682-.983 1.498-2.585 2.813-5.032 3.855a1.697 1.697 0 0 1-1.33 0c-2.447-1.042-4.049-2.357-5.032-3.855C1.32 10.182 1 8.566 1 7V3.48a1.75 1.75 0 0 1 1.217-1.667l5.25-1.68a1.748 1.748 0 0 1 1.066 0Zm-.61 1.429.001.001-5.25 1.68a.251.251 0 0 0-.174.237V7c0 1.36.275 2.666 1.057 3.859.784 1.194 2.121 2.342 4.366 3.298a.196.196 0 0 0 .154 0c2.245-.957 3.582-2.103 4.366-3.297C13.225 9.666 13.5 8.358 13.5 7V3.48a.25.25 0 0 0-.174-.238l-5.25-1.68a.25.25 0 0 0-.153 0ZM9.5 6.5c0 .536-.286 1.032-.75 1.3v2.45a.75.75 0 0 1-1.5 0V7.8A1.5 1.5 0 1 1 9.5 6.5Z"></path></svg>Login and security</a><br>
          <a href="profile.php?mypayment" class="btn mx-4 my-2 fw-bold"><svg class = "me-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" width="16" height="16"><path d="M10.75 9a.75.75 0 0 0 0 1.5h1.5a.75.75 0 0 0 0-1.5h-1.5Z"></path><path d="M0 3.75C0 2.784.784 2 1.75 2h12.5c.966 0 1.75.784 1.75 1.75v8.5A1.75 1.75 0 0 1 14.25 14H1.75A1.75 1.75 0 0 1 0 12.25ZM14.5 6.5h-13v5.75c0 .138.112.25.25.25h12.5a.25.25 0 0 0 .25-.25Zm0-2.75a.25.25 0 0 0-.25-.25H1.75a.25.25 0 0 0-.25.25V5h13Z"></path></svg> My payments </a><br>
          <a href="profile.php?myorder" class="btn mx-4 mt-2 fw-bold"><svg class = "me-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" width="16" height="16"><path d="M8 16a2 2 0 0 0 1.985-1.75c.017-.137-.097-.25-.235-.25h-3.5c-.138 0-.252.113-.235.25A2 2 0 0 0 8 16ZM3 5a5 5 0 0 1 10 0v2.947c0 .05.015.098.042.139l1.703 2.555A1.519 1.519 0 0 1 13.482 13H2.518a1.516 1.516 0 0 1-1.263-2.36l1.703-2.554A.255.255 0 0 0 3 7.947Zm5-3.5A3.5 3.5 0 0 0 4.5 5v2.947c0 .346-.102.683-.294.97l-1.703 2.556a.017.017 0 0 0-.003.01l.001.006c0 .002.002.004.004.006l.006.004.007.001h10.964l.007-.001.006-.004.004-.006.001-.007a.017.017 0 0 0-.003-.01l-1.703-2.554a1.745 1.745 0 0 1-.294-.97V5A3.5 3.5 0 0 0 8 1.5Z"></path></svg> My orders </a>
          <?php
          if($num_row > 0){
            $shop_id = $row_num['shop_id'];
            $_SESSION['shop_id']=$shop_id;
            echo "<a href='seller-page.php?shop_id=$shop_id' class='btn mx-4 mt-2 mb-3 fw-bold'><i class='fa-solid fa-shop fa-sm me-2' style='color: #000000;'></i> Go to Shop</a>";
          }else{
           echo '<a href="profile.php?createshop" class="btn mx-4 mt-2 mb-3 fw-bold"><i class="fa-solid fa-shop fa-sm me-2" style="color: #000000;"></i> Create Shop</a>';
          }
          ?>
        </div>
     </div>
    </div>

      
      <?php
      if(!isset($_GET['security'])){
        if(!isset($_GET['myorder'])){
          if(!isset($_GET['mypayment'])){
            if(!isset($_GET['createshop'])){
              include('myinfo.php');
              }
            }

        }

    }

        if(isset($_GET['mypayment'])){
          include('mypayment.php');
        }
        if(isset($_GET['security'])){
          include('security.php');
        }
        if(isset($_GET['myorder'])){
          include('myorder.php');
        }
        if(isset($_GET['createshop'])){
          include('createshop.php');
        }
      ?>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    
</body>
</html>