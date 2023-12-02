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
</head>
<body>
    
<?php
//calling add to cart function
 add_to_cart();
 favorites ();
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
    <div class="row h-100">
        <div class="col-md-6">
            <div class = "card  bg-black border rounded m-5">
        <?php
          get_image();
        ?>
        </div>
        </div>
        <div class="col-md-6 mt-5 ">
            <?php
            get_all_details();
            ?>

        </div>
      
    </div>
    <?php
    if(isset($_GET['prd_id'])){
      $prd_id= $_GET['prd_id'];
      // selecting product table using prd_id to get the shop id
      $get_product = "select * from `prodoct` where `prd_ID` = $prd_id ";
      $result_get = mysqli_query($conn, $get_product);
      $row_fetch = mysqli_fetch_assoc($result_get);
      $shop_id = $row_fetch['shop_id'];
      $dis = $row_fetch['prd_decription'];
      // selecting shop table to get shop name using shop id

      $select_shop= "select * from `shop` where `shop_id` = $shop_id ";
      $result_shop = mysqli_query($conn,$select_shop);
      $fetch_shop = mysqli_fetch_assoc($result_shop);
      $shop_name = $fetch_shop['shop_name'];
      $address = $fetch_shop['address'];
    }
   
    
    ?> 
    <div class = "container d-flex col-lg-12">
      <img src="Img/ant-logo.png" class = "object-fit-fill border rounded-circle me-3"style="width: 80px; height: 80px;" alt="">
      <div>
      <h2 class = "fw-bold"><?php echo $shop_name;?></h2>
      <p class = "text-black-50"><?php echo $address;?></p>
     </div>
    </div>
