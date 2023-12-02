<?php
$email = $_SESSION['email'];
$get_user="select * from `user` where `email`= '$email'";
$get_result = mysqli_query($conn,$get_user);
$row_fetch = mysqli_fetch_assoc($get_result);
$user_id = $row_fetch['user_id'];
if(isset($_POST['create'])){
    $shopname = $_POST['shop_name'];
    $owner_name = $_POST['owner_name'];
    $address = $_POST['address'];
    $valid_id =$_FILES['owner_id'] ['name'];
    $valid_idtemp = $_FILES['owner_id']['tmp_name'];

    if($shopname == '' or  $owner_name == '' or $address=='' or $valid_id== '' or $valid_idtemp==''){
        echo "<script>alert('Please fill all the availabe fields')</script>";
        exit();
      }else{
        move_uploaded_file($valid_id,"validID/$valid_id");
        move_uploaded_file($valid_idtemp,"validID/$valid_id");
    
        //isert item query  
        $insert_products = "Insert into `shop` (user_id,shop_name,owner_name,owner_id,address) value ($user_id,'$shopname','$owner_name','$valid_id','$address')";
        $res=mysqli_query($conn,$insert_products);
        if($res){
            echo "<script>window.open('profile.php?shop_id=$shop_id','_self')</script>";
        }else{
    
        }
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
    <form class="row g-3"method ="Post" enctype="multipart/form-data">
  <div class="col-md-6">
    <label for="shopename" class="form-label">Shop Name</label>
    <input type="text" class="form-control" name = "shop_name" id="">
  </div>
  <div class="col-md-6">
    <label for="owner_name" class="form-label">Owner Name</label>
    <input type="text" class="form-control" name="owner_name" id="">
  </div>
  <div class="col-12">
    <label for="owner_id" class="form-label ">Input any valid ID</label>
    <input type="file" class="form-control" name = "owner_id"id="">
  </div>
  <div class="col-12">
    <label for="Address" class="form-label">Address</label>
    <input type="text" class="form-control" name = "address" id="inputAddress" placeholder="1234 Main St">
  </div>
  
  <div class="col-12">
    <button type="submit" name="create"class="btn btn-dark rounded-pill">Create shop</button>
  </div>
</form>

    
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    
</body>
</html>