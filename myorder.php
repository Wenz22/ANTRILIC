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
// geting the email of the user in user table
     $email =$_SESSION['email'];
     $get_user = "select * from `user` where `email` = '$email'";
     $get_result = mysqli_query($conn,$get_user);
     $row_fetch = mysqli_fetch_assoc($get_result);
     $user_id = $row_fetch['user_id'];

?>

    <div class = "row" style = "width: 735px; margin-left:530px; margin-top:80px">
    <h1 class = "mb-5 fw-bold ">PENDING ORDER</h1>
    <?php
   
     /// geting the user order in the user order table
     $get_user_order = "select * from `user_order` where `user_id` =  $user_id and `order_status`= 'pending'";
     $result_order = mysqli_query($conn,$get_user_order );
     while($row_order=mysqli_fetch_assoc($result_order)){
        $invoice_number=$row_order['invoice_number'];
        $order_date = $row_order['order_date'];
        $status = $row_order['order_status'];
        if($status = 'pinding'){
            $status = 'Incomplete';
        }else{
            $status = 'Complete';
        }
    ?>
    <div class = "border g-0 col-md-2 m-3 rounded shadow" style="width:330px; height:380px;  background-color: #F7F7F7;">

        <div class  = "card-body mt-2 mx-2">
            <div class="d-flex justify-content-between">
                <p class = "fw-bold mt-2">Order #<?php echo $invoice_number;?> </p>
                <a href="" class = "btn border  rounded-4 h-25 fw-bold"><?php echo $status;?></a>
            </div>
            <div>
            <p class = "text-black-50"> <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" width="16" height="16"><path d="M4.75 0a.75.75 0 0 1 .75.75V2h5V.75a.75.75 0 0 1 1.5 0V2h1.25c.966 0 1.75.784 1.75 1.75v10.5A1.75 1.75 0 0 1 13.25 16H2.75A1.75 1.75 0 0 1 1 14.25V3.75C1 2.784 1.784 2 2.75 2H4V.75A.75.75 0 0 1 4.75 0ZM2.5 7.5v6.75c0 .138.112.25.25.25h10.5a.25.25 0 0 0 .25-.25V7.5Zm10.75-4H2.75a.25.25 0 0 0-.25.25V6h11V3.75a.25.25 0 0 0-.25-.25Z"></path>   </svg> <?php echo $order_date;?></p>
            </div>
        </div> 
        
        <div class = "mx-2" style="width:325px; height:150px;">  
            <?php        
                // geting the order pending id to order penting table
                $get_pending_order = "select * from `order_pending` where `user_id`= $user_id and `invoice_number`= $invoice_number";
                $result_pending_order = mysqli_query($conn, $get_pending_order);
                 while( $row_data= mysqli_fetch_assoc( $result_pending_order)){
                $prd_id = $row_data['prd_id'];
                $quantity = $row_data['quantity'];
                // geting the product name to prodoct table
                $get_product="select * from `prodoct` where prd_ID = $prd_id";
                $product_result = mysqli_query($conn,$get_product);
                while( $row_product= mysqli_fetch_assoc( $product_result )){
                $prd_name = $row_product['prd_name'];
             ?>
                <div class ="d-flex">
                    <div class = "mt-3 me-2">
                    <input type="text"class = "rounded-3 text-center"style="width: 30px;" value="<?php echo $quantity;?>" readonly>
                    </div>
                    <div>
                        <p class = "pt-2 pe-3 ps-1 h6"> <?php echo $prd_name;?> </p>
                    </div>
                </div>
           <?php
            }
           } 
           ?>
        </div>  
        <div class = "pt-2 border-top"style="width:330px; height:118px; ">
        <div class = "d-flex">
            <div>
            <p class = "mx-1"><i class="fa-regular fa-message fa-lg text-black-50" style="color: #000000;"></i></p>
            </div>   
            <div class =  "">
               <p class = "fw-bold">Contact Seller</p>
                <p class = "">Product issues,returns, and et.</p>
            </div>
            </div>
        <div class = " d-flex" >
        <div class = "row ms-1 mb-2" style = "width:325px;">
            <div class = "col-md-6">
            <a href="" class = "btn btn-dark rounded-pill w-100">Details</a>
            </div>
            <div class = "col-md-6">
            <a href="payment.php?order_number=<?php echo$invoice_number;?>" class = "fw-bold text-danger btn btn-light border rounded-pill w-100 "><?php 
            if($status  = 'pending')
            $status = 'Need to pay';
           echo $status;
            ?> </a>
            </div>
        </div>
        </div>
        </div>
    </div>
        
<?php  
   
}

?>

 <h1 class = "mb-5 fw-bold mt-5 ">MY ORDERS</h1>

