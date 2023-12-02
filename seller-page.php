<?php
include("includes/connectiondb.php");
session_start();
if(isset($_POST['Add-item'])){
    $shop_id=$_GET['shop_id'];
    $inputName=$_POST['inputName'];
    $inputPrice=$_POST['inputPrice'];
    $inpuCategories=$_POST['inpuCategories'];
    $description=$_POST['description'];
    $fromNumber=$_POST['fromNumber'];
    $keyword=$_POST['Keywords'];
// accesing image
    $fromFile = $_FILES['fromFile'] ['name'];
    $temp_img = $_FILES['fromFile'] ['tmp_name'];
    $doc_img = $_FILES['doc_img']['name'];
    $doc_imgtmp = $_FILES['doc_img']['tmp_name'];


  // checking condition if input is emty

  if($inputName == '' or $inputPrice== '' or $inpuCategories=='' or $description== '' or $fromFile=='' or $temp_img=='' or $doc_img == '' or $doc_imgtmp == '' or $keyword ==''){
    echo '<script>window.location.href="/Anti_Relic/html/seller-page.php"</script>';
    echo "<script>alert('Please fill all the availabe fields')</script>";
    exit();
  }else{
    move_uploaded_file($fromFile,"product-img/$fromFile");
    move_uploaded_file($temp_img,"product-img/$fromFile");
    move_uploaded_file($doc_img,"product-img/$doc_img");
    move_uploaded_file($doc_imgtmp,"product-img/$doc_img");

    //isert item query  
    $insert_products = "Insert into `prodoct` (shop_id,prd_name,cat_id,prd_decription,prd_price,prd_quantity,prd_img,doc_img,prd_keyword) value ($shop_id,'$inputName','$inpuCategories','$description','$inputPrice', $fromNumber,'$fromFile','$doc_img','$keyword')";
    $res=mysqli_query($conn,$insert_products);
    if($res){
        echo "<script>window.location.href='/Anti_Relic/html/seller-page.php?shop_id=$shop_id'</script>";
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/f32ff935f8.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css" rel="stylesheet">
    <link rel="stylesheet" href="CSS/style.css">
    <title>Document</title>
</head>
<body class= " d-flex justify-content-between m-3 bg-body-tertiary">
        
            <div class = "col-md-6 me-2 bg-white rounded w-50 ">
                <div style="height: 780px;">
              <nav class="navbar ">
                    <div class="container-fluid ">
                        <a class="navbar-brand">Products</a>
                        <form class="d-flex">
                        <a href = "https://obsproject.com/"class="btn btn-dark fw-bold bg-opacity-25 me-4 text-success "style = " width:120px ;height: 40px ;" >
                        <i class="fa-solid fa-video" style="color: green;"></i> Go Live
                        </a>
                        <a href="index.php"class="btn btn-danger bg-opacity-25 me-2 "style = " width:120px ;height: 40px ;">
                            <p class="  m-0 ps-3 pe-3 ">Exit</p>
                        </a>
                        </form>
                       <table class = "table table-borderless mt-3">
                       <?php
                       if(isset($_GET['page'])){
                        $pg = $_GET['page'];
                       }else{
                        $pg = 1;
                       }
                        $start_from=($pg - 1)*05;
                      
                          $limit = 05;
                          $shop_ID =$_SESSION['shop_id'];
                          $get_id = "select * from `shop` where `shop_id` = $shop_ID";
                          $result =mysqli_query($conn,$get_id);
                          $row_fetch=mysqli_fetch_assoc($result);
                          $shopp_id=$row_fetch['shop_id'];

                          $get_product ="select * from  `prodoct` where `shop_id` =$shopp_id limit $start_from,$limit ";
                          $result_procduct = mysqli_query($conn,$get_product);
                          $row_num=mysqli_num_rows($result_procduct);
                          if($row_num = 0){
                            echo"<p>No items include</p>";
                          }else{
                            echo "
                            <thead class='justify-content-center'>
                            <tr >
                               
                                <th scope='col' colspan='2' class='ps-5'>Item</th>
                                <th scope='col' class='text-center'>Price</th>
                                <th scope='col'class='text-center'>Quantity</th>
                                
                            </tr>
                        </thead>
                        <tbody data-bs-spy='scroll' class ='border-top'>
                            
                            ";
                            while($array_row = mysqli_fetch_array($result_procduct)){
                                $ShopId=$array_row['shop_id'];
                                $prd_img = $array_row['prd_img'];
                                $prd_name = $array_row['prd_name'];
                                $quantity = $array_row['prd_quantity'];
                                $price = $array_row['prd_price'];
                        ?>
                        
                           <tr>
                                <td class="text-center" style="width: 100px;"><img src="product-img/<?php echo $prd_img ;?>" class ="object-fit-scale my-2" alt="" style="height: 100px; width: 100px;"></td> 
                                 <td class="ps-3 "><?php echo $prd_name; ?></td>
                                 <td class="text-center py-5 "><p>₱<?php echo $price;?></p></td>
                                 <td class="text-center py-5 "><p><?php echo $quantity;?></p></td> 
                           </tr>
                        
                        <?php
                        
                          }
                          }

                        ?>
                          </tbody>
                       </table>
                       

                    </div>
                    </div>
                    <nav aria-label="Page navigation example">
                        <ul class="pagination justify-content-end">
                            <li class="page-item disabled">
                            <a class="page-link">Previous</a>
                            </li>
                       <?php
                       $get = "select * from `prodoct` where `shop_id` = $shopp_id";
                       $result = mysqli_query($conn,$get);
                       $get_page = mysqli_num_rows($result);
                       $page = ceil($get_page / $limit);
                       for($i = 1; $i<= $page;$i++){
                       echo " <li class='page-item'><a class='page-link' href='seller-page.php?page=$i'>$i</a></li>";
                       }
                       ?>
                            <li class="page-item">
                            <a class="page-link" href="#">Next</a>
                            </li>
                        </ul>
                        </nav>

                </nav>
            </div>

            <div class = "col-md-6 bg-white rounded">
                <nav class="navbar ">
                    <div class="container-fluid ">
                        <a class="navbar-brand">Product details</a>
                        
                    </div>
                </nav>

                <form class="row g-3 m-2 " method ="Post" enctype="multipart/form-data">
                
                <div class="col-md-6">
                    <label for="inputName" class="form-label">Product Name</label>
                    <input type="text" name = "inputName"class="form-control" id="inputName" autocomplete="off">
                </div>
                <div class="col-md-6">
                    <label for="inputPrice" class="form-label">Price</label>
                    <input type="text" name = "inputPrice" class="form-control" id="inputPrice" autocomplete="off">
                </div>

                <!-- categories input-->
                <div class="col-md-6 w-50">
                    <label class="form-label" for="inpuCategories">Categories Options </label>
                    <select class="form-select " id="inpuCategories" name = "inpuCategories">
                        <option selected>Choose...</option>
                        <?php
                        $select_categories = "Select * from `category`";
                        $result_categories= mysqli_query($conn,$select_categories);
                        while($row_data =mysqli_fetch_assoc($result_categories)){
                            $categories_name =$row_data['cat_name'];
                            $categories_id =$row_data['cat_id'];
                            echo "<option value='$categories_id'>$categories_name</option> ";
                        }
                        ?>
                    </select>
                </div>
                 <div class="col-md-6">
                   <label for="formFile" class="form-label">Add Picture</label>
                   <input class="form-control" type="file" id="formfile" name ="fromFile" required = "required" autocomplete="off">
                </div>
                <div class="col-md-6">
                   <label for="formNumber" class="form-label">Quantity</label>
                   <input class="form-control" type="number" id="formNumber" name = "fromNumber" >
                </div>
                <div class="col-md-6">
                   <label for="Keywords" class="form-label">Keywords</label>
                   <input class="form-control" type="text" id="Keywords" name ="Keywords" required = "required" autocomplete="off">
                </div>
                <div class="col-md-12">
                   <label for="doc_img" class="form-label">Add picture of document of item</label>
                   <input class="form-control" type="file" id="" name ="doc_img" required = "required" autocomplete="off">
                </div>
                
                <div class="mb-3">
                <label for="description" class="form-label">DESCRIPTION</label>
                <textarea class="form-control" id="description" rows="3" name = "description"></textarea>
                </div>
                
                <button name ="Add-item" class="btn btn-outline-primary me-2 " type="submit" style = " width:130px ;height: 40px ;">
                            <p class="  m-0 ps-3 pe-3 ">Add Item</p>
                </button>
                </form>





            </div>
        




<script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/js/splide.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script> 
</body>
</html>