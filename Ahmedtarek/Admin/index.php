<?php 
session_start();
include "php/database.php";

//$user_id = $_SESSION['user_id'];
$user_id=11;
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


$conn->close();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>

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
                     <li class="nav-item active"> 
                        <a class="nav-link" href="#">Home</a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" href="#">Products</a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" href="#">Users</a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" href="#">My orders</a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" href="#">checks</a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link btns-confirm" href="#">admin</a>
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
                    <thead>
                        <tr>
                            <td colspan="4">
                                <label for="">Select User</label>
                                <select name="user_fk" id="user_fk" class="form-control">
                                    <?php foreach($users as $user){ ?>
                                    <option value="<?php echo $user['user_id']; ?>"><?php echo $user['user_name']; ?>
                                    </option>
                                    <?php } ?>
                                </select>
                            </td>
                        </tr>
                    </thead>
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
                                <button id="addOrder" class="btn btns-confirm">Confirm</button>
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>

            <div class="col-xl-9 col-lg-8 mt-3">
                
                <div class="row">
                    <div class="col-12">
                        <h2 style="color:#f76d37;" class="mt-3">Products</h2>
                        <div class="row">
                            <?php foreach($products as $product){ ?>
                            <div class="col-xl-3 col-lg-4 col-md-4">
                                <div class="card p-3 bg-light">
                                    <img class="card-img-top" height="150" src="img/<?php echo $product['img_dir']; ?>"
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
                        <li><a href="index.html">Home</a></li>
                        <li><a href="about.html">About Us</a></li>
                        <li><a href="gallery.html">Gallery</a></li>
                        <li><a href="services.html">Services</a></li>
                        <li><a href="contact.html">Contact Us</a></li>
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