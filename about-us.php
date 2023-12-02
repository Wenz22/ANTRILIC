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

    <div class = "mt-5" style="background-color:#262626;">
        <h1 class="text-center p-2 text-white">
           About Us
        </h1>
    </div>
    <div class="row">
        <div class="col-lg-6 mt-5">
            <div class = "mt-5">
                 <img src="Img/ourStory.jpg" style="width:350px; height:auto; margin-left: 206px;" class = "object-fit-scale  rounded-3 " alt="">
            </div>
           
        </div>
        <div class="col-lg-6 my-5">
            <h3 class = "fw-bold">Our Story</h3>
            <p class = " mt-3" style="width: 566px; height: 294px; text-align: justify;">
            Ant Relic is a treasure trove of antiques, a place where the past comes alive. Within its walls, you'll find a dazzling array of artifacts from all over the world, each with its own unique story to tell. From the elegant Victorian armoire to the mid-century modern coffee table, from the set of antique silverware to the vintage painting of a European landscape, Ant Relic has something to capture the imagination of every collector. But Ant Relic is more than just a store. It's a community of passionate individuals who love and appreciate the beauty of antiques. The team at Ant Relic is knowledgeable and experienced, and they're always happy to help you find the perfect piece for your home or collection. Whether you're a seasoned collector or just starting out, Ant Relic is the place to go to find the most unique and valuable antiques. So step inside and discover a treasure trove of treasures!
            </p>
            
        </div>
        <div class="col-lg-6 my-5">
            <div style=" margin-left: 206px">
             <h3 class = "fw-bold">Our Mission</h3>
            <p class = " mt-3" style="width: 566px; text-align: justify;">
            Our mission is to provide our customers with the best possible shopping experience for antiques. We offer a wide variety of antiques from around the world, all carefully selected by our team of experts. We also provide detailed descriptions and photos of each antique, so that our customers can make informed purchase decisions.
            </p>
            <p class = " mt-5" style="width: 566px;text-align: justify;">
            We are passionate about helping our customers find the perfect antiques for their homes and collections. We understand that antiques are not just investments; they are also works of art and objects of beauty. We want our customers to love the antiques that they purchase from Ant Relic, and we are committed to providing them with the knowledge and support they need to make the best possible choices.
            </p>
            </div>
      
        </div>
        <div class="col-lg-6 mt-5">
            <div class = "mt-5">
                 <img src="Img/mission.jpg" style="width:350px; height:auto; margin-left: 206px;" class = "object-fit-scale  rounded-3 " alt="">
            </div>
        </div>
    </div>
    <div class ="container">
        <h3 class = "fw-bold text-center">
        Founders 
        </h3>

    <div class = "row mt-5" style="margin-left: 250px;">
        <div class="border g-0 rounded-3 card " style="width: auto; height: 360px">
            <img src="Img/jowen.jpg" style="height: 180px; width:auto;" class=" m-3 rounded-3 object-fit-scale">
            <div class="card-body">
                <h5 class = "card-title fw-bold">Jowen Diez</h5>
                <p class="card-text fw-bold text-black-50">
                    CEO
                </p>
                <p class="card-text text-black-50" style="width:220px ;">
                Connecting people with their past, one treasure at a time.
                </p>
            </div>
        </div>
        <div class="border g-0 rounded-3 card mx-3" style="width: auto; height: 360px">
            <img src="Img/cj.jpg" style="height: 180px;width: 220px;" class=" m-3 rounded-3 object-fit-scale">
            <div class="card-body">
                <h5 class = "card-title fw-bold">Ceejay Ibabiosa</h5>
                <p class="card-text fw-bold text-black-50">
                    Co-founder
                </p>
                <p class="card-text text-black-50" style="width:220px ;">
                Enriching lives with timeless treasures.
                </p>
            </div>
        </div>
        <div class="border g-0 rounded-3 card " style="width: auto; height: 360px">
            <img src="Img/evan.jpg" style="height: 180px;width: 220px;" class=" m-3 rounded-3 object-fit-scale">
            <div class="card-body">
                <h5 class = "card-title fw-bold">Evan Roi Tabar</h5>
                <p class="card-text fw-bold text-black-50">
                co-founder
                </p>
                <p class="card-text text-black-50" style="width:220px ;">
                Your gateway to the past.
                </p>
            </div>
        </div>

    </div>
</div>
  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    
</body>

