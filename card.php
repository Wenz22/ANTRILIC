<?php
if(isset($_GET['card'])){
    $invoice_number = $_GET['card'];
    $get_data = "select * from `user_order` where `invoice_number` = $invoice_number";
    $data_result = mysqli_query($conn,$get_data);
    $row_fetch = mysqli_fetch_assoc($data_result);
    $user_id = $row_fetch['user_id'];
    $inv_number = $row_fetch['invoice_number'];
    $price =  $row_fetch['amount_due' ];
    $order_id=$row_fetch['order_id' ];
    $_SESSION ['invoice_number']= $row_fetch['invoice_number'];
}
$select_card = "select * from `card` where `user_id` = $user_id ";
$result_card = mysqli_query($conn,$select_card );
$row_fetch = mysqli_fetch_assoc($result_card );
$card_number = $row_fetch['card_number'];
$card_holder = $row_fetch['card_holder'];
$date = $row_fetch['expiration_date'];
$cvc =  $row_fetch['cvc'];

if(isset($_POST['pay'])){
$card_number = $_POST['card_number'];

$insert_pay = "insert into `payment_mod` (order_id,invoice_number,amont,pement_mode) value ($order_id,$inv_number,$price + 120, 'card')";
$insert_result = mysqli_query($conn,$insert_pay);
if($insert_result){
    echo"<script>window.open('confirm.php','_self')</script>";
}
$order_update = "update `user_order` set `order_status` = 'Complete' where `order_id` =  $order_id";
$order_result = mysqli_query($conn,$order_update);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class = "border-top">
            <p class = "fw-bold my-4">Credit Card</p>


            
                <div>
                    <label class ="fw-bold my-2 text-black-50"for="">CARD NUMBER</label>

                </div>
                <div class="mb-4" >
                    <input class = "w-100 rounded-3 p-1" value="<?php echo $card_number;?>" type="text" name="card_number" id="">
                </div>
                <div>
                    <label class ="fw-bold my-2 text-black-50"for="">CARD HOLDER</label>

                </div>
                <div class="mb-4" >
                    <input class = "w-100 rounded-3 p-1" value="<?php echo $card_holder; ?>" type="text" name="card_holder" id="">
                </div>
                <div class = "row">
                    <div class = "col">
                        <div>
                            <label class ="fw-bold my-2 text-black-50"for="">EXPIRATION DATE</label>
                        </div>
                        <div class="mb-4" >
                            <input class = "w-100 rounded-3 p-1" type="text" value="<?php echo $date?>" name="date" id="" placeholder="MM / YY">
                        </div>
                    </div>
                    <div class = "col">
                        <div>
                            <label class ="fw-bold my-2 text-black-50"for="">CVC</label>
                        </div>
                        <div class="mb-4" >
                            <input class = "w-100 rounded-3 p-1" type="text" value="<?php echo $cvc; ?>" name="cvc" id="">
                        </div>
                    </div>
                </div>
                <div class = "d-flex my-3">
                <div >
                <input class ="btn btn-dark mb-5 rounded-pill fw-bold "type="submit" name="pay" value="Confirm and pay">
                </div>
                
            </div>
            
           

        </div>
    
</body>
</html>