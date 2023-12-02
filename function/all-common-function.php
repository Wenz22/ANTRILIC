<?php
// function for dropdown catigores
function dropdown_catigories(){
    global $conn;
    $select_categories = "Select * from `category`";
            $result_categories= mysqli_query($conn,$select_categories);
            while($row_data =mysqli_fetch_assoc($result_categories)){
                $categories_name =$row_data['cat_name'];
                $categories_id =$row_data['cat_id'];
                echo "<li class='nav-link '><a class='nav-link dropdown-item m-2 'href='all-product.php?categories=$categories_id'>$categories_name </a></li> ";
            }
}
   // show product in 4 limit
function show_product_4limit(){
global $conn;
       $select_product = "Select * from `prodoct` order by rand() limit 0,4";
              $result_product= mysqli_query($conn,$select_product);
              while($row =mysqli_fetch_assoc($result_product)){
                $prd_ID=$row['prd_ID'];
                $prd_name =$row['prd_name'];
                $cat_id =$row['cat_id'];
                $prd_price =$row['prd_price'];
                $prd_img=$row['prd_img'];
                    echo "<div class='card col-md-3 ms-4 shadow-sm mb-3 rounded' style='width:299px; height: 390px;' >
                    <a href='prd_details.php?prd_id=$prd_ID' class=' text-center'> <img src='product-img/$prd_img' class=' card-img-top object-fit-fill mt-2' style='width:auto; height: 150px;' alt='card-img-top'> </a>
                        <div class='card-body mt-5 ' style='width:250px; height:60px;'>
                            <h5 class='card-title text-break fs-6 fw-bolder'>$prd_name</h5>
                        </div>
                        <div class='card-body mb-2 ' style='width:250px; height: 5px;'>   
                            <p class='card-text text-warning fw-bolder fs-5'>₱ $prd_price</small></p>
                        </div>
                        <div class='card-body position-absolute bottom-0 end-0'  style= 'margin-bottom: 35px; margin-right:15px;'>
                        <a href='all-product.php?cart_id=$prd_ID'class = 'btn btn-primary rounded-circle' style = 'width: 60px; height:60px;' ><i class='mt-3 fa-solid fa-cart-shopping' style='color: #ffffff;'></i></a>
                        </div>
                        <ul class = 'd-flex list-inline ms-3 mb-3'> 
                        <li class ='list-inline-item'><img src='Img/Star.jpg' alt=''><li>
                        <li class ='list-inline-item'><img src='Img/Star.jpg' alt=''><li>
                        <li class ='list-inline-item'><img src='Img/Star.jpg' alt=''><li>
                        <li class ='list-inline-item'><img src='Img/Star.jpg' alt=''><li>
                        <li class ='list-inline-item'><img src='Img/Star.jpg' alt=''><li>
                        <p class = 'fs-6 text-body-tertiary'>(100)</p>
                    </ul>

                </div>";
             }
}
// fuction for show product in 3 limit
function show_product_3limit(){
     global $conn;

              $select_product = "Select * from `prodoct` where `cat_id` = '7'";
              $result_product= mysqli_query($conn,$select_product);
              while($row =mysqli_fetch_assoc($result_product)){
                $prd_ID=$row['prd_ID'];
                $prd_name =$row['prd_name'];
                $cat_id =$row['cat_id'];
                $prd_price =$row['prd_price'];
                $prd_img=$row['prd_img'];

                //select data cotegory inside the select data of product 

                    $select_categories = "Select `cat_name` from `category` where `cat_id` ='$cat_id' order by rand() limit 0,3 ";
                    $result_categories= mysqli_query($conn,$select_categories);
                    while($row =mysqli_fetch_assoc($result_categories)){
                        $cat_name=$row['cat_name'];
                        echo "<div class='card col-md-3 ms-4 shadow-sm mb-3 rounded ' style='width:400px; height: 437px; background-color: #262626;' >
                                <img src='product-img/$prd_img' class='mt-3 card-img-top object-fit-cover object-fit-xl' style='width:auto; height: 300px;' alt='card-img-top'>
                                    <div class='card-body mb-5  ' style='width:250px; height: 93px;'>
                                        <h5 class='card-title text-break fs-6 fw-bolder text-white'>$prd_name</h5>
                                        <p class='card-text text-white'>$cat_name  </p>           
                                    </div>
                                    <div class='card-body position-absolute bottom-0 end-0 w-50'  style= 'margin-bottom: 25px;'>
                                    <button type='submit' class=' btn btn-outline-light'>₱ $prd_price Shop Now</button>
                                    </div>
                              </div>";
                             }
                         }

}