<div class = "mt-5">
      <ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item" role="presentation">
      <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">Item Description</button>
    </li>
    <li class="nav-item" role="presentation">
      <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false">Reviews</button>
    </li>
    <li class="nav-item" role="presentation">
      <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact-tab-pane" type="button" role="tab" aria-controls="contact-tab-pane" aria-selected="false">Item Specifics</button>
    </li>
  </ul>
  <div class="tab-content" id="myTabContent">
    <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
      <p class= "m-5"> <?php echo $dis; ?></p>


    </div>
    <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
      
      <div class="border mt-5 rounded p-4" style="width:600px ; margin-left: 100px;">
      
      <h1 class = "fw-bold text-center mt-3">Add a review</h1>
        <div class = "star_rating container text-center mb-3">
          <button class="star border-0 bg-transparent fs-2 text-warning">&#9734;</button>
          <button class="star border-0 bg-transparent fs-2 text-warning">&#9734;</button>
          <button class="star border-0 bg-transparent fs-2 text-warning">&#9734;</button>
          <button class="star border-0 bg-transparent fs-2 text-warning">&#9734;</button>
          <button class="star border-0 bg-transparent fs-2 text-warning">&#9734;</button>
        </div>
        <form method="post">
          <input type="text" class= "border-0 text-center" style="width: 20px; margin-left:225px;" id = "output" name = "rating" readonly>
        <div class="col-md-8 form-control d-flex rounded-pill mb-3">
          <input type="text" name ="review"class="form-control w-100 border-0" placeholder="Share your thoughts">
          <?php
          
          if (!isset($_SESSION['email'])){
                    
            echo "<a href='Sign-in.php' class ='m-1 rounded-pill btn btn-dark w-25'>Post it!</a>";
        }else{
            echo "<input type='submit' name = 'submit' value = 'Post it! 'class = 'rounded-pill btn btn-dark'>";
            
        }
          ?>
          
        </div>
        
        </form>
        <?php
        $prd_id =$_GET['prd_id'];
        $get_prd="select * from `prodoct` where `prd_ID` = $prd_id";
        $prd=mysqli_query($conn,$get_prd);
        $row_fetch = mysqli_fetch_assoc($prd);
        $prd_id = $row_fetch['prd_ID'];
        $ip = getIPAddress();
        $get_id = "select * from `user` where `user_ip` = '$ip'";
        $result_id = mysqli_query($conn,$get_id);
        $row = mysqli_fetch_assoc($result_id);
        $user_id = $row['user_id'];
        $user_name = $row['name'];
        if(isset($_POST['submit'])){
          $rating = $_POST['rating'];
          $review = $_POST['review'];
          if($rating == "" or $review == " "){
            echo"<script>window.open('index.php','_self')</script>";
          }else{
          $inset_query = "insert into `review` (prd_id,user_id,user_name,rating,review) values ($prd_id,$user_id,'$user_name',$rating,'$review')";
          $result_insert = mysqli_query($conn,$inset_query);
          if($result_insert){
            echo"<script>window.open('prd_details.php?prd_id=$prd_id','_self')</script>";
          }
        }
        }
        ?>
      

      </div>
      <div class = "container mt-5">
     <div class = "col-lg-6">
    <div class="d-flex justify-content-between">
      <?php
      $select_product = "select * from `review` where `prd_id`= $prd_id ";
      $result_product = mysqli_query($conn,$select_product);
      $data_num =mysqli_num_rows($result_product );
      ?>
    <h1 class = "fw-bold">Comments <span class = "text-black-50"><?php echo $data_num; ?></span></h1>
     <div class = "d-flex text-center border rounded">
      <p class = "fw-bold text-center m-3">Newest</p>
      <button class ="btn border rounded-circle m-2 p-2" style="height: 40px;width:40px ;"><i class="fa-solid fa-angle-down fa-lg" style="color: #000000;"></i></button>
     </div>
     </div>
     <?php
      
      if($data_num = 0){

        echo  $data_num;

      }else{
      while($row_fetch = mysqli_fetch_array($result_product)){

      $name = $row_fetch ['user_name'];
      $rating = $row_fetch ['rating'];
      $review = $row_fetch ['review'];
      $review_date = $row_fetch ['review_date'];
      
      ?>
    <div class ="card col-12 mt-3 g-0">
  
      <div class = "row">

      <div class = "col-2">
        <img src="Img/Profile 1.png" class = "mt-5 ms-3" style="height: 60px;width:60px ;" alt="">
      </div>
      <div class = "col-8 card-body">
        <div class = "d-flex justify-content-between">
          <h5 class = "fw-bold"><?php
            echo $name;
          ?></h5>
          <ul class = "d-flex list-unstyled me-2" >
            <?php
            if($rating == 5){
              
              echo "<li class = 'text-warning fs-3 '>&#9733;</li>
              <li class = 'text-warning fs-3'>&#9733;</li>
              <li class = 'text-warning fs-3'>&#9733;</li>
              <li class = 'text-warning fs-3'>&#9733;</li>
              <li class = 'text-warning fs-3'>&#9733;</li>";
            }else if($rating == 4){
              echo "
              <li class = 'text-warning fs-3'>&#9733;</li>
              <li class = 'text-warning fs-3'>&#9733;</li>
              <li class = 'text-warning fs-3'>&#9733;</li>
              <li class = 'text-warning fs-3'>&#9733;</li>
              <li class = 'text-warning fs-3 '>&#9734;</li>";
            }else if($rating == 3){
              echo "
              <li class = 'text-warning fs-3'>&#9733;</li>
              <li class = 'text-warning fs-3'>&#9733;</li>
              <li class = 'text-warning fs-3'>&#9733;</li>
              <li class = 'text-warning fs-3 '>&#9734;</li>
              <li class = 'text-warning fs-3'>&#9734;</li>";
            }elseif($rating == 2){
              echo "
              <li class = 'text-warning fs-3'>&#9733;</li>
              <li class = 'text-warning fs-3'>&#9733;</li>
              <li class = 'text-warning fs-3 '>&#9734;</li>
              <li class = 'text-warning fs-3'>&#9734;</li>
              <li class = 'text-warning fs-3'>&#9734;</li>";
            }elseif($rating ==1){
              echo "<li class = 'text-warning fs-3'>&#9733;</li>
              <li class = 'text-warning fs-3 '>&#9734;</li>
              <li class = 'text-warning fs-3'>&#9734;</li>
              <li class = 'text-warning fs-3'>&#9734;</li>
              <li class = 'text-warning fs-3'>&#9734;</li>
              ";
            }
            ?>
            
          </ul>
        </div>
        <p><?php 
        echo $review;
        ?></p>
        <div class = "">
          <p class= "text-black-50"><?php 
        echo $review_date 
        ?></p>
        </div>
        
        
      </div>
      </div>

     </div>
     <?php
      }}
  ?>

  </div>
  
 
 </div>





    </div>
    <div class="tab-pane fade" id="contact-tab-pane" role="tabpanel" aria-labelledby="contact-tab" tabindex="0">
      <div class = "row">
        <div class ="col-md-6">
          <p class = "fw-bold fs-4 mt-5 ms-5 mb-3">Item Specifics</p>
          <div class ="d-flex justify-content-between w-25 ms-5">
            <p class ="text-black-50">Conditions</p>
            <p class ="fw-bold">Used</p>
          </div>
          <div class ="d-flex justify-content-between w-25 ms-5">
            <p class ="text-black-50">Brand</p>
            <p class ="fw-bold">Noble</p>
          </div>
          <div class ="d-flex justify-content-between w-25 ms-5">
            <p class ="text-black-50">Style</p>
            <p class ="fw-bold">Empire</p>
          </div>
          <div class ="d-flex justify-content-between w-25 ms-5">
            <p class ="text-black-50">Sub-Style</p>
            <p class ="fw-bold">French</p>
          </div>
        </div>
        <div class ="col-md-6">
          
          <div class ="d-flex justify-content-between w-50 ms-5 mt-5 pt-5">
            <p class ="text-black-50">Seller Notes</p>
            <p class ="fw-bold">“As Photos”</p>
          </div>
          <div class ="d-flex justify-content-between w-50 ms-5">
            <p class ="text-black-50">Color</p>
            <p class ="fw-bold">Multi-Color</p>
          </div>
          <div class ="d-flex justify-content-between w-50 ms-5">
            <p class ="text-black-50">Original/Reproduction</p>
            <p class ="fw-bold">Original</p>
          </div>
          <div class ="d-flex justify-content-between w-50 ms-5">
            <p class ="text-black-50">Material</p>
            <p class ="fw-bold">Bronze & Porcelain</p>
          </div>
        </div>
      </div>
    </div>
  </div>
 </div> 

 



 <div class="ms-3 mt-5">
  <h1 class = "fw-bold ms-5">You may also like</h1>
  <div class = "row mt-5">
  <?php
  show_product_4limit();
  
  ?>
  </div>

 </div> 
    
    <div class = "row ms-3">
        <?php
        // show all product function
          
        // show product by categories function
          show_bycategories();
    
        ?>
    </div>
    <script>
    const allstar = document.querySelectorAll('.star');
    var outputElement = document.getElementById("output");
    allstar.forEach((star,i)=>{
      star.onclick = function(){
        console.log(star);
        let current_star_level = i + 1;
        outputElement.value= current_star_level;

        allstar.forEach((star,j) => {
          console.log(j);
          if(current_star_level >= j+1){
            star.innerHTML='&#9733';
          }else{
            star.innerHTML='&#9734';

          }

        })
        
      }
    })

  </script>

    <script>
        
        var incrementButton = document.getElementsByClassName('inc');
        var decrementButton = document.getElementsByClassName('dec');
        for( var i = 0 ; i < incrementButton.length; i++){
            var button = incrementButton[i];
            button.addEventListener('click',function(event){
                var buttonClicked = event.target;
                var input = buttonClicked.parentElement.children[1];
                var inputValue = input.value;
                var newValue = parseInt(inputValue) + 1;
                input.value = newValue;
        })
    }
        for( var i = 0 ; i < decrementButton.length; i++){
            var button = decrementButton[i];
            button.addEventListener('click',function(event){
                var buttonClicked = event.target;
                var input = buttonClicked.parentElement.children[1];
                var inputValue = input.value;
                var newValue = parseInt(inputValue) - 1;
                 
                if(newValue > 0){
                  input.value = newValue;
                }else{
                  
                }
        })
    }
    </script>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    
</body>
