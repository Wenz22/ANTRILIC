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
    <div class ="container">
        <form action="" class ="">
            

            <div style="width: 502px; height: 441px; margin-left:400px; margin-top:100px;">
            <h3 class = "fw-bold">Contact us</h3>
            <p class = "text-black-50 text-justify">The harder you work for something, the greater you’ll feel when you <br>
             achieve it.</p>
                <select name="" class= "form-control p-2" id="">
                    <option value="">Topic</option>
                    <option value="">Topic</option>
                    <option value="">Topic</option>
                </select>
                <div class ="row my-3">
                    <div class ="col-md-6">
                        <input type="text" class ="text-black-50 form-control p-2" value="Your name">
                    </div>
                    <div class ="col-md-6">
                        <input type="email" class ="text-black-50 form-control p-2" value="Email">
                    </div>
                </div>
                  <input type="text" class = "form-control text-black-50 p-2"value="Description (optional)">
                  <input type="button" class ="btn btn-dark rounded-pill p-2 my-3" value="Send request">
            </div>
          
        </form>

    </div>
   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    
</body>