function show_produc_for_top4(){
    global $conn;
    $select_product = "Select * from `prodoct` order by rand() limit 0,4";
    $result_product= mysqli_query($conn,$select_product);
    while($row =mysqli_fetch_assoc($result_product)){
      $prd_ID=$row['prd_ID'];
      $prd_name =$row['prd_name'];
      $cat_id =$row['cat_id'];
      $prd_price =$row['prd_price'];
      $prd_img=$row['prd_img'];

        echo "<div class='card col-md-3 ms-4 shadow-sm mb-3 rounded' style='width:299px; height: 390px;' >
        <a href='prd_details.php?prd_id=$prd_ID' class=' text-center'> <img src='product-img/$prd_img' class=' card-img-top object-fit-scale mt-2' style='width:auto; height: 150px;' alt='card-img-top'> </a>
            <div class='card-body mt-5 ' style='width:250px; height:60px;'>
                <h5 class='card-title text-break fs-6 fw-bolder'>$prd_name</h5>
            </div>
            <div class='card-body mb-2 ' style='width:250px; height: 5px;'>   
                <p class='card-text text-warning fw-bolder fs-5'>₱ $prd_price</small></p>
            </div>
            <div class='card-body position-absolute bottom-0 end-0'  style= 'margin-bottom: 35px; margin-right:15px;'>
            <a href='all-product.php?cart_id=$prd_ID'class = 'btn btn-primary rounded-circle' style = 'width: 60px; height:60px;' ><i class='mt-3 fa-solid fa-cart-shopping' style='color: #ffffff;'></i></a>
            </div>
            <ul class = 'd-flex list-inline ms-3 mb-3'> 
            <li class ='list-inline-item'><img src='Img/Star.jpg' alt=''><li>
            <li class ='list-inline-item'><img src='Img/Star.jpg' alt=''><li>
            <li class ='list-inline-item'><img src='Img/Star.jpg' alt=''><li>
            <li class ='list-inline-item'><img src='Img/Star.jpg' alt=''><li>
            <li class ='list-inline-item'><img src='Img/Star.jpg' alt=''><li>
            <p class = 'fs-6 text-body-tertiary'>(100)</p>
        </ul>

    </div>";
        }

}
//show all product
function show_all_product(){
    global $conn;
                if(!isset($_GET['categories'])){
                 $select_product = "Select * from `prodoct` order by rand() limit 0,12";
                  $result_product= mysqli_query($conn,$select_product);
                  while($row =mysqli_fetch_assoc($result_product)){
                    $prd_ID=$row['prd_ID'];
                    $prd_name =$row['prd_name'];
                    $cat_id =$row['cat_id'];
                    $prd_price =$row['prd_price'];
                    $prd_img=$row['prd_img'];
                    echo "<div class='card col-md-3 ms-4 shadow-sm mb-3 rounded' style='width:299px; height: 390px;' >
                    <a href='prd_details.php?prd_id=$prd_ID' class=' text-center'> <img src='product-img/$prd_img' class=' card-img-top object-fit-scale mt-2' style='width:auto; height: 150px;' alt='card-img-top'> </a>
                        <div class='card-body mt-5 ' style='width:250px; height:60px;'>
                            <h5 class='card-title text-break fs-6 fw-bolder'>$prd_name</h5>
                        </div>
                        <div class='card-body mb-2 ' style='width:250px; height: 5px;'>   
                            <p class='card-text text-warning fw-bolder fs-5'>₱ $prd_price</small></p>
                        </div>
                        <div class='card-body position-absolute bottom-0 end-0'  style= 'margin-bottom: 35px; margin-right:15px;'>
                        <a href='all-product.php?cart_id=$prd_ID'class = 'btn btn-primary rounded-circle' style = 'width: 60px; height:60px;' ><i class='mt-3 fa-solid fa-cart-shopping' style='color: #ffffff;'></i></a>
                        </div>
                        <ul class = 'd-flex list-inline ms-3 mb-3'> 
                        <li class ='list-inline-item'><img src='Img/Star.jpg' alt=''><li>
                        <li class ='list-inline-item'><img src='Img/Star.jpg' alt=''><li>
                        <li class ='list-inline-item'><img src='Img/Star.jpg' alt=''><li>
                        <li class ='list-inline-item'><img src='Img/Star.jpg' alt=''><li>
                        <li class ='list-inline-item'><img src='Img/Star.jpg' alt=''><li>
                        <p class = 'fs-6 text-body-tertiary'>(100)</p>
                    </ul>

                </div>";
                                 
                        }
         }            
  
 }
 // function for show prudocts in categotrie  
 function show_bycategories(){
    global $conn;
                if(isset($_GET['categories'])){
                $categories_id=$_GET['categories'];
                 $select_product = "Select * from `prodoct` where `cat_id`= $categories_id";
                  $result_product= mysqli_query($conn,$select_product);
                  $num_row=mysqli_num_rows($result_product);
                  if($num_row == 0){
                   echo "<h2 class = 'text-center mt-5 fs-1'>No Product include!</h2>";
                }
                  while($row =mysqli_fetch_assoc($result_product)){
                    $prd_ID=$row['prd_ID'];
                    $prd_name =$row['prd_name'];
                    $cat_id =$row['cat_id'];
                    $prd_price =$row['prd_price'];
                    $prd_img=$row['prd_img'];
    
                    echo "<div class='card col-md-3 ms-4 shadow-sm mb-3 rounded' style='width:299px; height: 390px;' >
                    <a href='prd_details.php?prd_id=$prd_ID' class=' text-center'> <img src='product-img/$prd_img' class=' card-img-top object-fit-scale mt-2' style='width:auto; height: 150px;' alt='card-img-top'> </a>
                        <div class='card-body mt-5 ' style='width:250px; height:60px;'>
                            <h5 class='card-title text-break fs-6 fw-bolder'>$prd_name</h5>
                        </div>
                        <div class='card-body mb-2 ' style='width:250px; height: 5px;'>   
                            <p class='card-text text-warning fw-bolder fs-5'>₱ $prd_price</small></p>
                        </div>
                        <div class='card-body position-absolute bottom-0 end-0'  style= 'margin-bottom: 35px; margin-right:15px;'>
                        <a href='all-product.php?cart_id=$prd_ID'class = 'btn btn-primary rounded-circle' style = 'width: 60px; height:60px;' ><i class='mt-3 fa-solid fa-cart-shopping' style='color: #ffffff;'></i></a>
                        </div>
                        <ul class = 'd-flex list-inline ms-3 mb-3'> 
                        <li class ='list-inline-item'><img src='Img/Star.jpg' alt=''><li>
                        <li class ='list-inline-item'><img src='Img/Star.jpg' alt=''><li>
                        <li class ='list-inline-item'><img src='Img/Star.jpg' alt=''><li>
                        <li class ='list-inline-item'><img src='Img/Star.jpg' alt=''><li>
                        <li class ='list-inline-item'><img src='Img/Star.jpg' alt=''><li>
                        <p class = 'fs-6 text-body-tertiary'>(100)</p>
                    </ul>

                </div>";
                        }
         }            
  
 }


 // searching product function
 
 function search_product(){
    global $conn;
   if(isset($_GET['Searchbtn'])){
      $Serachinput=$_GET['Serachinput'];
      $search_query = "Select * from `prodoct` where prd_keyword like '%$Serachinput%'";
      $result_product= mysqli_query($conn,$search_query);
      $num_row=mysqli_num_rows($result_product);
      if($num_row == 0){
       echo "<h2 class = 'text-center mt-5 fs-1'>Item not found!</h2>";
    }
      while($row =mysqli_fetch_assoc($result_product)){
        $prd_ID=$row['prd_ID'];
        $prd_name =$row['prd_name'];
        $cat_id =$row['cat_id'];
        $prd_price =$row['prd_price'];
        $prd_img=$row['prd_img'];

        echo "<div class='card col-md-3 ms-4 shadow-sm mb-3 rounded' style='width:299px; height: 390px;' >
        <a href='prd_details.php?prd_id=$prd_ID' class=' text-center'> <img src='product-img/$prd_img' class=' card-img-top object-fit-scale mt-2' style='width:auto; height: 150px;' alt='card-img-top'> </a>
            <div class='card-body mt-5 ' style='width:250px; height:60px;'>
                <h5 class='card-title text-break fs-6 fw-bolder'>$prd_name</h5>
            </div>
            <div class='card-body mb-2 ' style='width:250px; height: 5px;'>   
                <p class='card-text text-warning fw-bolder fs-5'>₱ $prd_price</small></p>
            </div>
            <div class='card-body position-absolute bottom-0 end-0'  style= 'margin-bottom: 35px; margin-right:15px;'>
            <a href='all-product.php?cart_id=$prd_ID'class = 'btn btn-primary rounded-circle' style = 'width: 60px; height:60px;' ><i class='mt-3 fa-solid fa-cart-shopping' style='color: #ffffff;'></i></a>
            </div>
            <ul class = 'd-flex list-inline ms-3 mb-3'> 
            <li class ='list-inline-item'><img src='Img/Star.jpg' alt=''><li>
            <li class ='list-inline-item'><img src='Img/Star.jpg' alt=''><li>
            <li class ='list-inline-item'><img src='Img/Star.jpg' alt=''><li>
            <li class ='list-inline-item'><img src='Img/Star.jpg' alt=''><li>
            <li class ='list-inline-item'><img src='Img/Star.jpg' alt=''><li>
            <p class = 'fs-6 text-body-tertiary'>(100)</p>
        </ul>

    </div>";
            }
          

        }
 }
