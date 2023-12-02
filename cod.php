<?php
if(isset($_GET['cod'])){
    $invoice_number = $_GET['cod'];
    $get_data = "select * from `user_order` where `invoice_number` = $invoice_number";
    $data_result = mysqli_query($conn,$get_data);
    $row_fetch = mysqli_fetch_assoc($data_result);
    $user_id = $row_fetch['user_id'];
    $inv_number = $row_fetch['invoice_number'];
    $price =  $row_fetch['amount_due' ];
    $order_id=$row_fetch['order_id' ];
    $_SESSION ['invoice_number']= $row_fetch['invoice_number'];
}

if(isset($_POST['pay'])){
$insert_pay = "insert into `payment_mod` (order_id,invoice_number,amont,pement_mode) value ($order_id,$inv_number,$price + 120, 'card')";
$insert_result = mysqli_query($conn,$insert_pay);
if($insert_result){
    echo"<script>window.open('confirm.php','_self')</script>";
}
}

?>