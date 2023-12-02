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

        <!-- form for sign-up-->   
        <form class="mt-5 ms-5"action="" method = "post">
              <h1 class = "ms-5 mt-2">Create your account</h1>
              <p class ="ms-5 mb-4 mt-2" >It’s free and easy</p>
                <div class="ms-5 mb-3">
                    <label for="User_name" class="form-label ">Full name</label>
                    <input type="text" name = "User_name" class="form-control w-75" id="formControlInput" autocomplete="off" placeholder="Full name" required >
                </div>
                <div class="ms-5 mb-3">
                    <label for="User_email" class="form-label ">E-mail or phone number</label>
                    <input type="email" name = "User_email"class="form-control w-75" id="formControlInput" autocomplete="off" placeholder="Type your e-mail or phone number" required>
                </div>
                <div class="ms-5 mb-0">
                    <label for="formControlInput" class="form-label ">Password</label>
                    <input type="password" name ="password"class="form-control w-75" id="formControlInput" autocomplete="off"  placeholder="Type your password" required>
                    <p class ="text-body-tertiary">Must be 8 characters at least</p>
                </div>
                <div class="form-check ms-5 mb-3">
                        <input class="form-check-input" type="checkbox" value="" id="formCheckDefault" required>
                        <label class="form-check-label text-body-secondary" for="formCheckDefault">By creating an account means you agree to the <b>Terms and<br> Conditions </b>, and our <b> Privacy Policy</b></label>
                </div>

                <div class = "ms-5 mb-3">
                <input type="submit" name = "submit" class="btn btn-dark w-75" id="formControlInput" value = "Sign up">
                </div>
           

                <div class ="options">
                    <ul>
                        <li><a href=""> <i class="fa-brands fa-google fa-2xl" style="color: #09250f;"></i></i></a></li>
                        <li><a href=""> <i class="fa-brands fa-apple fa-2xl"style="color: #000000;"></i></a></li>
                        <li><a href=""> <i class="fa-brands fa-facebook-f fa-2xl"style="color: #09250f;"></i> </a></li>
                    </ul>
                </div>
                <div class = "ms-5 ps-5">
                    <p class = "ms-5 text-body-tertiary">Aldready have an account? <a href="Sign-in.php">Sign in</a></p>
                </div>
           </form>
    

<!--- bootstrap Body-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</html>
<?php
   include('function/all-common-function.php');
   include('includes/connectiondb.php');

   if (isset($_POST['submit'])){
    $fullname = $_POST['User_name'];
    $Email = $_POST['User_email'];
    $Pass = $_POST['password'];
    $hash_password = password_hash($Pass,PASSWORD_DEFAULT);
    $user_ip = getIPAddress();
       // seclect data user table in database
       $select_query="select * from `user` where email = '$Email'";
       $result_select=mysqli_query($conn,$select_query);
       $number=mysqli_num_rows($result_select);
       $select_ip = "select * from `user` where `user_ip` = '$user_ip'";
       $result_ip = mysqli_query($conn,$select_ip );
       $ip_num_row = mysqli_num_rows($result_ip);
       
        if($number <= 0){
            // insert data from user table in database
   
            $queryCreate = "insert into `user` (name,email,password,user_ip) values ('$fullname', '$Email','$hash_password','$user_ip')";
            $msqlCreate = mysqli_query($conn,$queryCreate);
            echo '<script>window.location.href="/Anti_Relic/sign-in.php"</script>';
            echo '<script>alert("Succesfull")</script>';
         
          }else{
             $_SESSION['email']= $Email;
            echo" <script>alert('Do you have an account')</script>";
           
           echo "<script>window.open('Sign-in.php','_self')</script>";
   
        }
       
   }

   
?>