<?php
   
     /// geting the user order in the user order table
     $get_user_order = "select * from `user_order` where `user_id` =  $user_id and `order_status`= 'Complete'";
     $result_order = mysqli_query($conn,$get_user_order );
     while($row_order=mysqli_fetch_assoc($result_order)){
        $invoice_number=$row_order['invoice_number'];
        $order_date = $row_order['order_date'];
        $status = $row_order['order_status'];
        if($status = 'Complete'){
            $status = 'To Receive';
        }else{
            $status = 'Completed';
        }
    ?>
    <div class = "border g-0 col-md-2 m-3 rounded shadow" style="width:330px; height:380px;  background-color: #F7F7F7;">

        <div class  = "card-body mt-2 mx-2">
            <div class="d-flex justify-content-between">
                <p class = "fw-bold mt-2">Order #<?php echo $invoice_number;?> </p>
                <a href="" class = "btn border  rounded-4 h-25 fw-bold"><?php echo $status;?></a>
            </div>
            <div>
            <p class = "text-black-50"> <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" width="16" height="16"><path d="M4.75 0a.75.75 0 0 1 .75.75V2h5V.75a.75.75 0 0 1 1.5 0V2h1.25c.966 0 1.75.784 1.75 1.75v10.5A1.75 1.75 0 0 1 13.25 16H2.75A1.75 1.75 0 0 1 1 14.25V3.75C1 2.784 1.784 2 2.75 2H4V.75A.75.75 0 0 1 4.75 0ZM2.5 7.5v6.75c0 .138.112.25.25.25h10.5a.25.25 0 0 0 .25-.25V7.5Zm10.75-4H2.75a.25.25 0 0 0-.25.25V6h11V3.75a.25.25 0 0 0-.25-.25Z"></path>   </svg> <?php echo $order_date;?></p>
            </div>
        </div> 
        
        <div class = "mx-2" style="width:325px; height:150px;">  
            <?php        
                // geting the order pending id to order penting table
                $get_pending_order = "select * from `order_pending` where `user_id`= $user_id and `invoice_number`= $invoice_number";
                $result_pending_order = mysqli_query($conn, $get_pending_order);
                 while( $row_data= mysqli_fetch_assoc( $result_pending_order)){
                $prd_id = $row_data['prd_id'];
                $quantity = $row_data['quantity'];
                // geting the product name to prodoct table
                $get_product="select * from `prodoct` where prd_ID = $prd_id";
                $product_result = mysqli_query($conn,$get_product);
                while( $row_product= mysqli_fetch_assoc( $product_result )){
                $prd_name = $row_product['prd_name'];
             ?>
                <div class ="d-flex">
                    <div class = "mt-3 me-2">
                    <input type="text"class = "rounded-3 text-center"style="width: 30px;" value="<?php echo $quantity;?>" readonly>
                    </div>
                    <div>
                        <p class = "pt-2 h6"> <?php echo $prd_name;?> </p>
                    </div>
                </div>
           <?php
            }
           } 
           ?>
        </div>  
        <div class = "pt-2 border-top"style="width:330px; height:118px; ">
        <div class = "d-flex">
            <div>
            <p class = "mx-1"><i class="fa-regular fa-message fa-lg text-black-50" style="color: #000000;"></i></p>
            </div>   
            <div class =  "">
               <p class = "fw-bold">Contact Seller</p>
                <p class = "">Product issues,returns, and et.</p>
            </div>
            </div>
        <div class = " d-flex" >
        <div class = "row ms-1 mb-2" style = "width:325px;">
            <div class = "col-md-6">
            <a href="" class = "btn btn-dark rounded-pill w-100">Details</a>
            </div>
            <div class = "col-md-6">
            <button class="btn btn-light border rounded-pill w-100 fw-bold " type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight"><?php
             if($status = 'Complete'){
                $status = 'Track';
                echo$status;
            }else{
                $status = 'Write Review';
                echo$status;
            
            }
            
            ?></button>
            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
            <div class="offcanvas-header">
                
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
            <iframe  src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3874.225035165548!2d121.39105477537275!3d13.825521495581887!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x33bd39876440e137%3A0xca1f1bbd7e5db3ee!2sCSTC%20Library!5e0!3m2!1sen!2sph!4v1700379552101!5m2!1sen!2sph" width="350" height="400" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                <div class = "d-flex border-bottom">
                     <div class = "m-3">
                <div class="d-flex">
                <p class = "mt-4 me-4"><i class="fa-regular fa-clock fa-lg" style="color: #000000;"></i></p>
                    <div class = "g-0">
                        <p class ="text-black-50 fs-6">Estimated arrival</p>
                        <h5 class ="fw-bold">35 min</h5>
                    </div>
                </div>
                </div>
                <div class = "m-3">
                <div class="d-flex">
                <p class = "my-4 me-4"><i class="fa-solid fa-map fa-lg" style="color: #000000;"></i></p>
                    <div class = "g-0">
                        <p class ="text-black-50 fs-6">Distance</p>
                        <h5 class ="fw-bold">3.6 km</h5>
                    </div>
                </div>
                </div>
                </div>
                <div>
                <p class = "mt-4 text-black-50"><i class="fa-regular fa-clock fa-sm me-3" style="color: #000000;"></i> To Recieve</p>
                </div>
                <div>
                <p class = "mt-4 fw-bold"><i class="fa-solid fa-check fa-lg me-3" style="color: #000000;"></i> Packing item</p>
                </div>
                <div class = "d-flex mt-5">
                    
                        <p class =" m-3"><i class="fa-regular fa-message fa-lg" style="color: #00040a;"></i></p>
                        <button class ="btn btn-success w-75 rounded-pill"> <b>Call to</b> (Driver)</button>
                    
                </div>
                
               
            </div>
            </div>
            </div>
        </div>
        </div>
        </div>
    </div>
        
<?php  
    
}

?>

</div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    
</body>
</html>