// get image to show in product details
 function get_image(){
    global $conn;
    if(isset($_GET['prd_id'])){
        if(!isset($_GET['categories'])){
            $prd_id=$_GET['prd_id'];
            $select_product = "Select * from `prodoct` where `prd_id` = $prd_id;";
             $result_product= mysqli_query($conn,$select_product);
             while($row =mysqli_fetch_assoc($result_product)){
               $prd_ID=$row['prd_ID'];
               $prd_name =$row['prd_name'];
               $cat_id =$row['cat_id'];
               $prd_price =$row['prd_price'];
               $prd_img=$row['prd_img'];
               echo "
               <img src='product-img/$prd_img' class='card-img  mx-auto d-block  img-fluid object-fit-scale ' style='width:500px; height: 400px;' alt='card-img-top'>           
              "; 
             }
         }
     }
 }

 function get_all_details(){
    global $conn;
    if(isset($_GET['prd_id'])){
        if(!isset($_GET['categories'])){
            $prd_id=$_GET['prd_id'];
            $select_product = "Select * from `prodoct` where `prd_id` = $prd_id;";
             $result_product= mysqli_query($conn,$select_product);
             while($row =mysqli_fetch_assoc($result_product)){
               $prd_ID=$row['prd_ID'];
               $prd_name =$row['prd_name'];
               $cat_id =$row['cat_id'];
               $prd_price =$row['prd_price'];
               $prd_img=$row['prd_img'];
               $prd_quantity=$row['prd_quantity'];
               echo " <div class ='card h-75 border-0'>
                         <div class = 'card-body'>
                              <div class = 'row h-50'>
                                   <div class = 'col-9'>
                                       <h5 class='card-title text-break fs-3 fw-bolder'>$prd_name</h5>
                                   </div>
                                   <div class = 'col-3'>
                                      <a href='prd_details.php?productID=$prd_ID' class=' border-0 btn' ><i class='fa-regular fa-heart fa-xl' style='color: #000000;'></i></a>
                                   </div>
                                </div>
                    <div class ='h-25'>
                       <p class=' card-text text-warning fw-bolder fs-4'>₱ $prd_price</small></p>
                       <ul class = 'd-flex list-inline'> 
                        <li class ='list-inline-item'><img src='Img/Star.jpg' alt=''><li>
                        <p class = ' card-text fs-6 text-body-tertiary'>(5/5)</p>
                        </ul>
                        

                    </div>
                    <div class ='d-flex number justify-content-center my-2' style=' width: 124px; '>
                                <span class = 'btn dec' id='mfn' style ='width: var(--spacing-10, 40px); background: #F1F4F3; border-radius: 15px; height: var(--spacing-10, 40px);' >-</span>
                                <input class ='fprm-control input text-center bg-transparent text-black-50 fs-5' max ='$prd_quantity' min = '1' value='1' type='number' readonly name='update_quantity' id='update_quantity'  style='width: 25px; margin: 5px; border:none;' > 
                                <span class ='btn inc' id ='add'  style ='width: var(--spacing-10, 40px); background: #F1F4F3; border-radius: 15px; height: var(--spacing-10, 40px);' >+</span>
                                
                     </div>
                    
                        <div class ='row h-25'>
                        <div class = 'col-6'>
                        <button type='submit' class='btn btn-dark w-100 rounded-pill ms-5'>Order Now</button>
                        </div>
                        <div class = 'col-6'> 
                        <a href='all-product.php?cart_id=$prd_id'class=' ms-5 btn btn-outline-dark w-75 rounded-pill'><i class='fa-solid fa-cart-shopping fa-sm' style='color: #000000; padding-right: 10px;'> </i>Add to Cart</a>
                
                        </div>
                    </div>
                        

                 </div>
             </div>
       
               ";
             }
         }
     }
 }

