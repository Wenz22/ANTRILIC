<?php
 if(!isset($_GET['security'])){
    if(!isset($_GET['myorder'])){
        if(!isset($_GET['payment'])){
          $email = $_SESSION['email'];
          $get_userInfo =  "select * from `user` where `email` =  '$email'";
          $get_result = mysqli_query($conn,$get_userInfo);
          $row_data = mysqli_fetch_assoc($get_result);
          $user_id = $row_data['user_id'];
          $user_name = $row_data['name'];
          $user_email = $row_data['email'];
          $user_address = $row_data['address'];
          $user_phone_number = $row_data['phone_number'];
        }


    }
 }
 if(isset($_POST['update_data'])){
    $user_update = $user_id;
    $user = $_POST['name'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $phone_number = $_POST['phone'];

    //update query
    $user_update_info = "update `user` set `name` =  '$user' , email = '$email' , address = '$address' , phone_number= $phone_number where user_id = $user_update";
    $update_result = mysqli_query($conn,$user_update_info);
    if($update_result){ 
        echo "<script> alert ('user update oky')</script>";
        echo "<script>window.open('logout.php','_self')</script>";

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
    
    <h1 class = "mb-5 fw-bold">Personal info</h1>
    <form method="post">
        <p class = "fw-bold">Account info</p>
        <div class = "row my-4">
            <div class="col-md-6">
                <div class= "mb-2">
                    <label for="dname" class = "fw-bold">Display Name</label>
                </div>
                <div>
                    <input type="text" class = "form-control" value=" <?php echo $user_name; ?> " name ="Dname" readonly>
                </div>
            </div>
            <div class="col-md-6">
                <div class= "mb-2">
                    <label for="name" class = "fw-bold">Name</label>
                </div>
                <div>
                    <input type="text" class = "form-control " value=" <?php echo $user_name; ?> " name ="name" >
                </div>
            </div>
        </div>
        <div class = "row my-4">
            <div class="col-md-6">
                <div class= "mb-2">
                    <label for="phone" class = "fw-bold">Phone</label>
                </div>
                <div>
                    <input type="text" class = "form-control" value=" <?php echo $user_phone_number; ?> "  name ="phone" value="" >
                </div>
            </div>
            <div class="col-md-6">
                <div class= "mb-2">
                    <label for="email" class = "fw-bold">Email</label>
                </div>
                <div>
                    <input type="email" class = "form-control " value=" <?php echo $user_email; ?> "  name ="email" >
                </div>
            </div>
        </div>
        <div class = "row my-4 border-bottom">
            <div class="col-md-12">
                <div class= "mb-2">
                    <label for="address" class = "fw-bold">Your Address</label>
                </div>
                <div class = "mb-5">
                    <input type="text" class = "form-control" value=" <?php echo $user_address; ?> "  name ="address" value="" >
                </div>
            </div>
        </div>
        <div class = "my-5">
            <input type="submit" class = "btn btn-dark rounded-pill py-3 px-4 fw-bold" id="liveToastBtn" name = "update_data" value="Update profile">
            
        </div>
        
    </form> 
    </div>
   



    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    
</body>
</html>