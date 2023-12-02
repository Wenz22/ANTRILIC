<?php
session_start();
include('function/all-common-function.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/main.css">
    <!--- bootstrap head -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="shortcut icon" href="Img/ant.png" type="image/x-icon">
    <title>ANT RELIC</title>
</head>
<body>
    
        <div class="col-lg-6">
            <a href="index.php"><img class="ps-4 pb-5 pt-3" src="Img/ant-relic-logo.png" alt=""></a>
            <h1 class= "text-center text-light pt-5">Welcome to Ant Relic!</h1>
            <p class = "text-center text-white text-break pt- 3 fw-normal">Step into a world of timeless treasures  and nostalgia at our <br> antique shop, where history and beauty blend seamlessly.</p>

        </div>
         
        <!-- form for sign-in -->
         <form class="mt-5 ms-5" method="post" action="">
              <h1 class = "ms-5 mt-5">Welcome back!</h1>
              <p class ="ms-5 mb-5 mt-2" >Meet the good taste today</p>
                <div class="ms-5 mb-3">
                    <label for="User_name" class="form-label " >Email address</label>
                    <input type="email" name ="User_name" class="form-control w-75" id="formControlInput"required placeholder="name@example.com">
                </div>
                <div class="ms-5 mb-5">
                    <label for="formControlInput" class="form-label ">Password</label>
                    <input type="password" name = "Password"class="form-control w-75" id="formControlInput" placeholder="Type your password" >
                </div>

                <div class = "ms-5 mb-3">
                <input type="submit" name = "submit"class="btn btn-dark w-75" id="formControlInput" value = "Sign in">
                </div>
                <div class = "dex"> 
                    <hr>
                    <p class = "text-body-tertiary">or do it via other accounts</p>
                    <hr>
                </div>

                <div class ="options">
                    <ul>
                        <li><a href=""> <i class="fa-brands fa-google fa-2xl" style="color: #09250f;"></i></i></a></li>
                        <li><a href=""> <i class="fa-brands fa-apple fa-2xl"style="color: #000000;"></i></a></li>
                        <li><a href=""> <i class="fa-brands fa-facebook-f fa-2xl"style="color: #09250f;"></i> </a></li>
                    </ul>
                </div>
                <div class = "ms-5 ps-5">
                    <p class = "ms-5 text-body-tertiary">Don't have an account? <a href="sign-up.php">Sign Up</a></p>
                </div>

           </form>
  
<!--- bootstrap Body-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
<?php
include("includes/connectiondb.php");


if(isset($_POST['submit']))
{
    $Email = $_POST['User_name'];
    $Pass = $_POST['Password'];
    
    if(empty($Email) || empty($Pass)){
        
        echo '<script>alert("Enter your email and password ")</script>';
        echo '<script>window.location.href="/Anti_Relic/html/Sign-in.php"</script>';
    }else{

        $queryLog = "Select * from `user` where `email` = '$Email'";
        $result = mysqli_query($conn,$queryLog);
        $row=mysqli_num_rows($result );
        $data_row = mysqli_fetch_assoc($result);
        $user_ip = getIPAddress();
        $user_id = $data_row['user_id'];

       //cart item
        $select_cart = "Select * from `cart` where `ip_address` = '$user_ip'";
        $result_cart = mysqli_query($conn,$select_cart);
        $row_cart=mysqli_num_rows($result_cart);
        if($data_row > 0){
            $_SESSION['email']= $Email;
            $_SESSION['user_id'] = $user_id;
            $_SESSION['status'] ='valid';

            if(password_verify($Pass,$data_row['password'])){
                

                if($row == 1 and $row_cart == 0){
                    $_SESSION['email']= $Email;
                     echo "<script>window.open('index.php','_self')</script>";
                }
                else{
                    $_SESSION['email']= $Email;
                    echo "<script>window.open('index.php','_self')</script>";
                }   
                
            }else{
                echo '<script>alert("Invalit Password ")</script>';
                echo "<script>window.open('Sign-in.php','_self')</script>";
            }
            }
        else
            {
                $_SESSION['status'] ='invalid';
                echo '<script>alert("invalid email ")</script>';  
                echo "<script>window.open('Sign-in.php','_self')</script>";
                
            }


    }

       
}