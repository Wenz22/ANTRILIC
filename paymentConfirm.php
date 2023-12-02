
<?php

include("includes/connectiondb.php");
include("function/all-common-function.php");
session_start();
    if (isset($_GET['user_id'])){
        $user_id = $_GET['user_id'];
    }
    
// getting total item and total price of all item

$get_ip = getIPAddress();
$total_price = 0;
$total_quantity = 0;
$sum=0;
$invoice_number = mt_rand();
$status = 'pending';
$cart_query = "select * from `cart` where `ip_address` = '$get_ip'";
$cart_result = mysqli_query($conn,$cart_query);
$count_product = mysqli_num_rows($cart_result);
while($row = mysqli_fetch_array($cart_result)){
    $item_quantity = array($row['quantity']);
    $product_id = $row['prd_ID'];
    $quantity = $row['quantity'];
    $quantity_value = array_sum($item_quantity);
    $product_query = "select * from `prodoct` where `prd_ID` = $product_id";
    $product_result = mysqli_query($conn,$product_query);
    while($row_product_price = mysqli_fetch_array($product_result)){
        $product_price = array($row_product_price['prd_price']);
        $product_value = array_sum($product_price);
         $sum = $quantity * $product_value;
        $total_price += $sum;
    }
    $insert_pending_order = "insert into `order_pending` (user_id,invoice_number,prd_id,quantity,order_status) values ($user_id,$invoice_number,$product_id,$quantity ,'$status')";
    $order_pending_result = mysqli_query($conn,$insert_pending_order);
}


$insert_order = "insert into `user_order` (user_id,amount_due,invoice_number,total_products,order_date,order_status) values ($user_id,$total_price,$invoice_number,$count_product,NOW(),'$status')";
$insert_result = mysqli_query($conn,$insert_order);
if($insert_result){
   
    echo "<script>window.open('profile.php?myorder','_self')</script>";
}



$delete_item = "delete from `cart` where `ip_address` = '$get_ip'";
$delete_result =mysqli_query($conn,$delete_item );
$_SESSION['number'] = $invoice_number;
?>

