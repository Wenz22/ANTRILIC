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

            <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="dropdownMenuDark">
            <li class="nav-link "><a class="nav-link dropdown-item m-2 " href='all-product.php'>All Product</a></li>
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
                    echo '<li> <a href="auction.php">Auction</a></li>';

                    
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

    <!-- selecting data in the table categories and show the data-->
    <div class = "categories">
        <ul>
            <?php
             dropdown_catigories();
            ?>
        </ul>   
    </div>
    
         <div  style="height: 500px;">
                <div class="col-md-5 float-start" style="height: 500px; background-image:url(Img/left.png) ; background-repeat:no-repeat;background-size: cover;">
                </div>
                <div class="col-md-7 float-end" style="height: 500px; background-image:url(Img/img.jpg); background-repeat:no-repeat; background-size: cover;">
                        <h1 class="text-lg-center text-white mt-5 pt-5">EXCLUSIVE ANTIQUES <br>& COLLECTIBLES</h1>
                        <h3 class="text-lg-center text-white mt-4">Pooliside glam include From $4.99</h3>
                        <div class="d-center w-25 bg-primary mt-5 rounded" style = "height: 50px; width: 250px; margin-left:300px">
                                <p class="text-lg-center text-white pt-3" ><i class="fa-solid fa-box" style="color: #ffffff;"> </i>
                                        SHOP NOW
                                </p>
                        </div >
                </div>
         </div>

         <nav class="navbar mt-5 ms-3">
            <div class="container-fluid  pt-5 ps-5">
                <h2>New Item</h2>
                <p class = "me-5 pt-3 text-black"> <a href=""class = "text-black link-offset-2 link-underline link-underline-opacity-0">View all  <i class="fa-solid fa-chevron-right" style="color: #000000;"></i></a></p>
            </div>
        </nav>


         <!-- product -->
         <div class="row ms-3">
             <?php 
             // show 4 product fuction
               show_product_4limit();
             ?>  
        </div>

        <nav class="navbar mt-3 ms-2">
            <div class="container-fluid  pt-5 ps-5">
                <h2>Trending must-haves</h2>
                <p class = "me-5 pt-3 text-black"> <a href=""class = "text-black link-offset-2 link-underline link-underline-opacity-0">View all  <i class="fa-solid fa-chevron-right" style="color: #000000;"></i></a></p>
            </div>
        </nav>
        
         <!-- product 2 -->
         <div class="row ms-5">
            <?php 
            // function for show product in 3 limit
               show_product_3limit();
            ?>  
        </div>
       <!-- top 4 -->
        <nav class="navbar mt-0 ms-3 col-md-12">
            <div class="container-fluid  pt-5 ps-5">
                <h2>Top 4</h2>
                <p class = "me-5 pt-3 text-black"> <a href=""class = "text-black link-offset-2 link-underline link-underline-opacity-0">View all  <i class="fa-solid fa-chevron-right" style="color: #000000;"></i></a></p>
            </div>
        </nav>
        <div class="row ms-3">
            <?php 
            // function 
              show_produc_for_top4();
            ?>  
        </div>
        <!-- 1st -->
        <!-- left pic-->
        <div class = "row ms-5 me-2 mt-5 mb-5">
            <div class = "col-md-6 row me-2" style= "height : 370px">
                <div class ="col-md-6 bg-black">
                    <h1 class = "text-white ms-3 mt-5 fw-bold">Special Offer!</h1>
                    <p class = "text-white ms-3 ms-0 fs-3">50% OFF </p>
                    <a href="" class = "text-white ms-3 mt-5 fs-5">Exlopre all category</a>
                </div>
                <div class ="col-md-6" style = "background-image: url(Img/p.png);">                    
                </div>
            </div>
            <!-- right pic-->

            <div class = "col-md-6 row" style= "height : 370px">
                <div class ="col-md-6" style = "background-color:#F5F5F5;">
                    <h1 class = "text-black ms-3 mt-5 fw-bold">The most collectible antiques</h1>
                    <p class = "text-black ms-3 ms-0 fs-3">Get it now!</p>
                    <a href="" class = "text-black ms-3 mt-5 fs-5">Exlopre all category</a>
                </div>
                <div class ="col-md-6" style = "background-image: url(Img/g.png);">
                   
                </div>
            </div>
        </div>
           <!--border ads -->
            <div class ="row " style = "height : 221px ;background-color: #555555;">
                <div class = "col-md-6">
                    <h1 class = "text-center text-white mt-5">ANTIQUE CLOCKS</h1>
                    <p class = "text-white " style = "margin-left: 160px; margin-top: 10px;">Snap on a antique clocks. And get it as soon as possible! <br> buy now!</p>
                </div>
                <div class ="col-md-6">
                    <img src="Img/s.png" alt="">
                    
                </div>
            </div>
           <!-- 2nd -->
           <!-- left pic-->
            <div class = "row ms-5 me-2 mt-5">
                <div class = "col-md-6 row me-2" style= "height : 370px">
                    <div class ="col-md-6 bg-black">
                        <h1 class = "text-white ms-3 mt-5 fw-bold">The Authentic Coins</h1>
                        <p class = "text-white ms-3 ms-0 fs-3">Lets collect it! </p>
                        <a href="" class = "text-white ms-3 mt-5 fs-5">Exlopre all category</a>
                    </div>
                    <div class ="col-md-6" style = "background-image: url(Img/c.png); background-size: cover;">                    
                    </div>
                </div>
                <!-- right pic-->

                <div class = "col-md-6 row" style= "height : 370px">
                    <div class ="col-md-6" style = "background-color:#F5F5F5;">
                        <h1 class = "text-black ms-3 mt-5 fw-bold">Best Asian Antique </h1>
                        <p class = "text-black ms-3 ms-0 fs-3">Get it now!</p>
                        <a href="" class = "text-black ms-3 mt-5 fs-5 ">Exlopre all category</a>
                    </div>
                    <div class ="col-md-6 " style = "background-image: url(Img/w.png);background-size: cover;">
                    
                    </div>
                </div>
            </div>




         <!-- footer section -->
    <div class=" h-100 ">
            <div class = "border border-light h-75">
                 
                <div class ="rounded "style="padding:32px; background-color:#7296AB; margin-left:400px; margin-top: 80px; width: 600px; position: absolute;">
                        <form   style="padding:10px;" action="" method="post">
                            <h1 class="text-light mb-3 text-center">ANT RELIC <span class = "text-muted">Store</span></h1>
                            <p class="text-light fs-6 text-center mb-4">Register your email not to miss the last minutes off+ Free delivery</p>
                                <div class="input-group w-50 border rounded  " style="margin-left:127px;">
                                    <input type="email" class="form-control border-0 bg-body" placeholder="Enter your email" aria-label="Username" aria-describedby="input-group-button-right">
                                    <button type="sumit" class="border-0 btn bg-body" id="input-group-button-right"><i class="fa-regular fa-paper-plane" style="color: #000000;"></i></button>
                                </div>
                        </form>
                </div>

                <div class = "bg-body-secondary  " style = "margin-top:200px; padding-top:100px ; padding-bottom:20 px">
                    <div class = "d-flex justify-content-evenly mt-5 "> 
                            <div>
                                <p>Company</p>
                                <ul class= "list-unstyled">
                                    <li>About Us</li>
                                    <li>Our Store</li>
                                    <li>Contact us</li>
                                </ul>
                            </div>

                            <div>
                                <p>Career Opportunities</p>
                                <ul class= "list-unstyled">
                                    <li>Selling Programss</li>
                                    <li>Advertise</li>
                                    <li>Cooperation </li>
                                </ul>
                            </div>

                            <div>
                                <p>How to Buy</p>
                                <ul class= "list-unstyled">
                                    <li>Making Payments</li>
                                    <li>Delivery Options</li>
                                    <li>Delivery Options</li>
                                    <li>New User Guide</li>
                                </ul>
                            </div>
                            <div>
                                <p>Help</p>
                                <ul class= "list-unstyled">
                                    <li>Contacts Us</li>
                                    <li>FAQ</li>
                                    <li>Privacy Policy</li>
                        
                                </ul>
                            </div>
                    </div>
                
                 </div>
            </div>       

    </div>


    
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    
</body>


