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
//get user id to proced order
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
        <h2>SHOPPING CHECK OUT</h2>
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
<?php
global $conn;
$ip_address = getIPAddress();
$get = "select * from `user` where `user_ip` = '$ip_address' and `user_id`= $user_id ";
$result_user =mysqli_query($conn,$get);
$row_fetch = mysqli_fetch_assoc($result_user);
$user_address = $row_fetch['address'];
?>
<div class ="container border row table mt-5 rounded-2 shadow " style="margin-left:153px; width:78% ;  background: #F5F5F5;">
    <div class = "my-2">
        <h4>Delivery Address</h4>
        <p><?php
        
        echo $user_address; 
        ?></p>
    </div>

</div>
<div class = "container mt-3"style = "margin-left:153px;">
    <h3>Product</h3>
</div>
        <div class ="container"> 
            <form  method="post">
            <div class="row  py-5 ps-5 table  ">
                <table class="table table-borderless   " >

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
                               
                                <th scope='col' colspan='2' class='ps-5'>Item</th>
                                <th scope='col' class='text-center'>Price</th>
                                <th scope='col'class='text-center'>Quantity</th>
                                <th scope='col'class='text-center'>Total Price</th>
                                
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
                                 <td class="text-center" style="width: 100px;"><img src="product-img/<?php echo $prd_img ;?>" class ="object-fit-fil my-2" alt="" style="height: 100px; width: 100px;"></td>
                                 <td class="ps-3 "><?php echo $prd_name; ?></td>
                                 <td class="text-center p-5 "><p>₱ <?php echo $prd_price;?></p></td>
                                 <td class="text-center p-5"> <?php echo $quantity; ?></td>
                                 <td class='text-center p-5'> <p>₱ <?php echo $sum;?></p></td>
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
         <div class = "container d-flex justify-content-center aline-item-center border-bottom mb-2" style="width: 76%;">

        <div class = "d-flex justify-content-center aline-item-center" style="margin-right: 280px; ">
            <p class = "mt-2 text-black-50" s>Add Voucher</p>
            <div class = "border rounded-pill mx-2 mb-1" style="width: 160px;">
                
            </div>
            <p class ="mt-2 text-black-50">No voucher added..</p>
          </div>
                <p class = " text-black-50 mt-2"style="margin-left:140px;">Discount:</p>

         </div>
         <div class = "container">
            <div class ="d-flex justify-content-between mt-3" style="width: 80%; margin-left:120px;">
            <a href="All-product.php" class ="nav-link text-black-50"><i class="text-black-50 fa-solid fa-arrow-left fa-lg" style="color: #000000;"></i> Back to shopping</a>
            <p class= "text-black-50">Total Price: ₱ <?php echo $total;   ?></p>
            </div>

         </div>
 
            <div class="container mt-5 " style="background: #F5F5F5;">
                <div class = "d-flex justify-content-between pt-2">
                    <p class = "fw-bold">Payment Method</p>
                    <p class = "fw-bold">Ofline Payment</p>
                </div>
                <div class = "border-top">
                <div class = "d-flex justify-content-end">
                    <p class ="text-black-50">Merchandise Subtotal:</p>
                    <p class = "ps-2 fw-bold"> ₱ <?php echo  $total;   ?></p>
                </div>
                <div  class = "d-flex justify-content-end">
                    <p class ="text-black-50">Shipping Fee:</p> 
                    <p class = "ps-2 fw-bold">₱ 120</p>
                </div>
                <div  class = "d-flex justify-content-end">
                    <p class ="text-black-50">Merchandise Subtotal:</p>
                    <p class = "ps-2 fw-bold">₱<?php echo  $total + 120 ;?></p>
                </div>
                    <div class= "d-flex justify-content-end pb-4">
                         <a href="paymentConfirm.php?user_id=<?php echo $user_id ?>" class="btn btn-dark rounded-pill">Place Order</a>
                    </div>
                   
                </div>

                
                
            </div>
        </form>
   <div class = "row ms-3">
        <?php
         
        // show product by categories function
          show_bycategories();
        ?>
    </div>
  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    
</body>