// geting ip address function

function getIPAddress() {  
    //whether ip is from the share internet  
     if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
                $ip = $_SERVER['HTTP_CLIENT_IP'];  
        }  
    //whether ip is from the proxy  
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
     }  
//whether ip is from the remote address  
    else{  
             $ip = $_SERVER['REMOTE_ADDR'];  
     }  
     return $ip;  
}  
//$ip = getIPAddress();  
//echo 'User Real IP Address - '.$ip; 
// favorites function

function favorites (){
    global $conn;
   
    if(isset($_GET['productID'])){
         $ip = getIPAddress();
         $product_id = $_GET['productID'];
        $select_query = "select * from `favorites` where `ip_address` = '$ip' and `prd_id` = $product_id ";
        $result = mysqli_query($conn, $select_query);
        $num_row=mysqli_num_rows($result);
        if($num_row > 0){
          echo "<script> window.open('prd_details.php?prd_id=$product_id','_self')</script>";

        }else{
            $Insert_query="insert into `favorites`(prd_id,ip_address) values($product_id,'$ip')";
            $result = mysqli_query($conn, $Insert_query);
            echo "<script> window.open('prd_details.php?prd_id=$product_id','_self')</script>";
        }

    }
}


// add to cart function 
function add_to_cart(){
    global $conn;
    if(isset($_GET['cart_id'])){
        $ip = getIPAddress();
        $get_cart_id = $_GET['cart_id'];
        
        $select_query = "select * from `cart` where `ip_address` = '$ip' and `prd_ID` = $get_cart_id ";
        $result = mysqli_query($conn, $select_query);
        $num_row=mysqli_num_rows($result);
        if($num_row > 0){
          echo "<script> window.open('all-product.php','_self')</script>";

        }else{
            $Insert_query="insert into `cart`(prd_ID,ip_address,quantity) values($get_cart_id,'$ip',1)";
            $result = mysqli_query($conn, $Insert_query);
            echo "<script> window.open('all-product.php','_self')</script>";
        }
    }
}
// cart item function

