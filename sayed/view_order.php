
<?php require_once("../function/db.php");?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Orders</title>

<!-- ////////////////////////////////// -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/view_order.css">

</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="logo"><a href="#"><img src="../images/logo.png"></a></div>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav"aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav ml-auto">
                     <li class="nav-item "> 
                        <a class="nav-link" href="../Ahmedtarek/Admin/index.php">Home</a>
                     </li>
                     <li class="nav-item ">
                        <a class="nav-link" href="../AllProducts/all_product.php">Products</a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" href="../AllUsers/all_user.php">Users</a>
                     </li>
                     <li class="nav-item ">
                        <a class="nav-link" href="../addProduct/allCategory.php">Categories</a>
                     </li>
                     <li class="nav-item active">
                        <a class="nav-link  " href="#">orders</a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" href="../checks/checks.php">checks</a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link btn-danger" href="#">admin</a>
                     </li>
    </ul>
    </div>
</nav>

<div class="row mt-5">
    <div class="col-sm-12">
        <h1 class="gallery_taital">All Orders</h1>
    </div>
</div>





<?php $col_arr=['date','order_id','status','room','user_name','ext','user_info.img_name','note'];
                      $table_arr=['order_info','user_info'];
                      $condition_arr=['user_fk'=>'user_id'];
                      $data = $newconnection->selectMultiTabls($col_arr,$table_arr,$condition_arr);  ?>

    <div class="container pt-5">

    <?php   $num=1; 
    foreach($data as $row){  ?>

        <?php
          $col_arr1=['name','price','count','img_dir','img_name'];
          $table_arr1=['product','order_product'];
          $condition_arr1=['order_fk'=>$row['order_id'],'product_id'=>'product_fk'];
          $product_data=$newconnection->selectMultiTabls($col_arr1,$table_arr1,$condition_arr1);
          // var_dump($product_data);
          
          ?>
        <div class="order-title text-center my-5 "><h1 >Order Number :<?php echo $row['order_id'];  //echo $num; ?></h1></div>
        <div class="row  my-5">
            <div class="col-4">
                <div class="card">
                    <div class="box">
                        <div class="img">
                        <?php echo "<img class='product-img' alt='profile pic' src='../users_images/".$row['img_name']."'/>";?>
                       
                        </div>
                        <h2>Name : <?php echo $row['user_name'] ?><br><span>date : <?php echo $row['date'] ?></span>
                            <span>room : <?php echo $row['room'] ?></span>
                            <span>ext : <?php echo $row['ext']?></span>
                            <span>status : <?php echo $row['status']?></span>
                        </h2>
                        <p>Notes :<?php echo $row['note']?> </p>
                        <div>
                            <a class="btn action-btn m-3 delivery" href="#" data-field="status" value_id="delivery" data-id="<?php echo $row['order_id']; ?>" data-table="order_info">Delivary</a>
                           <a class="btn action-btn m-3 done" href="#"  data-field="status" value_id="done" data-id="<?php echo $row['order_id']; ?>" data-table="order_info">Done</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-8 sid-order-detail">
                <div class="row">
                <?php $total=0;
                foreach($product_data as $row1){   ?>
                    <div class="col-6">
                        <div class="product-card">
                            <div class="row justify-content-around">
                                <div class="col-5">
                                <?php echo "<img class='product-img' alt='profile pic' src='../addProduct/images/".$row1['img_name']."'/>";?>
                                    <!-- <img class="product-img" src="coffee.jpg" alt=""> -->
                                </div>
                                <div class="col-6 product-detail">
                                    <table>
                                        <tr>
                                            <th>name:</th>
                                            <td><?php echo $row1['name'] ?></td>
                                        </tr>
                                        <tr>
                                            <th>price :</th>
                                            <td> <?php echo $row1['price']." LE" ?></td>
                                        </tr>
                                        <tr>
                                            <th>qun:</th>
                                            <td><?php echo $row1['count']?></td>
                                        </tr>
                                        <tr>
                                            <th>total:</th>
                                            <td><?php echo $row1['price']*$row1['count']." LE"?></td>
                                        </tr>
                                       
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php $total+=$row1['price']*$row1['count']; } ?>
                    
                </div>
                
                
            </div>
            
            

            <h2 class="p-4">Total :<?php echo $total." EGP"?></h2>
            
        </div>
       
        <?php $num++;} ?>

</div>

<div class="footer_section layout_padding">
    <div class="container">
    <div class="row">
        <div class="col-lg-3 col-sm-6">
            <h3 class="useful_text">About</h3>
            <p class="footer_text">consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation u</p>
        </div>
        <div class="col-lg-3 col-sm-6">
            <h3 class="useful_text">Menu</h3>
            <div class="footer_menu">
                <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#">About Us</a></li>
                <li><a href="#">Gallery</a></li>
                <li><a href="#">Services</a></li>
                <li><a href="#">Contact Us</a></li>
                </ul>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6">
            <h1 class="useful_text">Useful Link</h1>
            <p class="dummy_text">Adipiscing Elit, sed do Eiusmod Tempor incididunt </p>
        </div>
        <div class="col-lg-3 col-sm-6">
            <h1 class="useful_text">Contact Us</h1>
            <div class="location_text">
                <ul>
                <li>
                    <a href="#">
                    <i class="fa fa-map-marker" aria-hidden="true"></i><span class="padding_left_10">Address : Loram Ipusm</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                    <i class="fa fa-phone" aria-hidden="true"></i><span class="padding_left_10">Call : +01 1234567890</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                    <i class="fa fa-envelope" aria-hidden="true"></i><span class="padding_left_10">Email : demo@gmail.com</span>
                    </a>
                </li>
                </ul>
            </div>
        </div>
    </div>
    </div>
</div>


    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- <script src="js/view_order.js"></script> -->



    <script>

$(document).ready(function() {


    // $(".order-title").next().hide()

    $(".order-title").click(function(event) {
        event.preventDefault();
        var $target = $(event.target);
        $(this).next().slideToggle();
                        
    });

$(".delivery").click(function()
{
  
  var item_id = $(this).attr("data-id");
  var table = $(this).attr("data-table");
  var field = $(this).attr("data-field");
  var value =$(this).attr("value_id");
  
  

    $.ajax({
      type:"POST",
      url:"../function/update.php",
      data:{item_id:item_id,table:table,field:field,value:value},
      dataType:"JSON",
      success:function(data)
      {
       
          // console.log(data.message);
          if(data.successmessage == "success")
          {
            alert("Updated Success");
           

          }
          else 
          {
            alert("Error");
          }
          
      }
    });
    window.location.reload();

    alert("Success");
    
});
$(".done").click(function()
{
  

  var item_id = $(this).attr("data-id");
  var table = $(this).attr("data-table");
  var field = $(this).attr("data-field");
  var value =$(this).attr("value_id");

  console.log(item_id,table,field,value);

    $.ajax({
      type:"POST",
      url:"../function/update.php",
      data:{item_id:item_id,table:table,field:field,value:value},
      dataType:"JSON",
      success:function(data)
      {
        //   console.log(data.message);
          if(data.message == "success")
          {
            alert("Success");
          }
          else 
          {
            alert("Error");
          }
          
      }
    })
    alert("Success");
    window.location.reload();

});

  


});
 

</script>
   

</body>
</html>