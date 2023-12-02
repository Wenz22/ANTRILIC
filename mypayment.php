<?php
$email = $_SESSION['email'];
$get_user = "select * from `user` where `email` = '$email'";
$get_result = mysqli_query($conn,$get_user);
$row_fetch = mysqli_fetch_assoc($get_result );
$user_id = $row_fetch['user_id'];

$get_card = "select * from `card` where `user_id` =$user_id";
$card_result =mysqli_query($conn,$get_card);
$numrow=mysqli_num_rows($card_result);
if($numrow > 0){
    $row_card=mysqli_fetch_assoc($card_result );
    $user_id = $row_card['user_id'];
    $card_number=$row_card ['card_number'];
    $card_holder=$row_card ['card_holder'];
    $expiration_date=$row_card ['expiration_date'];
    $cvc=$row_card['cvc'];
    if(isset($_POST['remove'])){
        $delete ="delete from `card` where `user_id` = $user_id";
        $delete_result = mysqli_query($conn,$delete);
        echo"<script>window.open('logout.php','_self')</script>";
    }
}else{
    
    if(isset($_POST['save'])){
        $card_number = $_POST['card_number'];
        $card_holder = $_POST['card_holder'];
        $expiration_date = $_POST['date'];
        $cvc = $_POST['cvc'];
        $insert_query = "insert into `card` (user_id,user_email,card_number,card_holder,expiration_date,cvc) values ($user_id,'$email','$card_number','$card_holder','$expiration_date','$cvc')";
        $insert_result = mysqli_query($conn,$insert_query);
        echo"<script>window.open('profile.php','_self')</script>";
    }
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
    <link rel="stylesheet" href="CSS/style.css">
    <link rel="shortcut icon" href="Img/ant.png" type="image/x-icon">
    <title>ANT RELIC</title>

</head>
<body>

    <div  style = "width: 735px; margin-left:530px; margin-top:80px">
    <div>
    <h1 class = "mb-5">My payment</h1>
    <h4>Credit card</h4>
    
    <form action="" method="post">
        <?php
       
        if($numrow == 1){
        
        ?>
                <div>
                    <label for="name" class ="fw-bold my-2 text-black-50"for="">CARD NUMBER</label>

                </div>
                <div class="mb-4" >
                    <input class = "w-100 rounded-3 p-1" type="text" value="<?php echo$card_number;?>" name="card_number" readonly id="">
                </div>
                <div>
                    <label for="card_holder" class ="fw-bold my-2 text-black-50"for="">CARD HOLDER</label>

                </div>
                <div class="mb-4" >
                    <input class = "w-100 rounded-3 p-1" type="text" value="<?php echo$card_holder;?>" name="card_holder" readonly id="">
                </div>
                <div class = "row">
                    <div class = "col">
                        <div>
                            <label for="date" class ="fw-bold my-2 text-black-50"for="">EXPIRATION DATE</label>
                        </div>
                        <div class="mb-4" >
                            <input class = "w-100 rounded-3 p-1"  type="text" name="date" value="<?php echo$expiration_date;?>" id="" readonly placeholder="MM / YY">
                        </div>
                    </div>
                    <div class = "col">
                        <div>
                            <label for="cvc" class ="fw-bold my-2 text-black-50"for="">CVC</label>
                        </div>
                        <div class="mb-4" >
                            <input class = "w-100 rounded-3 p-1" type="text" value="<?php echo$cvc;?>" name="cvc" readonly id="">
                        </div>
                    </div>
                </div>
                
                <?php
                  echo "<input type='submit' name ='remove' class ='btn btn-dark mb-5 fw-bold rounded-pill' value = 'Remove card'>"; 
                  // if user is not enter a card 
                }else{
                ?>
                <div>
                    <label for="name" class ="fw-bold my-2 text-black-50"for="">CARD NUMBER</label>

                </div>
                <div class="mb-4" >
                    <input class = "w-100 rounded-3 p-1" type="text" name="card_number" id="">
                </div>
                <div>
                    <label for="card_holder" class ="fw-bold my-2 text-black-50"for="">CARD HOLDER</label>

                </div>
                <div class="mb-4" >
                    <input class = "w-100 rounded-3 p-1" type="text"  name="card_holder" id="">
                </div>
                <div class = "row">
                    <div class = "col">
                        <div>
                            <label for="date" class ="fw-bold my-2 text-black-50"for="">EXPIRATION DATE</label>
                        </div>
                        <div class="mb-4" >
                            <input class = "w-100 rounded-3 p-1"  type="text" name="date" id="" placeholder="MM / YY">
                        </div>
                    </div>
                    <div class = "col">
                        <div>
                            <label for="cvc" class ="fw-bold my-2 text-black-50"for="">CVC</label>
                        </div>
                        <div class="mb-4" >
                            <input class = "w-100 rounded-3 p-1" type="text"  name="cvc" id="">
                        </div>
                    </div>
                </div>
                


                <?php
                 echo "<input type='submit' name ='save' class ='btn btn-dark mb-5 fw-bold rounded-pill' value = 'Save card'> ";
                }
                ?>
               
        
            
            
            
            </form>
    
   
    </div>



    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    
</body>
</html>