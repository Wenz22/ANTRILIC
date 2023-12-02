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
        <div class ="container"> 
            <form  method="post">
            <div class="row my-5 py-5 ps-5  " >
                <table class="table table-borderless" >

                        <?php

                         global $conn;
                         $ip = getIPAddress();
                         $total =0;
                         $sum = 0;
                         $total_quantity=0;
                         $select_query = "select * from `cart` where `ip_address` = '$ip'";
                         $result = mysqli_query($conn, $select_query);
                         $result_count=mysqli_num_rows($result);
                         if($result_count > 0){
                            echo "
                            <thead class='justify-content-center'>
                            <tr >
                               <th scope='col' class='text-center'></th>
                                <th scope='col' colspan='2' class='ps-5'>Item</th>
                                <th scope='col' class='text-center'>Price</th>
                                <th scope='col'class='text-center'>Quantity</th>
                                <th scope='col'colspan='2' class='text-center'>Total Price</th>
                                <th scope='col'colspan='2'class='text-center'></th>
                            </tr>
                        </thead>
                        <tbody class ='border-top'>
                            
                            ";


                         while($row=mysqli_fetch_array($result)){
                             $order_quantity = array($row['quantity']);
                             $prd_ID=$row['prd_ID'];
                             $quantity=$row['quantity'];
                             $quantity_value=array_sum($order_quantity);
                             $total_quantity += $quantity_value;
                             $select_product="select * from `prodoct` where `prd_ID`='$prd_ID'";
                             $result_product=mysqli_query($conn,$select_product);
                             while($row_product_price=mysqli_fetch_array($result_product)){
                                 $product_price =array($row_product_price['prd_price']);
                                 $prd_price=$row_product_price['prd_price'];
                                 $prd_name=$row_product_price['prd_name'];
                                 $prd_img =$row_product_price['prd_img'];
                                 $prd_quantity=$row_product_price['prd_quantity'];
                                 $product_value=array_sum($product_price);
                                 $sum = $quantity * $prd_price ;
                                 $total += $sum ;
                                 ?>
                            <tr>
                                 <td class="text-center"><input class="my-5 mx-2" type="checkbox" name ="removeitem[]" value="<?php echo $prd_ID; ?>"></td>
                                 <td class="text-center" style="width: 100px;"><img src="product-img/<?php echo $prd_img ;?>" class ="object-fit-fil my-2" alt="" style="height: 100px; width: 100px;"></td>
                                 <td class="ps-3 "><?php echo $prd_name; ?></td>
                                 <td class="text-center py-5 "><p>₱<?php echo $prd_price;?></p></td>
                                 <td class="text-center p-5"> 
                                    <div class ="d-flex number justify-content-center" style="border-radius: var(--spacing-0, 20px); border: 1px solid #4B5157; width: 130px; height: var(--spacing-10, 40px); flex-shrink: 0;">
                                        <span  class = "btn dec" name ="dec" id="mfn" >-</span>
                                        <input class ="fprm-control input text-center bg-transparent" value="<?php echo $quantity; ?>" type="mumber" readonly name="update_quantity" id="update_quantity"  style="width: 50px; margin: 5px; border:none;" > 
                                        <span class ="btn inc" name ='inc' id ="add" >+</span>
                                    </div>
                                 </td>

                                 <td class='text-center pt-5 px-2'><p><?php echo "₱",$sum;?></p></td>
                                 <td class='text-center py-5'><button class = 'btn'type='submit'><i class='fa-solid fa-heart fa-lg' style='color: #85a39f;'></i></button></td>
                                 <td class='text-center py-5 '><button name = "remove" class = 'btn'type='submit'><i class='fa-solid fa-xmark fa-xl' style='color: #02060d;'></i></button></td>
                     
                             </tr>
                     <?php
                         }}}else{
                            echo "<h2 class = 'text-center text-black-50'> Your shopping cart is empty </h2>";
                         }
                    
                     ?>
                    </tbody>
                </table>
            </div>
            
         </div>
 
            <div class="footer ">
                <div class="border d-flex w-75 p-4 mt-5 bg-light rounded-top Regular shadow " style="justify-content:space-between; margin-left: 179px; display:block; position:fixed; bottom:0;">
                    <div class="">
                        <a href="All-product.php" class ="nav-link"><i class="fa-solid fa-arrow-left fa-lg" style="color: #000000;"></i> Back to shopping</a>

                    </div>
                    <div class=" ">
                        <ul class= " d-flex  list-unstyled">
                            <li class = "pt-2 pe-1">Total price: </li>
                            <li class = "me-2 pt-2"> <?php echo $total; ?></li>
                          </form>  
                          <?php
                          $selec_query = "select * from `cart` where `ip_address` = '$ip'";
                          $resul = mysqli_query($conn, $selec_query);
                          $resul_count=mysqli_num_rows($resul);
                          if($resul_count > 0){
                             echo  "<a class='btn btn-dark rounded-pill ms-3'style='width: 150px;' href='Payment_Method.php'>Check out</a>";
                          }else{
                            echo  "<a class='btn btn-dark rounded-pill ms-3'style='width: 150px;' href='add_to_cart.php'>Check out</a>";
                           
                          }
                         
                         
                          
                          ?>
                          
                            
                                
                            
                        </ul>   
                    </div>
                </div>
            </div>
        
   <div class = "row ms-3">
        <?php
         
        // show product by categories function
          show_bycategories();
          remove();
        
        ?>
    </div>
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
                }
        })
    }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>s
