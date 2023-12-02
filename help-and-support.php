<?php
include("includes/connectiondb.php");
include("function/all-common-function.php");
session_start();

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

<!--nuv section-->
<nav class="navbar navbar-expand-xl " >
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
          <a class="nav-link" href="#" >Help & support</a>
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
            <li class='nav-link '><a class='nav-link dropdown-item m-2 ' href='All-product.php'>All Product</a></li>
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
            <?php
                if (!isset($_SESSION['email'])){
                    
                    echo "<li> <a href='Sign-in.php'><i class='fa-regular fa-user' style='color: #fafafa;'></i> Sign in </a></li> ";
                }else{
                    echo "<li> <a href='profile.php'><i class='fa-regular fa-user' style='color: #fafafa;'></i> Profile </a></li> ";
                    
                }
                
               
                 if (!isset($_SESSION['email'])){
                    
                    echo '<li> <a href="Sign-in.php">Auction</a></li>';
                }else{
                    echo '<li> <a href="">Auction</a></li>';

                    
                }
       
                if (!isset($_SESSION['email'])){
                    
                    echo '<li> <a href="Sign-in.php"><i class="fa-regular fa-heart" style="color: #ffffff;"></i> Wishlist</a></li>';
                }else{
                    echo '<li> <a href="Wishlist.php"><i class="fa-regular fa-heart" style="color: #ffffff;"></i> Wishlist</a></li>';

                    
                } 
             
                if (!isset($_SESSION['email'])){
                    
                    echo '<li> <a href="Sign-in.php"><i class="fa-solid fa-cart-shopping" style="color: #fcfcfc;"></i> Cart </a></li>';
                }else{
                    echo '<li> <a href="add_to_cart.php"><i class="fa-solid fa-cart-shopping" style="color: #fcfcfc;"></i> Cart </a></li>', cart_item();
                    
                }
                
                ?>
               
            </ul>

        </div>
    </div>
    <div class = "text-center container" >
        <p class= "bg-dark text-white p-2" style="width:200px ; margin-left: 530px; margin-top:40px;">HELP  & SUPPORT</p> 
        <h3 class = "fw-bold text-black mt-5">How can we assist you with today?</h3>
    </div>
    
    <div class = "d-flex  container" style="margin-left:150px; margin-top:100px;">
        <div class ="border" style = "width: 290px;">
         <p class = "mt-3"><i class="fa-regular fa-heart fa-md px-4" style="color: #000205;"></i> Wishlist</p>
        
        </div>

        <div class ="border" style = "width: 290px; margin: 0 114px;">
         <p class = "mt-3"><svg  xmlns="http://www.w3.org/2000/svg" class ="mx-4" viewBox="0 0 16 16" width="16" height="16"><path d="M5.5 4v2h7A1.5 1.5 0 0 1 14 7.5v6a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5v-6A1.5 1.5 0 0 1 3.499 6H4V4a4 4 0 0 1 7.371-2.154.75.75 0 0 1-1.264.808A2.5 2.5 0 0 0 5.5 4Zm-2 3.5v6h9v-6h-9Z"></path></svg> Reset Password</p>
        </div>
        <div class ="border" style = "width: 290px;">
         <p class = "mt-3"><img src="Img/shopping-cart (1).svg" class ="mx-4" alt=""> Shopping Cart</p>
        </div>
    </div>
    <div class = "d-flex  container" style="margin-left:150px; margin-top:50px;">
        <div class ="border" style = "width: 290px;">
         <p class = "mt-3"><img class ="mx-4" src="Img/truck.svg" alt=""> Shipping & Billing</p>
        </div>

        <div class ="border" style = "width: 290px; margin: 0 114px;">
         <p class = "mt-3"><img class = "mx-4" src="Img/credit-card.svg" alt="">Payment Options</p>
        </div>
        <div class ="border" style = "width: 290px;">
         <p class = "mt-3"><img src="Img/user.svg" class ="mx-4" alt="">Account</p>
        </div>
    </div>
    <div class ="mt-5">
        <h4 class = "fw-bold text-center">Popular Topics</h4>
    </div>
    <div class = "d-flex justify-content-between m-5 container">
        <ul class = "list-unstyled">
            <li class = "mb-3">How to complete a purchase?</li>
            <li class = "mb-3">How to leave feedback on a purchase?</li>
            <li class = "mb-3">How to create an account and start shopping?</li>
        </ul>
        <ul class = "list-unstyled">
            <li class = "mb-3">How to complete a purchase?</li>
            <li class = "mb-3">How to leave feedback on a purchase?</li>
            <li class = "mb-3">How to create an account and start shopping?</li>
        </ul>
        <ul class = "list-unstyled">
            <li class = "mb-3">How to complete a purchase?</li>
            <li class = "mb-3">How to leave feedback on a purchase?</li>
            <li class = "mb-3">How to create an account and start shopping?</li>
        </ul>

    </div>


   
   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    
</body>