function cart_item(){
    
    
    if(isset($_GET['cart_id'])){
        global $conn;
        $ip = getIPAddress();
     
        $select_query = "select * from `cart` where `ip_address` = '$ip'";
        $result = mysqli_query($conn, $select_query);
        $coun_item=mysqli_num_rows($result);
       
        }else{
            global $conn;
            $ip = getIPAddress();
            $select_query = "select * from `cart` where `ip_address` = '$ip' ";
            $result = mysqli_query($conn, $select_query);
            $coun_item=mysqli_num_rows($result);
        }
        echo "<span class=' translate-middle badge rounded-circle px-2 text-center'style='padding-top:5px; margin-left: 14px; border: 1px solid #FFF; background-color: #18191D;'><span class=' fw-lighter'> $coun_item</span></span>";
    }
//function for total 

function total_amount(){
    global $conn;
    $ip = getIPAddress();
    $total =0;
 
    $select_query = "select * from `cart` where `ip_address` = '$ip'";
    $result = mysqli_query($conn, $select_query);
    while($row=mysqli_fetch_array($result)){
        $prd_ID=$row['prd_ID'];
        $select_product="select * from `prodoct` where `prd_ID`='$prd_ID'";
        $result_product=mysqli_query($conn,$select_product);
        while($row_product_price=mysqli_fetch_array($result_product)){
            $product_price =array($row_product_price['prd_price']);
            $product_value=array_sum($product_price);
            $total +=$product_value;
        }
    }
    echo $total;
    
}
// show product in the cart
function cart_product(){
    global $conn;
    $ip = getIPAddress();
    $total =0;
    $select_query = "select * from `cart` where `ip_address` = '$ip'";
    $result = mysqli_query($conn, $select_query);
    while($row=mysqli_fetch_array($result)){
        $prd_ID=$row['prd_ID'];
        $select_product="select * from `prodoct` where `prd_ID`='$prd_ID'";
        $result_product=mysqli_query($conn,$select_product);
        while($row_product_price=mysqli_fetch_array($result_product)){
            $product_price =array($row_product_price['prd_price']);
            $prd_price=$row_product_price['prd_price'];
            $prd_name=$row_product_price['prd_name'];
            $prd_img =$row_product_price['prd_img'];
            $prd_quantity=$row_product_price['prd_quantity'];
            $product_value=array_sum($product_price);
            $total +=$product_value;
            echo "<tr>
            <td class='text-center' style='width: 100px;'><img src='product-img/$prd_img' class ='object-fit-fil' alt='' style='height: 100px; width: 100px;'></td>
            <td class='ps-3'><p>$prd_name</p></td>
            <td class='text-center p-5'> <p>$prd_price</p></td>
            <td class='text-center pt-5'> <input max='$prd_quantity' class ='fprm-control w-100' min='1' type='number' name='' id=''></td>
            <td class='text-center p-5'><p>$prd_price</p></td>
            <td class='text-center p-5'><button class = 'btn'type='submit'><i class='fa-solid fa-heart fa-lg' style='color: #85a39f;'></i></button></td>
            <td class='text-center p-5'><button class = 'btn'type='submit' ><i class='fa-solid fa-xmark fa-xl' style='color: #02060d;'></i></button></td>

        </tr>";
        }
   
    }

}
// delete item in cart
function remove(){
    global $conn;
    if(isset($_POST['removeitem'])){
        if(isset($_POST['remove'])){
        foreach($_POST['removeitem'] as $check_id ){
            $remove_data ="Delete from `cart` where prd_ID = $check_id";
            $removeit=mysqli_query($conn,$remove_data);
            if($removeit){
                echo "<script>windoe.open('add_tocart.php','_self')</script>";
            }
            
        }
    }
  
}
}echo $removeit = remove();

 //
 function get_user_order(){
    global $conn;
    $email = $_SESSION['email'];
    $get_details = "select * from `user` where `email` = '$email'";
    $get_detail_result = mysqli_query($conn,$get_details);
    while($row = mysqli_fetch_array( $get_detail_result));{
        $user_id = $row['user_id'];
        if(!isset($_GET['security'])){
            if(!isset($_GET['payment'])){
                if(!isset($_GET['payment'])){
                    
                }

            }

        }
    }


 }

?>