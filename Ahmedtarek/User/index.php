<?php 
session_start();
include "php/database.php";

$user_id = $_SESSION['user_id'];
// $user_id=11;
$sql = "SELECT * FROM `product`";
$result = $conn->query($sql);

$products= [];

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {

        array_push($products,$row);
    }
} 

$sql = "SELECT * FROM `user_info`";
$result = $conn->query($sql);

$users= [];

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {

        array_push($users,$row);
    }
} 

$sql = "SELECT * FROM `order_info` join order_product on order_info.order_id=order_product.order_fk join product on product.product_id=order_product.product_fk where user_fk=$user_id order by order_id DESC";
$result = $conn->query($sql);

$orders= [];

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {

        array_push($orders,$row);
    }
} 


$conn->close();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
               <div class="logo"><a href="#"><img src="img/logo.png"></a></div>
               <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav"aria-expanded="false" aria-label="Toggle navigation">
               <span class="navbar-toggler-icon"></span>
               </button>
               <div class="collapse navbar-collapse" id="navbarNav">
                  <ul class="navbar-nav ml-auto">
                     <li class="nav-item "> 
                        <a class="nav-link" href="../../home.php">Home</a>
                     </li>
                     <li class="nav-item active">
                        <a class="nav-link" href="#">Order Now</a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" href="../../AhmedShuaib/newDP.php">My Orders</a>
                     <!-- </li>
                     <li class="nav-item">
                        <a class="nav-link" href="#l">Services</a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" href="#">Contact Us</a>
                     </li> -->
                     <li class="nav-item">
                        <a class="nav-link btns-confirm btn" href="#"><?php echo $_SESSION['user_name'];?></a>
                     </li>
                  </ul>
               </div>
            </nav>
            <br>
    <div class="mx-4">
        <div class="row">
            <div class="col-xl-3 col-lg-4 col-4-border">
                <table id="cart" class="table table-hover bg-white">
                <h2 style="color:#f76d37;">Make order</h2>
                    <tbody class="show-cart">

                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="4">
                            <label for="">Notes</label>
                                <textarea name="note" id="note" class="form-control" rows="6"></textarea>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="4">
                                <label for="">Select Room</label>
                                <select name="room" id="room" class="form-control">
                                    <?php foreach($users as $user){ ?>
                                    <option value="<?php echo $user['room_num']; ?>"><?php echo $user['room_num']; ?>
                                    </option>
                                    <?php } ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="4" class="text-right"><strong>Total EGP <span
                                        class="total-cart"></span></strong></td>
                        </tr>
                        <tr>
                            <td colspan="4" class="text-right">
                                <button id="addOrder" class="btn  btns-confirm">Confirm</button>
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>

            <div class="col-xl-9 col-lg-8 mt-3">
                <div class="row">
                    <div class="col-12">
                        <h2 style="color:#f76d37;">Latest Order</h2>
                        <div class="row">
                            <?php 
                            if(count($orders)){
                                $start_order_id = $orders[0]['order_id'];
                            foreach($orders as $order){ 
                                if($start_order_id == $order['order_id']){ ?>

                            <div class="col-xl-3 col-lg-4 col-md-4">
                                <div class="card p-3 bg-light">
                                    <h5>Order ID: <?php echo $start_order_id; ?></h5>
                                    <img class="card-img-top" height="150" src="../../addProduct/images/<?php echo $order['img_name']; ?>"
                                        alt="Card image cap">
                                    <div class="card-block text-center">
                                        <h4 class="card-title"><?php echo $order['name']; ?></h4>
                                        <p class="card-text">Price: EGP <?php echo $order['price']; ?></p>
                                        <p class="card-text">Quantity: <?php echo $order['count']; ?></p>
                                        <p class="card-text">Total: EGP <?php echo $order['price']*$order['count']; ?>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>

                            <?php }
                            }else{ ?>
                            <div class="col-12">
                                <p class="text-center">You have no recent order</p>
                            </div>
                            <?php }
                             ?>
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col-12">
                        <h2 style="color:#f76d37;" class="mt-3">Products</h2>
                        <p id="selectd_user" hidden><?php echo $user_id; ?></p>
                        <div class="row">
                            <?php foreach($products as $product){ ?>
                            <div class="col-xl-3 col-lg-4 col-md-4">
                                <div class="card p-3 bg-light">
                                <p class="text-right"><span class="badge badge-pill btns-confirm"> EGP <?php echo $product['price']; ?></span></p>
                                    <img class="card-img-top" height="150" src="../../addProduct/images/<?php echo $product['img_name']; ?>"
                                        alt="Card image cap">
                                    <div class="card-block text-center">
                                        <h4 class="card-title"><?php echo $product['name']; ?></h4>
                                        <p class="card-text">Price: EGP <?php echo $product['price']; ?></p>
                                        <a href="#" data-productid="<?php echo $product['product_id']; ?>"
                                            data-name="<?php echo $product['name']; ?>"
                                            data-price="<?php echo $product['price']; ?>"
                                            class="add-to-cart btn btns-confirm">Add
                                            to cart</a>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>
<br>
   
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

    <script src="https://code.jquery.com/jquery-3.5.1.js"
        integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <script src="js/index.js"></script>

</body>

</html>